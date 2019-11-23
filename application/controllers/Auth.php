<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

   public function __construct() {
        parent::__construct();
        $this->load->library('Layout','layout');
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model("User_model","MUser");

    }
    public function index(){
       	$this->load->view("Login");
    }

    public function DoLogin(){
    	$param = json_decode(file_get_contents("php://input"),true);
    	$cek = $this->MUser->ReadEmail($param['Email']);
    	if ($cek) {
            if (password_verify($param['Password'],$cek->Password)) {
	    		$sess_data['login'] = $cek;
	    		$this->session->set_userdata($sess_data);
            	$code = 200;
            	$Message = GetLanguage("SUCCESSLOGIN");
            }else{
            	$code = 300;
            	$Message = GetLanguage("WRONGPASSWORD");
            }
    	}else{
    		$code = 300;
    		$Message = GetLanguage('WRONGEMAIL');
    	}
    	echo json_encode(array("code"=>$code,"Message"=>$Message));
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('Auth','refresh');
    }

    

}
