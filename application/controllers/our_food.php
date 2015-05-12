<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Our_Food extends CI_Controller {

    public function index() {
        $this->load->helper('form');
        $this->load->helper('text');
        
        $criteria = new \Doctrine\Common\Collections\Criteria();
        
        $em = $this->doctrine->em;
        if(!$this->session->userdata('usertype')){
            $this->session->set_userdata('usertype', 'public');
        }
        
        $this->template->set_layout('inner');
        $this->template->set_title('Our Food');
        $this->template->set_summary('Come check out our hand crafted recipes and food bags');
        $this->template->set_description('Find out about our products, create an order and check out our recipies that are given to us weekly by a friendly local');
        
        //Get latest recipes
        $criteria->orderBy(['dateAdded' => 'DESC'])
                ->getMaxResults(4);
        $data['recipes'] = $em->getRepository('Entity\Recipe')->matching($criteria);
        
        $data['bags'] = $em->getRepository('Entity\Bag')->findAll();
        $data['produce'] = $em->getRepository('Entity\Produce')->findAll();
        
        $this->template->load_view('front/our_food', $data);
    }
    
    public function order($edit = false){
        
        if(!$edit && $this->cart->total() === 0){
            redirect(base_url() . 'our_food');
        }
        
        $this->load->helper('form');

        $em = $this->doctrine->em;
        $data = [];

        $this->template->set_title('Order');
        $this->template->set_layout('inner');

        $data['bags'] = $em->getRepository('Entity\Bag')->findAll();
        $data['produce'] = $em->getRepository('Entity\Produce')->findAll();
        $data['deliveryPoints'][] = 'Please select...';
        $data['includes'] = [];
        $data['excludes'] = [];

        if ($this->session->userdata('userid')) {
            $data['user'] = $em->find('Entity\User', $this->session->userdata('userid'));

            foreach ($data['user']->getPreferences() as $preference) {
                if ($preference->getPrefer()) {
                    $data['includes'][$preference->getProduct()->getId()] = $preference->getProduct()->getVariety() . ' - ' . $preference->getProduct()->getName();
                } else {
                    $data['excludes'][$preference->getProduct()->getId()] = $preference->getProduct()->getVariety() . ' - ' . $preference->getProduct()->getName();
                }
            }

            if ($edit) {
                foreach ($data['user']->getOrder()->getLineItems() as $lineItem) {
                    $this->cart->insert([
                        'id' => $lineItem->getProduct()->getId(),
                        'qty' => $lineItem->getAmount(),
                        'price' => $lineItem->getQuantity()->getPriceByType($this->session->userdata('usertype'))->getAmount(),
                        'name' => $lineItem->getProduct()->getName(),
                        'options' => [
                            'type' => $lineItem->getProduct()->getType(),
                            'quantity-type' => $lineItem->getQuantity()->getId()
                        ]
                    ]);
                }
                $data['stepStart'] = 2;
            } else {
                $data['stepStart'] = 1;
            }
        }
        
        foreach ($this->cart->contents() as $item){
            if($item['options']['type'] === 'Bag'){
                $data['selectedBag'] = $item['id'];
            }
        }
        
        foreach ($em->getRepository('Entity\DeliveryPoint')->findAll() as $delivery) {
            $data['deliveryPoints'][$delivery->getId()] = $delivery->getAddress() . ' - ' . ucfirst($delivery->getDay());
        }

        $this->template->load_view('front/order', $data);
    }
    
    public function recipes($id = null){
        $em = $this->doctrine->em;
        $data = [];

        $this->template->set_title('Recipes');
        $this->template->set_summary('Hand crafted recipes updated weekly and provided by a community volunteer');
        $this->template->set_description('This is where you can find all the recipes we\'ve accumulated courtesy of our friendly volunteer. All of these recipes are based on produce we provide as part of our food bags');
        $this->template->set_layout('inner');
       
        $data['selectedRecipe'] = $id;
        
        $this->template->load_view('front/recipes', $data);
    }
}

/* End of file our_food.php */
/* Location: ./application/controllers/our_food.php */
