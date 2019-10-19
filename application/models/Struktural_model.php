<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class Picture_model
 *
 * @package         Permikomnas
 * @category        Model
 * @author          Tedi Susanto
 * @license         MIT
 * @link            Candahar.com
 */
class Struktural_model extends CI_Model
{

	private $table = "DB_StrukturOrganisasi";
	private $primary = "ID_StrukturOrgranisasi";

    public function save($param){
  		$this->db->insert($this->table,$param);
  		return $this->db->insert_id();
    }
    
    public function read($id = null,$ID_Wilayah = null){
        if (!is_null($id)) {
          $this->db->where('DB_StrukturOrganisasi.ID_StrukturOrgranisasi',$id);
        }
        if (!is_null($ID_Wilayah)) {
          $this->db->where('DB_StrukturOrganisasi.ID_Wilayah',$ID_Wilayah);
        }
        $this->db->select('DB_StrukturOrganisasi.*,DB_User.Username,DB_Wilayah.Wilayah,DB_Kampus.ID_Kampus,DB_Kampus.Kampus');
        $this->db->join('DB_User','DB_User.ID_User = DB_StrukturOrganisasi.ID_User','inner');
        $this->db->join('DB_Wilayah','DB_Wilayah.ID_Wilayah = DB_StrukturOrganisasi.ID_Wilayah','inner');
        $this->db->join('DB_Kampus','DB_Kampus.ID_Kampus = DB_User.ID_Kampus','inner');
        return $this->db->get($this->table)->result();
    }
  	public function deleteKampus($id){
  		$this->db->where($this->primary,$id);
  		$this->db->delete($this->table);
  	}
}
