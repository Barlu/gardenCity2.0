<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Account extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->load->library('table');
        $tmpl = [
            'table_open' => '<table class="table">'
        ];
        $this->table->set_template($tmpl);

        $this->load->helper('form');

        $em = $this->doctrine->em;

        $this->template->set_title('Account');
        $this->template->set_summary('Modify your account details, check orders, cancel subscriptions');
        $this->template->set_layout('inner');

        $data['user'] = $em->find('Entity\User', $this->session->userdata('userid'));

        if ($data['user']->getOrder()) {
            $data['order'][] = ['Name', 'Qty', 'Qty Type', 'Unit Price', 'Sub-Total'];
            $total = 0;

            foreach ($data['user']->getOrder()->getLineItems() as $lineItem) {
                if ($lineItem->getProduct()->getType() === 'Produce') {
                    $data['order'][] = [
                        $lineItem->getProduct()->getVariety() . ' - ' . $lineItem->getProduct()->getName(),
                        $lineItem->getAmount(),
                        $lineItem->getQuantity()->getName(),
                        '$' . $this->cart->format_number($lineItem->getQuantity()->getPriceByType($this->session->userdata('usertype'))->getAmount()),
                        '$' . $this->cart->format_number($lineItem->getQuantity()->getPriceByType($this->session->userdata('usertype'))->getAmount() * $lineItem->getAmount())
                    ];
                } else {
                    $data['order'][] = [
                        $lineItem->getProduct()->getName(),
                        $lineItem->getAmount(),
                        $lineItem->getQuantity()->getName(),
                        '$' . $this->cart->format_number($lineItem->getQuantity()->getPriceByType($this->session->userdata('usertype'))->getAmount()),
                        '$' . $this->cart->format_number($lineItem->getQuantity()->getPriceByType($this->session->userdata('usertype'))->getAmount() * $lineItem->getAmount())
                    ];
                }

                $total += $lineItem->getQuantity()->getPriceByType($this->session->userdata('usertype'))->getAmount() * $lineItem->getAmount();
            }

            $data['order'][] = ['', '', '', '<strong>Total</strong>', '$' . $this->cart->format_number($total)];
            $nextDelivery = new DateTime();
            $nextDelivery->setTimestamp($data['user']->getOrder()->getNextDelivery());
            $data['deliveryPoint'] = $data['user']->getOrder()->getDeliveryPoint();
            $data['nextDelivery'] = $nextDelivery->format('D, dS M');
            $data['frequency'] = Constants::$FREQUENCIES[$data['user']->getOrder()->getFrequency()];
        }
        $data['includes'] = [];
        $data['excludes'] = [];
        foreach ($data['user']->getPreferences() as $preference) {
            if ($preference->getPrefer()) {
                $data['includes'][$preference->getProduct()->getId()] = $preference->getProduct()->getVariety() . ' ' . $preference->getProduct()->getName();
            } else {
                $data['excludes'][$preference->getProduct()->getId()] = $preference->getProduct()->getVariety() . ' ' . $preference->getProduct()->getName();
            }
        }

        $this->template->load_view('front/account', $data);
    }

}
