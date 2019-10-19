<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Permi extends MY_Controller {
  public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('Event_model','Event');
  }

  private function generateResponse($code,$message){
    if ($code == 300) {
        $this->SetStatus(FALSE);
        $this->SetCode(300);
    }else{
        $this->SetStatus(TRUE);
        $this->SetCode(200);
    }
    $this->SetMessage($message);
    $this->Response();
    exit;
  }

  public function Event(){
    $this->generateResponse(200,$this->Event->read());
  }






}
