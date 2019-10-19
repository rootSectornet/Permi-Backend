<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends MY_Controller {

   public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login')=="") {
            redirect('Auth');
        }
        $this->load->library('Layout','layout');
        $this->load->library('Datatables','datatables');
        $this->load->model('User_model','Muser');
        date_default_timezone_set("Asia/Jakarta");

    }
    public function index(){
        $this->layout->view('Anggota/table');
    }
    public function json_anggota(){
          $this->datatables->select('ID_User,Username,Email,Telp,DB_User.Alamat,Picture,DB_User.ID_Kampus,Kampus,Wilayah');
          $this->datatables->join('DB_Kampus','DB_Kampus.ID_Kampus = DB_User.ID_Kampus','INNER');
          $this->datatables->join('DB_Wilayah','DB_Kampus.ID_Wilayah = DB_Wilayah.ID_Wilayah','INNER');
          $this->datatables->from('DB_User');
          $hasil = json_decode($this->datatables->generate());
          foreach ($hasil->data as $key => $row) {
            $row->Username = "<a href='#'>".$row->Username."</a>";
            $row->Kampus = "<a href='#'>".$row->Kampus."</a>";
            $row->Wilayah = "<a href='#'>".$row->Wilayah."</a>";
            $row->foto = "<a href='".base_url()."assets/img/anggota/".$row->Picture."'>".$row->Picture."</a>";
            $row->number = $key+1;
            $row->action = ' <button type="button" onclick="Delete('.$row->ID_User.')" class="btn btn-danger btn-xs delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>';
          }
          echo json_encode($hasil);
    }

    public function Create(){
        $this->layout->view('Anggota/create');
    }

    public function SaveCreate($uuid = null){
      if (is_null($uuid)) {
        $this->output->set_status_header('404');
      }else{
        $config['upload_path']          = 'assets/img/anggota';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|PNG|JPG|JPEG';
        $config['overwrite']            = true;
        $config['max_size']             = 1024;
        $this->load->library('upload', $config);
        if(!empty($_FILES['Picture']['name'])){
          if ($this->upload->do_upload('Picture')) {
              $image = $this->upload->data();
              $logoKampus = $image['file_name'];
              $this->SetStatus(TRUE);
              $this->SetCode(200);
              $this->SetMessage(GetLanguage("FAILED"));
          }else{
              $logoKampus = "userr.png";
              $this->SetStatus(FALSE);
              $this->SetCode(300);
              $this->SetMessage($this->upload->display_errors());
              $this->Response();
              exit;
          }
        }else{
          $logoKampus = "userr.png";
          $this->SetStatus(TRUE);
          $this->SetCode(200);
          $this->SetMessage(GetLanguage("SUCCESS"));
        }

        if ($this->GetStatus()) {
          $data = array(
            "Username" => $this->input->post("Username"),
            "Password" =>  $this->input->post("Password"),
            "Email" =>  $this->input->post("Email"),
            "Telp" =>  $this->input->post("Telp"),
            "Alamat" =>  $this->input->post("Alamat"),
            "Picture"  =>  $logoKampus,
            "ID_Kampus" =>  $this->input->post("ID_Kampus"),
          );

          $this->db->trans_start();
            $id = $this->Muser->save($data);
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







}
