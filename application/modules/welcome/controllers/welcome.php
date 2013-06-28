<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
        
	public function index()
	{
            $this->load->library('Linkedin');
            
            $this->linkedin->init(); 
            $userLinkeddata = $this->linkedin->get_logged_in_users_profile();
            $data['linkindata'] = json_decode($userLinkeddata,TRUE);
            //print_r();
           // $params['x'] = "sfasf";
          //echo  modules::run('module', $params);
            $this->load->view('welcome_message',$data);
	}
        public function getLinkedinData() {
            $this->load->library('Linkedin');
            
            $this->linkedin->init(); 
            $userLinkeddata = $this->linkedin->get_logged_in_users_profile();
            $data['linkindata'] = json_encode($userLinkeddata);
            print_r($data['linkindata']);
            
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */