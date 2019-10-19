<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class User_model
 *
 * @package         Permikomnas
 * @category        Model
 * @author          Tedi Susanto
 * @license         MIT
 * @link            Candahar.com
 */
class User_model extends CI_Model
{

	private $table = "DB_User";
	private $primary = "ID_User";

    public function save($param){
		$this->db->insert($this->table,$param);
		return $this->db->insert_id();
    }

    public function read(){
        return $this->db->get($this->table)->result();
    }

    public function ReadEmail($email){
    	$this->db->where("Email",$email);
    	$this->db->where("Active",1);
			$this->db->join("DB_StrukturOrganisasi","DB_StrukturOrganisasi.ID_User = DB_User.ID_User","INNER");
			$this->db->join("DB_Wilayah","DB_Wilayah.ID_Wilayah = DB_StrukturOrganisasi.ID_Wilayah","INNER");
    	return $this->db->get($this->table)->row();
    }
}
