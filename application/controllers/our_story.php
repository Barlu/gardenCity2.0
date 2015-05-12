<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Our_Story extends CI_Controller {

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
        $em = $this->doctrine->em;

        $this->template->set_title('Our Story');
        $this->template->set_summary('Learn about us and our journy to bring fresh local produce to the city of Christchurch');
        $this->template->set_description('Here you can read about how we got to where we are today, why and where we\'re going. You\'ll also find plenty of images in our gallery');
        $this->template->set_layout('inner');
        
        $data['galleries'] = $em->getRepository('Entity\Gallery')->findAll();
        
        $this->template->load_view('front/our_story', $data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
