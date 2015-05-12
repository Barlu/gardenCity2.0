<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function production($direction = null, $selected = null) {
        $em = $this->doctrine->em;

//Create criteria object
        $criteria = new \Doctrine\Common\Collections\Criteria();

        $this->template->set_title('Production');
        $this->template->set_layout('production-admin');

        $date = new DateTime();
        $date->modify('today');
//Check session data is set
        if (!$this->session->userdata('production_week')) {
            $this->session->set_userdata('production_week', $date->format("W"));
            $this->session->set_userdata('production_year', $date->format("Y"));
//If direction is forward advance date by a week and update session data
        } else if ($direction === 'next') {
            $date->setISODate($this->session->userdata('production_year'), $this->session->userdata('production_week'));
            $date->setTimestamp(strtotime('next Monday', $date->getTimestamp()));
            $this->session->set_userdata('production_week', $date->format("W"));
            $this->session->set_userdata('production_year', $date->format("Y"));
//If direction is backward turn-back the date by a week and update session data   
        } else if ($direction === 'previous') {
            $date->setISODate($this->session->userdata('production_year'), $this->session->userdata('production_week'));
            $date->setTimestamp(strtotime('last Sunday', $date->getTimestamp()));
            $this->session->set_userdata('production_week', $date->format("W"));
            $this->session->set_userdata('production_year', $date->format("Y"));
        } else {
            $date->setISODate($this->session->userdata('production_year'), $this->session->userdata('production_week'));
        }

//Get timestamps to be used in selecting orders
        $week_timestamps = $this->getWeekTimestamps($date);
        $days = $this->getDays($date);

//Create data array for pupulating daily information/selection
        foreach ($days as $day) {
            $criteria->where($criteria->expr()->gte('nextDelivery', $day['start']))
                    ->andWhere($criteria->expr()->lte('nextDelivery', $day['end']));
            $dailyOrders = $em->getRepository('Entity\Order')->matching($criteria);
            $data['days'][] = ['day' => $day['day'], 'date' => $day['date'], 'start' => $day['start'], 'end' => $day['end'], 'orders' => count($dailyOrders)];
        }
        $data['week'] = $this->getWeek($date);
        $data['month'] = $date->format('F');

//Get all product names for summary and all orders for the week or day
        $data['selected'] = $selected;
        if ($direction === 'day') {
            $timestamps = explode('-', $selected);
            $criteria->where($criteria->expr()->gte('nextDelivery', $timestamps[0]))
                    ->andWhere($criteria->expr()->lte('nextDelivery', $timestamps[1]));
        } else {
            $criteria->where($criteria->expr()->gte('nextDelivery', $week_timestamps['week_beginning']))
                    ->andWhere($criteria->expr()->lte('nextDelivery', $week_timestamps['week_ending']));
        }
        $orders = $em->getRepository('Entity\Order')->matching($criteria);
        $products = $em->getRepository('Entity\Product')->findAll();

//Work out how many orders include a given bag or produce type
        $data['quantityWatch'] = [];
        $data['produce'] = [];
        $data['bags'] = [];
        foreach ($products as $product) {
            $orderCount = 0;
            if ($product->getType() === 'Bag') {
                foreach ($orders as $order) {
                    foreach ($order->getLineItems() as $lineItem) {
                        if ($lineItem->getProduct() === $product) {
                            $orderCount += 1;
                        }
                    }
                }
                $data['bags'][] = ['name' => $product->getName(), 'orders' => $orderCount];
            } else if ($product->getType() === 'Produce') {
                foreach ($orders as $order) {
                    foreach ($order->getLineItems() as $lineItem) {
                        if ($lineItem->getProduct() === $product) {
                            //If quantity type is to be watched exclude from generic calculation
                            if ($lineItem->getQuantity()->getWatch()) {
                                if (isset($data['quantityWatch'][$lineItem->getQuantity()->getId()])) {
                                    $data['quantityWatch'][$lineItem->getQuantity()->getId()] = [
                                        'name' => $lineItem->getProduct()->getVariety() . '<br/>' . $lineItem->getProduct()->getName(),
                                        'quantity' => $lineItem->getQuantity()->getName(),
                                        'count' => $data['quantityWatch'][$lineItem->getQuantity()->getId()]['count'] + $lineItem->getAmount()
                                    ];
                                } else {
                                    $data['quantityWatch'][$lineItem->getQuantity()->getId()] = [
                                        'name' => $lineItem->getProduct()->getVariety() . '<br/>' . $lineItem->getProduct()->getName(),
                                        'quantity' => $lineItem->getQuantity()->getName(),
                                        'count' => $lineItem->getAmount()
                                    ];
                                }
                            } else {
                                $orderCount += $lineItem->getQuantity()->getValue() * $lineItem->getAmount();
                            }
                        }
                    }
                }
                if ($orderCount > 0) {
                    $data['produce'][] = ['name' => $product->getVariety() . '<br/>' . $product->getName(), 'orders' => $orderCount];
                }
            }
        }


//            $data['tableData'] = ['Delivery Point', 'Name', 'Contact Details',]
//        foreach ($weeklyOrders as $order) {
//            $data['tableData'] = 
//        }
//Get all delivery points and find out how many orders per delivery point
        $data['deliveries'] = [];
        $deliveryPoints = $em->getRepository('Entity\DeliveryPoint')->findAll();
        foreach ($deliveryPoints as $deliveryPoint) {
            $count = 0;
            foreach ($deliveryPoint->getOrders() as $deliveryOrder) {
                foreach ($orders as $order) {
                    if ($deliveryOrder === $order) {
                        $count += 1;
                    }
                }
            }
            $data['deliveries'][] = ['name' => $deliveryPoint->getAddress(), 'orders' => $count];
        }

        $this->template->load_view('back/production', $data);
    }

    public function deliveries() {
        $this->load->library('doctrine');
        $this->load->helper('form');
        $em = $this->doctrine->em;
        $this->template->set_title('Deliveries');
        $this->template->set_layout('admin');

        if ($this->input->post('submit')) {
            if ($this->input->post('submit') === 'edit') {
                $delivery = $em->getReference('Entity\DeliveryPoint', $this->input->post('id'));
                $delivery->setHost($em->find('Entity\User', $this->input->post('host')));
                $delivery->setAddress($this->input->post('address'));
                $delivery->setDay($this->input->post('day'));
                $delivery->setTimeFrom($this->input->post('time-from'));
                $delivery->setTimeTo($this->input->post('time-to'));
                $delivery->setDescription($this->input->post('description'));
            } else if ($this->input->post('submit') === 'add') {
                $delivery = new Entity\DeliveryPoint;
                $delivery->setHost($em->find('Entity\User', $this->input->post('host')));
                $delivery->setAddress($this->input->post('address'));
                $delivery->setDay($this->input->post('day'));
                $delivery->setTimeFrom($this->input->post('time-from'));
                $delivery->setTimeTo($this->input->post('time-to'));
                $delivery->setDescription($this->input->post('description'));
                $em->persist($delivery);
            } else if ($this->input->post('submit') === 'delete') {
                $delivery = $em->getReference('Entity\DeliveryPoint', $this->input->post('id'));
                $em->remove($delivery);
            }
            $em->flush();
        }
        $data['deliveries'] = $em->getRepository('Entity\DeliveryPoint')->findAll();

        foreach ($em->getRepository('Entity\User')->findBy([], ['firstName' => 'ASC']) as $user) {
            if ($user->getType() !== 'wholesaler') {
                $data['userArray'][$user->getId()] = $user->getFirstName() . ' ' . $user->getLastName();
            }
        }
        $this->template->load_view('back/deliveries', $data);
    }

    public function products() {
        $this->load->library('doctrine');
        $this->load->library('upload');
        $this->load->helper('form');
        $this->template->set_title('Products');
        $this->template->set_layout('products-admin');
        $em = $this->doctrine->em;
        if ($this->input->post('addBag')) {
            $upload = $this->upload->_upload_image('uploads/images/products');

            $bag = new Entity\Bag;
            $bag->setName($this->input->post('name'));
            $bag->setDescription($this->input->post('description'));

            $image = new Entity\Image();
            $image->setTitle($this->input->post('title'));
            if (array_key_exists('error', $upload)) {
                $data = [
                    'error' => $upload['error']
                ];
            } else {
                $image->setLocation(base_url() . 'uploads/images/products/' . $upload['upload_data']['file_name']);
            }

            $em->persist($image);
            $bag->setImage($image);
            $em->persist($bag);
            $em->flush();
        } else if ($this->input->post('addProduce')) {
            $upload = $this->upload->_upload_image('uploads/images/products');

            $produce = new Entity\Produce;
            $produce->setName($this->input->post('name'));
            $produce->setDescription($this->input->post('description'));
            $produce->setVariety($this->input->post('variety'));
            $produce->setStatus(false);

            $image = new Entity\Image();
            $image->setTitle($this->input->post('title'));
            if (array_key_exists('error', $upload)) {
                $data = [
                    'error' => $upload['error']
                ];
            } else {
                $image->setLocation(base_url() . 'uploads/images/products/' . $upload['upload_data']['file_name']);
            }

            $em->persist($image);
            $produce->setImage($image);
            $em->persist($produce);
            $em->flush();
        }


        $data['produce'] = $em->getRepository('Entity\Produce')->findAll();
        $data['bags'] = $em->getRepository('Entity\Bag')->findAll();
        $this->template->load_view('back/products', $data);
    }

    public function newsletters() {
        $this->load->helper('form');

        $this->template->set_title('Newsletters');
        $this->template->set_layout('admin');

        $em = $this->doctrine->em;

//        Handle form submission
        if ($this->input->post('submit')) {

            $this->load->library('upload');
            $upload = $this->upload->_upload_image('uploads/images/newsletters');

            if ($this->input->post('submit') === 'edit') {
                $newsletter = $em->getReference('Entity\Newsletter', $this->input->post('id'));
                $newsletter->setName($this->input->post('name'));
                $newsletter->setLink($this->input->post('link'));
                $newsletter->setDescription($this->input->post('description'));

                $image = $newsletter->getImage();
                $image->setTitle($this->input->post('title'));

                if (array_key_exists('error', $upload)) {
                    $data = [
                        'error' => $upload['error']
                    ];
                } else {
                    $image->setLocation(base_url() . 'uploads/images/newsletters/' . $upload['upload_data']['file_name']);
                }
            } else if ($this->input->post('submit') === 'add') {
                $now = new DateTime;
                $newsletter = new Entity\Newsletter;
                $newsletter->setDateAdded($now->getTimestamp());
                $newsletter->setName($this->input->post('name'));
                $newsletter->setLink($this->input->post('link'));
                $newsletter->setDescription($this->input->post('description'));

                $image = new Entity\Image;
                $image->setTitle($this->input->post('title'));

                if (array_key_exists('error', $upload)) {
                    $data = [
                        'error' => $upload['error']
                    ];
                } else {
                    $image->setLocation(base_url() . 'uploads/images/newsletters/' . $upload['upload_data']['file_name']);
                }

                $em->persist($image);
                $newsletter->setImage($image);

                $em->persist($newsletter);
            } else if ($this->input->post('submit') === 'delete') {
                $newsletter = $em->getReference('Entity\Newsletter', $this->input->post('id'));
                $em->remove($newsletter);
            }
            $em->flush();
        }

//        Access newsletter records
        $data['newsletters'] = $em->getRepository('Entity\Newsletter')->findAll();

        $this->template->load_view('back/newsletters', $data);
    }

    public function recipes() {
        $this->load->library('doctrine');
        $this->template->set_title('Recipes');
        $this->template->set_layout('admin');
        $em = $this->doctrine->em;

        //        Handle form submission
        if ($this->input->post('submit')) {
            $this->load->library('upload');
            $uploadedImage = $this->upload->_upload_image('uploads/images/recipes');
            $uploadedFile = $this->_upload_recipe('uploads/files/recipes');
            if ($this->input->post('submit') === 'edit') {
                $recipe = $em->getReference('Entity\Recipe', $this->input->post('id'));
                $image = $recipe->getImage();
                $image->setTitle($this->input->post('title'));
                $recipe->setName($this->input->post('name'));
                $recipe->setDescription($this->input->post('description'));
                if (array_key_exists('error', $uploadedImage)) {
                    $data['errors']['image'] = $uploadedImage['error'];
                } else {
                    $image->setLocation(base_url() . 'uploads/images/recipes/' . $uploadedImage['upload_data']['file_name']);
                }
                if (array_key_exists('error', $uploadedFile)) {
                    $data['errors']['file'] = $uploadedFile['error'];
                } else {
                    $recipe->setFile(base_url() . 'uploads/files/recipes/' . $uploadedFile['upload_data']['file_name']);
                }
            } else if ($this->input->post('submit') === 'add') {
                $recipe = new Entity\Recipe;
                $now = new DateTime();
                $recipe->setDateAdded($now->getTimestamp());
                $recipe->setName($this->input->post('name'));
                $recipe->setDescription($this->input->post('description'));
                $image = new Entity\Image;
                $image->setTitle($this->input->post('title'));
                if (array_key_exists('error', $uploadedImage)) {
                    $data['errors']['image'] = $uploadedImage['error'];
                } else {
                    $image->setLocation(base_url() . 'uploads/images/recipes/' . $uploadedImage['upload_data']['file_name']);
                }

                if (array_key_exists('error', $uploadedFile)) {
                    $data['errors']['file'] = $uploadedFile['error'];
                } else {
                    $recipe->setFile(base_url() . 'uploads/files/recipes/' . $uploadedFile['upload_data']['file_name']);
                }
                $em->persist($image);
                $recipe->setImage($image);
                $em->persist($recipe);
            } else if ($this->input->post('submit') === 'delete') {
                $recipe = $em->getReference('Entity\Recipe', $this->input->post('id'));
                $em->remove($recipe->getImage());
                $em->remove($recipe);
            }
            $em->flush();
        }

        $data['recipes'] = $em->getRepository('Entity\Recipe')->findAll();
        $this->template->load_view('back/recipes', $data);
    }

    public function customers() {
        $em = $this->doctrine->em;

        $this->template->set_title('Recipes');
        $this->template->set_layout('admin');

        $data['activations'] = $em->getRepository('Entity\User')->findBy(['status' => 'pending']);
        $data['customers'] = $em->getRepository('Entity\User')->findAll();
        $this->template->load_view('back/customers', $data);
    }

    public function images() {
        $this->load->library('doctrine');
        $this->template->set_title('Images');
        $this->template->set_layout('admin');
        $em = $this->doctrine->em;


        if ($this->input->post('submitGallery')) {
            $gallery = new Entity\Gallery;
            $gallery->setName($this->input->post('name'));
            $gallery->setDescription($this->input->post('description'));
            $em->persist($gallery);
        }

        $em->flush();
        $galleries = $em->getRepository('Entity\Gallery')->findAll();
        $banners = $em->getRepository('Entity\Banner')->findAll();
        $data['banners'] = $banners;
        $data['galleries'] = $galleries;
        $this->template->load_view('back/images', $data);
    }

    private function _upload_recipe($path) {
        $config = [
            'upload_path' => $path,
            'allowed_types' => 'pdf|doc'
        ];
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('file')) {
            $data = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }
        return $data;
    }

    //Found on stack exchange
    function getWeek($date) {
        $first_of_month = new DateTime($date->format('Y/m/1'));
        $day_of_first = $first_of_month->format('N');
        $day_of_month = $date->format('j');
        return floor(($day_of_first + $day_of_month) / 7);
    }

    private function getWeekTimestamps($date) {

        $data['week_beginning'] = strtotime('last Monday', strtotime('tomorrow', $date->getTimestamp()));
        $data['week_ending'] = strtotime('next Sunday', strtotime('yesterday', $date->getTimestamp())) + 86399;
        return $data;
    }

    private function getDays($date) {
        $data = [];
        for ($i = 1; $i <= 7; $i++) {
            $date->setISODate($this->session->userdata('production_year'), $this->session->userdata('production_week'), $i);
            $data[Constants::$DAYS[$i]]['start'] = $date->getTimestamp();
            $data[Constants::$DAYS[$i]]['end'] = $date->getTimestamp() + 86399;
            $data[Constants::$DAYS[$i]]['date'] = $date->format('jS');
            $data[Constants::$DAYS[$i]]['day'] = $date->format('D');
        }

        return $data;
    }

}
