<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posting extends MY_Controller {

   public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login')=="") {
            redirect('Auth');
        }
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('Category_model','MCategory');
        $this->load->library('Datatables','datatables');
    }
    public function index(){
        $this->layout->view('Posting/table');
    }

    public function NewPosting(){
        $this->layout->view('Posting/create');
    }

    //category section

    public function getCategory(){
        $data = $this->MCategory->read();
        $this->SetStatus(TRUE);
        $this->SetCode(200);
        $this->SetMessage($data);
        $this->Response();
        exit;
    }

    public function CreateCategory(){
        $param = json_decode(file_get_contents("php://input"),true);
        $data['Category_name'] = $param['Category'];
        $this->db->trans_start();
            $id = $this->MCategory->save($data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === false) {
            $this->SetStatus(FALSE);
            $this->SetCode(300);
            $this->SetMessage(GetLanguage("FAILED"));
        }else{
            $this->SetStatus(TRUE);
            $this->SetCode(200);
            $this->SetMessage(GetLanguage("SUCCESS"));
        }
        $this->Response();
        exit;
    }

}
