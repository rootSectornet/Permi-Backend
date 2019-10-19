<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kampus extends MY_Controller {

   public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login')=="") {
            redirect('Auth');
        }
        date_default_timezone_set("Asia/Jakarta");
        $this->load->library('Datatables','datatables');
        $this->load->model("Kampus_model","MKampus");
    }
    public function index($id_wilayah = 0){
        $data['uuid'] = base64_encode($this->session->userdata('login')->ID_User."#".date('Y-m-d'));
        $data['id_wilayah'] = $id_wilayah;
        $this->layout->view('Kampus/table',$data);
    }

    public function json_kampus($filter = 0){
          $this->datatables->select('ID_Kampus,Kampus,Alamat,Logo,Tgl_Join,Active,DB_Wilayah.ID_Wilayah,Wilayah');
          $this->datatables->join('DB_Wilayah','DB_Kampus.ID_Wilayah = DB_Wilayah.ID_Wilayah','INNER');
          if ($filter != 0) {
            $this->datatables->where('DB_Kampus.ID_Wilayah',$filter);
          }
          $this->datatables->from('DB_Kampus');
          $hasil = json_decode($this->datatables->generate());
          foreach ($hasil->data as $key => $row) {
            $row->Wilayah = "<a href='#'>".$row->Wilayah."</a>";
            $row->Kampus = "<a href='#'>".$row->Kampus."</a>";
            $row->Logo = "<a href='".base_url()."assets/img/kampus/".$row->Logo."'>".$row->Logo."</a>";
            $row->Tgl_Join = tanggal($row->Tgl_Join);
            $row->Active = ($row->Active == 1 ? "Active" : "Non Active");
            $row->number = $key+1;
            $row->action = ' <button type="button" onclick="Delete('.$row->ID_Kampus.')" class="btn btn-danger btn-xs delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>';
          }
          echo json_encode($hasil);
    }

    public function Create($uuid = null){
      if (is_null($uuid)) {
        $this->output->set_status_header('404');
      }else{
        $this->layout->view('Kampus/create',array('uuid'=>$uuid));
      }
    }

    public function SaveCreate($uuid = null){
      if (is_null($uuid)) {
        $this->output->set_status_header('404');
      }else{
        $config['upload_path']          = 'assets/img/kampus';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|PNG|JPG|JPEG';
        $config['overwrite']            = true;
        $config['max_size']             = 1024;
        $this->load->library('upload', $config);
        if(!empty($_FILES['Logo']['name'])){
          if ($this->upload->do_upload('Logo')) {
              $image = $this->upload->data();
              $logoKampus = $image['file_name'];
              $this->SetStatus(TRUE);
              $this->SetCode(200);
              $this->SetMessage(GetLanguage("FAILED"));
          }else{
              $logoKampus = "permilogo.png";
              $this->SetStatus(FALSE);
              $this->SetCode(300);
              $this->SetMessage($this->upload->display_errors());
              $this->Response();
              exit;
          }
        }else{
          $logoKampus = "permilogo.png";
          $this->SetStatus(TRUE);
          $this->SetCode(200);
          $this->SetMessage(GetLanguage("SUCCESS"));
        }

        if ($this->GetStatus()) {
          $data = array(
            "Kampus" => $this->input->post("Kampus"),
            "Alamat" =>  $this->input->post("Alamat"),
            "Logo"  =>  $logoKampus,
            "Tgl_Join" =>  $this->input->post("Tgl_Join"),
            "ID_Wilayah" =>  $this->input->post("ID_Wilayah"),
          );

          $this->db->trans_start();
            $id = $this->MKampus->save($data);
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

    }

    public function DeleteKampus($id = null){
      $this->db->trans_start();
        $id = $this->MKampus->deleteKampus($id);
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

    public function getKampus($uuid = null){
      if (is_null($uuid)) {
        $this->output->set_status_header('404');
      }else{
        $data = $this->MKampus->read();
        $this->SetStatus(TRUE);
        $this->SetCode(200);
        $this->SetMessage(array('data'=>$data));
        $this->Response();
        exit;
      }
    }

}
