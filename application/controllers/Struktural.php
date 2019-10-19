<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Struktural extends MY_Controller {

   public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login')=="") {
            redirect('Auth');
        }
        $this->load->library('Layout','layout');
        $this->load->library('Datatables','datatables');
        $this->load->model('Struktural_model','Mstruktural');
        date_default_timezone_set("Asia/Jakarta");

    }
    public function index($id_wilayah = 0){
        $data['strukturals'] = $this->Mstruktural->read(null,$id_wilayah);
        $this->layout->view('Struktural/table',$data);
    }







}
