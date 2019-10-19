<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends MY_Controller {

   public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login')=="") {
            redirect('Auth');
        }
        date_default_timezone_set("Asia/Jakarta");
        $this->load->library('Datatables','datatables');
        $this->load->model("Wilayah_model","MWilayah");
        $this->load->model("Kampus_model","MKampus");
    }
    public function index(){
        $this->layout->view('Wilayah/table');
    }


    public function json_wilayah($wilayah = null){
          $this->datatables->select('ID_Wilayah,Wilayah,Deskripsi,Gambar,Aktif,Created,Parent');
          $this->datatables->from('DB_Wilayah');
          $hasil = json_decode($this->datatables->generate());
          foreach ($hasil->data as $key => $row) {
            $row->Wilayah = "<a href='".base_url()."Wilayah/detail/".$row->ID_Wilayah."'>".$row->Wilayah."</a>";
            $row->number = $key+1;
            $row->action = ' <button type="button" onclick="Delete('.$row->ID_Wilayah.')" class="btn btn-danger btn-xs delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>';
          }
          echo json_encode($hasil);
    }

    public function Save(){
      $config['upload_path']          = 'assets/img/wilayah';
      $config['allowed_types']        = 'gif|jpg|png|jpeg|PNG|JPG|JPEG';
      $config['overwrite']            = true;
      $config['max_size']             = 1024;
      $this->load->library('upload', $config);
      if(!empty($_FILES['Foto']['name'])){
        if ($this->upload->do_upload('Foto')) {
            $image = $this->upload->data();
            $logoWilayah = $image['file_name'];
            $this->SetStatus(TRUE);
            $this->SetCode(200);
            $this->SetMessage(GetLanguage("FAILED"));
        }else{
            $logoWilayah = "permilogo.png";
            $this->SetStatus(FALSE);
            $this->SetCode(300);
            $this->SetMessage($this->upload->display_errors());
            $this->Response();
            exit;
        }
      }else{
        $logoWilayah = "permilogo.png";
        $this->SetStatus(TRUE);
        $this->SetCode(200);
        $this->SetMessage(GetLanguage("SUCCESS"));
      }

      if ($this->GetStatus()) {
        $data = array(
          "Wilayah" => $this->input->post("Wilayah"),
          "Deskripsi" =>  $this->input->post("Deskripsi"),
          "Gambar"  =>  $logoWilayah,
          "Parent"  =>  1,
        );

        $this->db->trans_start();
          $id = $this->MWilayah->save($data);
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

    public function DeleteWilayah($id = null){
      $this->db->trans_start();
        $id = $this->MWilayah->deleteWilayah($id);
      $this->db->trans_complete();
      if ($this->db->trans_status() === false) {
        $this->SetStatus(FALSE);
        $this->SetCode(300);
        $this->SetMessage(GetLanguage("FAILEDDELETE"));
      }else{
        $this->SetStatus(TRUE);
        $this->SetCode(200);
        $this->SetMessage(GetLanguage("SUCCESSDELETE"));
      }
      $this->Response();
      exit;
    }

    public function getWilayah($uuid = null){
      if (is_null($uuid)) {
        $this->output->set_status_header('404');
      }else{
        $data = $this->MWilayah->read();
        $this->SetStatus(TRUE);
        $this->SetCode(200);
        $this->SetMessage(array('data'=>$data));
        $this->Response();
        exit;
      }
    }

    public function detail($id){
      $data['wilayah'] = $this->MWilayah->read($id);
      $data['totalKampus'] = sizeof($this->MKampus->getByWilayah($id));
      $this->layout->view('wilayah/detail',$data);
    }

}
