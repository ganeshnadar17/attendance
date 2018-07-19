<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends MY_controller {
	
	function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }
	
	public function index($msg = NULL){
        // Load our view to be displayed
        // to the user
		$this->load->helper('url');
		$this->load->helper('html');
        $data['msg'] = $msg;
        $this->load->view('login_view', $data);
    }
    
    public function process()
	{
        // Load the model
        $this->load->model('login_model');
        // Validate the user can login
        $result = $this->login_model->validate();
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
            $msg = '<font color=red>Invalid username and/or password.</font><br />';
            $this->index($msg);
        }else{
            // If user did validate, 
            // Send them to members area
            redirect('home');
        }        
	}
	
	private function check_isvalidated(){
        if($this->session->userdata('validated')){
            redirect('home');
		}
    }
}
?>