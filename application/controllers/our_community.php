<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Our_Community extends CI_Controller {

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
        $this->load->library('doctrine');
        $em = $this->doctrine->em;
        
        $this->load->library('template');
        $this->template->set_title('Our Community');
        $this->template->set_summary('Summary');
        $this->template->set_description('Description');
        $this->template->set_layout('inner');
        
        
        
        
        $this->template->load_view('front/our_community');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
