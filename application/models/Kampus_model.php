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
class Kampus_model extends CI_Model
{

	private $table = "DB_Kampus";
	private $primary = "ID_Kampus";

    public function save($param){
  		$this->db->insert($this->table,$param);
  		return $this->db->insert_id();
    }
    
    public function read(){
        return $this->db->get($this->table)->result();
    }
	public function deleteKampus($id){
		$this->db->where($this->primary,$id);
		$this->db->delete($this->table);
	}
  public function getByWilayah($id){
    $this->db->where('DB_Kampus.ID_Wilayah',$id);
    return $this->db->get($this->table)->result();
  }
}
