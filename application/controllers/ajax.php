<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajax extends CI_Controller {

    /**
     * Handles calls for dynamic tab content accross the site
     * All calls for files are assumed to have the '_pane' suffix
     * 
     */
    public function getContent() {
        $this->load->helper('form');

        $namespace = '';
        $em = $this->doctrine->em;

        if ($this->input->get('type') === 'newsletter' || $this->input->get('type') === 'recipe') {
            $content = $em->find('Entity\Content', $this->input->get('id'));
            $image = $content->getImage();

            $data['content'] = $content;
            $data['image'] = $image;

            $namespace = 'content/';
        } else if ($this->input->get('type') === 'banner-image') {
            $data['banner'] = $em->find('Entity\Banner', $this->input->get('id'));
            $data['image'] = $data['banner']->getImage();

            $namespace = 'content/images/';
        } else if ($this->input->get('type') === 'gallery') {
            $data['gallery'] = $em->find('Entity\Gallery', $this->input->get('id'));

            $namespace = 'content/images/';
        } else if ($this->input->get('type') === 'image') {
            $data['image'] = $em->find('Entity\Image', $this->input->get('id'));

            $namespace = 'content/images/';

            //Identifies if request if for a product as quantities are also required
        } else if ($this->input->get('type') === 'bag-details' || $this->input->get('type') === 'bag-quantities' || $this->input->get('type') === 'bag-pricing' || $this->input->get('type') === 'produce-details' || $this->input->get('type') === 'produce-quantities' || $this->input->get('type') === 'produce-pricing') {
            $product = $em->find('Entity\Product', $this->input->get('id'));

            $data['product'] = $product;
            $data['quantities'] = $product->getQuantities();

            foreach ($data['quantities'] as $quantity) {
                $data['quantitiesArray'][$quantity->getId()] = $quantity->getName();
            }

            $namespace = 'manage/products/';
        } else if ($this->input->get('type') === 'delivery') {
            $data['delivery'] = $em->find('Entity\DeliveryPoint', $this->input->get('id'));
            foreach ($em->getRepository('Entity\User')->findBy([], ['firstName' => 'ASC']) as $user) {
                if ($user->getType() !== 'wholesaler') {
                    $data['userArray'][$user->getId()] = $user->getFirstName() . ' ' . $user->getLastName();
                }
            }

            $namespace = 'manage/deliveries/';
        } else if ($this->input->get('type') === 'newsletter-accordian' || $this->input->get('type') === 'newsletter-tab') {
            $data['newsletter'] = $em->find('Entity\Newsletter', $this->input->get('id'));
        } else if ($this->input->get('type') === 'recipe-accordian' || $this->input->get('type') === 'recipe-tab') {
            $data['recipe'] = $em->find('Entity\Recipe', $this->input->get('id'));
        } else if ($this->input->get('type') === 'customer') {
            $data['customer'] = $em->find('Entity\User', $this->input->get('id'));

            $namespace = 'manage/customers/';
        }
        $this->load->view('partials/' . $namespace . $this->input->get('type') . '_pane', $data);
    }

    /*     * *************************************
     * 
     *      QUANTITIES AND PRICING
     * 
     * ************************************* */

    /**
     * Handles adding of prices and quantites
     */
    public function add() {
        $em = $this->doctrine->em;

        if ($this->input->post('pricing')) {
            $quantity = $em->getReference('Entity\Quantity', $this->input->post('quantity'));
            $price = new Entity\Price;
            $price->setAmount($this->input->post('amount'));
            $price->setType($this->input->post('price-type'));
            $em->persist($price);
            $quantity->addPrice($price);
            $em->flush();

            $data['type'] = 'price';
            $data['price'] = $price->getId();
            $data['quantity'] = $quantity->getId();
        } else if ($this->input->post('quantities')) {
            $product = $em->getReference('Entity\Product', $this->input->post('quantities'));
            $quantity = new Entity\Quantity;
            $quantity->setName($this->input->post('name'));
            $quantity->setValue($this->input->post('value'));
            $quantity->setWatch($this->input->post('watch'));
            $quantity->setDescription($this->input->post('description'));
            $em->persist($quantity);
            $product->addQuantity($quantity);
            $em->flush();

            $data['type'] = 'quantity';
            $data['quantity'] = $quantity->getId();
            $data['product'] = $product->getId();
        }
        echo json_encode($data);
    }

    /**
     * Handles dynamic form requests for quantities a prices
     * Deals with both empty and filled requests which is identified by 'type' via GET
     * Also recieves id via get which will either be product, quantity or price id
     */
    public function getForm() {
        $this->load->helper('form');

        $em = $this->doctrine->em;
        $type = $this->input->get('type');
        $data = [];

        //Checks whether is is for a price or quantity
        if (strrpos($type, 'pricing') !== false) {
            //If request is for a filled form
            if (strrpos($type, 'empty') === false) {
                //Finds product and quantity by price association
                $data['price'] = $em->find('Entity\Price', $this->input->get('id'));
                $data['quantity'] = $data['price']->getQuantity();
                $product = $data['quantity']->getProduct();
            } else {
                //Otherwise id will be product id
                $product = $em->getReference('Entity\Product', $this->input->get('id'));
            }
            foreach ($product->getQuantities() as $quantity) {
                //Creates array for quantity selection in the form
                $data['quantitiesArray'][$quantity->getId()] = $quantity->getName();
            }

            $this->load->view('partials/manage/products/' . $this->input->get('type') . '_form', $data);
            //If quantity
        } else if (strrpos($type, 'quantities') !== false) {
            //If request is for a filled form
            if (strrpos($type, 'empty') === false) {
                $data['quantity'] = $em->find('Entity\Quantity', $this->input->get('id'));
                $data['product'] = $data['quantity']->getProduct();
            } else {
                //Otherwise id will be product id
                $data['product'] = $em->find('Entity\Product', $this->input->get('id'));
            }
            $this->load->view('partials/manage/products/' . $this->input->get('type') . '_form', $data);
        }
    }

    /*     * *******************************
     * END OF QUANTITIES AND PRICING
     * ******************************* */

    /**
     * Handles display of newsletters based on screen width
     */
    public function getNewsletters($type) {
        $em = $this->doctrine->em;
        $data['newsletters'] = $em->getRepository('Entity\Newsletter')->findAll();
        $this->load->view('partials/newsletter-' . $type, $data);
    }

    /**
     * Handles display of recipes based on screen width
     */
    public function getRecipes($type, $id = null) {
        $em = $this->doctrine->em;
        $data['recipes'] = $em->getRepository('Entity\Recipe')->findAll();
        $data['selectedRecipe'] = $id;
        $this->load->view('partials/recipe-' . $type, $data);
    }

    /**
     * Handels edit and delete functions site wide
     * Target is identified by 'type' value via post
     */
    public function editDelete() {
        $this->load->library('upload');
        $em = $this->doctrine->em;

        if ($this->input->post('type') === 'editGallery') {
            $gallery = $em->getReference('Entity\Gallery', $this->input->post('id'));
            $gallery->setName($this->input->post('name'));
            $gallery->setDescription($this->input->post('description'));
        } else if ($this->input->post('type') === 'deleteGallery') {
            $gallery = $em->getReference('Entity\Gallery', $this->input->post('id'));
            $em->remove($gallery);
        } else if ($this->input->post('type') === 'editImage') {
            $image = $em->getReference('Entity\Image', $this->input->post('id'));
            $image->setTitle($this->input->post('title'));
        } else if ($this->input->post('type') === 'deleteImage') {
            $image = $em->getReference('Entity\Image', $this->input->post('id'));
            $em->remove($image);
        } else if ($this->input->post('type') === 'editBanner') {
            $banner = $em->getReference('Entity\Banner', $this->input->post('id'));
            $banner->getImage()->setTitle($this->input->post('title'));
            $banner->setHeading($this->input->post('heading'));
            $banner->setLink($this->input->post('link'));
            $banner->setCaption($this->input->post('caption'));
        } else if ($this->input->post('type') === 'deleteBanner') {
            $banner = $em->getReference('Entity\Banner', $this->input->post('id'));
            $em->remove($banner);
        } else if ($this->input->post('type') === 'editBag') {
            $upload = $this->upload->_upload_image('uploads/images/products');

            $bag = $em->getReference('Entity\Product', $this->input->post('id'));
            $bag->setName($this->input->post('name'));
            $bag->setDescription($this->input->post('description'));
            $bag->getImage()->setTitle($this->input->post('title'));
        } else if ($this->input->post('type') === 'deleteBag') {
            $bag = $em->find('Entity\Product', $this->input->post('id'));
            $em->remove($bag);
        } else if ($this->input->post('type') === 'editProduce') {
            $upload = $this->upload->_upload_image('uploads/images/products');

            $produce = $em->find('Entity\Product', $this->input->post('id'));
            $produce->setName($this->input->post('name'));
            $produce->setDescription($this->input->post('description'));
            $produce->getImage()->setTitle($this->input->post('title'));
        } else if ($this->input->post('type') === 'deleteProduce') {
            $produce = $em->find('Entity\Product', $this->input->post('id'));
            $em->remove($produce);
        } else if ($this->input->post('type') === 'editQuantity') {
            $quantity = $em->getReference('Entity\Quantity', $this->input->post('id'));
            $quantity->setDescription($this->input->post('description'));
            $quantity->setName($this->input->post('name'));
            $quantity->setValue($this->input->post('value'));
            $quantity->setWatch($this->input->post('watch'));
        } else if ($this->input->post('type') === 'deleteQuantity') {
            $quantity = $em->getReference('Entity\Quantity', $this->input->post('id'));
            $em->remove($quantity);
        } else if ($this->input->post('type') === 'editPrice') {
            $price = $em->getReference('Entity\Price', $this->input->post('id'));
            $price->setQuantity($em->getReference('Entity\Quantity', $this->input->post('quantity')));
            $price->setAmount($this->input->post('amount'));
            $price->setType($this->input->post('price-type'));
        } else if ($this->input->post('type') === 'deletePrice') {
            $price = $em->getReference('Entity\Price', $this->input->post('id'));
            $em->remove($price);
        }
        $em->flush();
    }

    /*     * ***********************************
     * 
     *          SHOPPING CART
     * 
     * *********************************** */

    /**
     * Handles adding products to the cart
     * Also checks if a bag is already in the cart and if so will delete and add new one as only 1 bag is allowed per customer
     */
    public function addToCart() {
        $em = $this->doctrine->em;

        //If quantity type exists this item will be produce
        if ($this->input->post('quantity-type')) {
            //Find the right price based on user type
            $quantity = $em->find('Entity\Quantity', $this->input->post('quantity-type'));
            $p = $quantity->getPriceByType($this->session->userdata('usertype'));
            $price = $p->getAmount();

            //If not it will be a bag   
        } else {
            $price = $this->input->post('price');
        }

        $data = [
            'id' => $this->input->post('id'),
            'qty' => $this->input->post('quantity'),
            'price' => $price,
            'name' => $this->input->post('name'),
            'options' => [
                'type' => $this->input->post('type'),
                'quantity-type' => $this->input->post('quantity-type')
            ]
        ];

        //Check if item to add is a bag and if a bag is already in the cart
        if ($this->input->post('type') === 'Bag') {
            foreach ($this->cart->contents() as $item) {
                if ($item['options']['type'] === 'Bag') {
                    //Deletes previous bag from cart
                    $this->cart->update(['rowid' => $item['rowid'], 'qty' => 0]);
                }
            }
        }

        $this->cart->insert($data);

        //Total is sent back to be added to login cart
        $response['total'] = $this->cart->total_items();

        echo json_encode($response);
    }

    /**
     * Handles updating shopping cart quantities from order screen
     */
    public function updateCart() {

        $data = [
            'rowid' => $this->input->post('id'),
            'qty' => $this->input->post('quantity'),
        ];

        $this->cart->update($data);

        if ($data['qty'] === 0) {
            $response['delete'] = TRUE;
        } else {
            //Calculates new subtotals
            foreach ($this->cart->contents() as $item) {
                if ($item['rowid'] === $data['rowid']) {
                    $response['subtotal'] = $item['subtotal'];
                }
            }
        }
        $response['total'] = $this->cart->total();


        /**
         * This pice of code is to allow users to update their order from their account
         * however client does not want to provide ability to do this at this stage
         */
//        else if ($this->input->post('type') === 'account') {
//            $em = $this->doctrine->em;
//            $lineItem = $em->find('Entity\LineItem', $this->input->post('id'));
//            if ($this->input->post('quantity') === 0) {
//                $em->remove($lineItem);
//                $response['delete'] = TRUE;
//            } else {
//
//                if ($this->input->post('quantity-type')) {
//                    $quantity = $em->find('Entity\Quantity', $this->input->post('quantity-type'));
//                    $lineItem->setQuantity($quantity);
//                }
//                $lineItem->setAmount($this->input->post('quantity'));
//                $price = $lineItem->getQuantity()->getPriceByType($this->session->userdata('usertype'));
//
//                $response['subtotal'] = (float) $this->cart->format_number($price->getAmount() * $lineItem->getAmount());
//            }
//            $em->flush();
//            $total = (float) 0;
//            foreach ($lineItem->getOrder()->getLineItems() as $lineItem) {
//                $price = $lineItem->getQuantity()->getPriceByType($this->session->userdata('usertype'));
//                $total += (float) $lineItem->getAmount() * (float) $price->getAmount();
//            }
//            $response['total'] = (float) $this->cart->format_number($total);
//        }

        echo json_encode($response);
    }

    /**
     * Handles display of delivery details in the 'Delivery Details' section
     * at the end of the order process
     */
    public function getDeliveryDescription() {
        $this->load->helper('form');
        $em = $this->doctrine->em;

        //Identifies delivery point
        $data['delivery'] = $em->find('Entity\DeliveryPoint', $this->input->get('id'));

        //Identifies the full name day from constants using stored index
        $delivery_day = Constants::$DELIVERY_DAYS[$data['delivery']->getDay()];

        $now = new DateTime();
        $cutoff = new DateTime();
        $firstDate = new DateTime();

        //Work out cutoff time
        $cutoff->modify('next ' . $delivery_day);
        $cutoff->modify('yesterday');
        $cutoff->modify(Constants::$CUTOFF);

        //Check that now is before cutoff       
        if ($now->getTimestamp() > $cutoff->getTimestamp()) {
            //If not advance a week
            $cutoff->modify('tomorrow');
            $firstDate = $cutoff->modify('next ' . $delivery_day);
        } else {
            //Else set it to the closest valid day
            $firstDate = $cutoff->modify('tomorrow');
        }

        //Creates list of days based on how many weeks the user should be allowed to set first order to
        for ($i = 0; $i < Constants::$WEEKS_IN_ADVANCE; $i++) {
            $data['days'][$firstDate->getTimestamp()] = $firstDate->format('D dS F o');
            $firstDate->modify('next ' . $delivery_day);
        }

        $this->load->view('partials/shop/delivery-description', $data);
    }

    /**
     * Handles end of the order process
     * In future this will action on condition of successful response from gateway
     */
    public function addOrder() {
        $em = $this->doctrine->em;

        $order = new Entity\Order;
        $order->setDeliveryPoint($em->find('Entity\DeliveryPoint', $this->input->post('deliveryPoint')));
        $order->setFirstDelivery($this->input->post('firstDay'));
        $order->setNextDelivery($this->input->post('firstDay'));
        $order->setFrequency($this->input->post('frequency'));

        foreach ($this->cart->contents() as $item) {
            $lineItem = new Entity\LineItem;
            $lineItem->setQuantity($em->find('Entity\Quantity', $item['options']['quantity-type']));
            $lineItem->setProduct($em->find('Entity\Product', $item['id']));
            $lineItem->setAmount($item['qty']);
            $em->persist($lineItem);
            $order->addLineItem($lineItem);
        }

        $em->persist($order);

        $this->addEditPreferences();

        $user = $em->getReference('Entity\User', $this->session->userdata('userid'));

        if ($user->getOrder()) {
            $em->remove($user->getOrder());
        }

        $user->setOrder($order);

        $this->cart->destroy();

        $em->flush();
    }

    /**
     * Used to refresh order-view of subtotals
     */
    public function refreshOrderView() {
        $this->load->helper('form');
        $this->load->view('partials/shop/view-order');
    }

    /*     * ************************
     *  END OF SHOPPING CART
     * ************************ */

    public function addEditPreferences($edit = false) {
        $em = $this->doctrine->em;
        $user = $em->getReference('Entity\User', $this->session->userdata('userid'));
        foreach ($user->getPreferences() as $preference) {
            $em->remove($preference);
        }
        $em->flush();

        foreach ($this->input->post('include') as $prefer) {
            $preference = new Entity\Preference;
            $product = $em->getReference('Entity\Product', $prefer);
            $preference->setProduct($product);
            $preference->setUser($user);
            $preference->setPrefer(TRUE);
            $em->persist($preference);
            $user->addPreference($preference);
        }

        foreach ($this->input->post('exclude') as $exclude) {
            $preference = new Entity\Preference;
            $product = $em->getReference('Entity\Product', $exclude);
            $preference->setProduct($product);
            $preference->setUser($user);
            $preference->setPrefer(FALSE);
            $em->persist($preference);
            $user->addPreference($preference);
        }
        $em->flush();
    }

    /*     * **********************************
     * 
     *        ACCOUNT MANAGEMENT
     * 
     * ********************************** */

    /**
     * 
     * Handles new and existing registrations
     * @var $type identifies whether it is add or edit
     * 
     */
    public function addEditRegistration($type) {
        $this->load->library('encrypt');

        $em = $this->doctrine->em;

        if ($type === 'add') {
            if ($this->input->post('wholesaler')) {
                $user = new Entity\Wholesaler;
            } else {
                $user = new Entity\Customer;
            }
            //Final check to ensure username is not taken/double submits
            if (!$this->checkUnique($this->input->post('username'), 'username')) {
                return json_encode(FALSE);
            }

            if ($this->session->userdata('usertype') === 'admin' || !$this->input->post('wholesaler')) {
                $user->setStatus('active');
            } else {
                //This means user is wholesaler and account needs to be activated before use
                $user->setStatus('pending');
            }
        } else {
            $user = $em->find('Entity\User', $this->input->post('id'));
        }

        if ($type === 'delete') {
            $em->remove($user);
        } else {
            $user->setFirstName($this->input->post('firstName'));
            $user->setLastName($this->input->post('lastName'));
            $user->setUsername(strtolower($this->input->post('username')));
            $user->setPhone($this->input->post('phone'));
            $user->setEmail($this->input->post('email'));

            if ($user->getType() === 'wholesaler') {
                $user->setBusinessName($this->input->post('businessName'));
            }
            if ($this->input->post('activate') && $this->session->userdata('usertype') === 'admin') {
                $user->setStatus('active');
            }

            if ($this->input->post('password')) {
                if ($this->input->post('password') === $this->input->post('passwordRepeat')) {
                    $user->setPassword($this->encrypt->encode($this->input->post('password')));
                } else {
                    echo json_encode('error');
                    return;
                }
            }
            $em->persist($user);
        }
        $em->flush();

        if ($type === 'add' && $this->session->userdata('usertype') !== 'admin') {
            //Log the user in if its a new registration | Uses password from post as this is unencrypted string
            $this->logIn($user->getUsername(), $this->input->post('password'));
        } else {
            echo json_encode(['id' => $this->input->post('id')]);
        }
    }

    /**
     * Handles logging in
     * Variable allow for registation function to call logIn() and pass through customer details
     */
    public function logIn($username = null, $password = null) {
        $this->load->library('encrypt');
        $em = $this->doctrine->em;

        //If null must have come from user so check post
        if ($username === null && $password === null) {
            $username = strtolower($this->input->post('username'));
            $password = $this->input->post('password');
        }
        $user = $em->getRepository('Entity\User')->findOneBy(['username' => $username]);

        //If user exists and password is correct log them in
        if (!empty($user) && $this->encrypt->decode($user->getPassword()) === $password && $user->getStatus() === 'active') {
            $this->session->set_userdata('usertype', $user->getType());
            $this->session->set_userdata('userid', $user->getId());
            $data['user'] = $user;
            //Load view to display name and log out link
            if ($user->getType() === 'admin') {
                $this->load->view('partials/admin-account_link', $data);
            } else {
                $this->load->view('partials/account_link', $data);
            }
            return;
        }

        //If you've got to here there's a problem
        echo 'error';
    }

    /**
     * Handles logout
     */
    public function logOut() {
        $this->session->set_userdata('usertype', 'public');
        $this->session->unset_userdata('userid');

        $this->load->view('partials/login_link');
    }

    /**
     * A function to supply current protuct listing as an array for source data of typahead for include/excludes
     */
    public function getProduceArray() {
        $em = $this->doctrine->em;
        $products = $em->getRepository('Entity\Produce')->findAll();
        $data = [];
        foreach ($products as $product) {
            $data[] = ['id' => $product->getId(), 'name' => $product->getVariety() . ' ' . $product->getName()];
        }
        echo json_encode($data);
    }

    public function getCustomerArray() {
        $em = $this->doctrine->em;
        $users = $em->getRepository('Entity\User')->findAll();
        $data = [];
        foreach ($users as $user) {
            $data[] = ['id' => $user->getId(), 'name' => $user->getFirstName()];
        }
        echo json_encode($data);
    }

    public function checkUnique($str = null, $type = null) {
        $em = $this->doctrine->em;
        if ($str === null) {
            if ($this->input->get('username')) {
                $user = $em->getRepository('Entity\User')->findBy(['username' => $this->input->get('username')]);
            } else if ($this->input->get('email')) {
                $user = $em->getRepository('Entity\User')->findBy(['email' => $this->input->get('email')]);
            }
            if (empty($user)) {
                echo json_encode(TRUE);
            } else {
                echo json_encode(FALSE);
            }
        } else {
            if ($type === 'username') {
                $user = $em->getRepository('Entity\User')->findBy(['username' => $str]);
            } else if ($type === 'username') {
                $user = $em->getRepository('Entity\User')->findBy(['email' => $str]);
            }
            if (empty($user)) {
                return TRUE;
            }
            return FALSE;
        }
    }

}
