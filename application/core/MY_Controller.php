<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	private $_status;
  private $_code;
  private $_message;
  private static $instance;

	public function __construct()
	{
      self::$instance =& $this;
    	parent::__construct();
      $this->load->library('Layout','layout');
  }

  public function SetStatus($status = FALSE){
    $this->_status = $status;
  }
  public function GetStatus(){
    return $this->_status;
  }

  public function SetCode($code = 300){
    $this->_code = $code;
  }
  public function GetCode(){
    return $this->_code;
  }

  public function SetMessage($message = ""){
    $this->_message = $message;
  }
  public function GetMessage(){
    return $this->_message;
  }

  public function Response(){
    echo json_encode(array("Code"=>$this->_code,"Status"=>$this->_status,"Message"=>$this->_message));
  }

}