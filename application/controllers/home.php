<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $this->load->library('encrypt');
        $this->template->set_title('Home');
        $this->template->set_summary('Summary');
        $this->template->set_description('Description');
        $schemaTool = new \Doctrine\ORM\Tools\SchemaTool($em);
        $classes = $em->getMetadataFactory()->getAllMetadata();
        $schemaTool->updateSchema($classes);
        
        $data['banners'] = $em->getRepository('Entity\Banner')->findAll();
        $this->template->load_view('front/home', $data);
        
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
