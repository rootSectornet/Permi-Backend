<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class Picture_model
 *
 * @package         SweetMeet
 * @category        Model
 * @author          Tedi Susanto
 * @license         MIT
 * @link            Candahar.com
 */
class Wilayah_model extends CI_Model
{

	private $table = "DB_Wilayah";
	private $primary = "ID_Wilayah";

    public function save($param){
		$this->db->insert($this->table,$param);
		return $this->db->insert_id();
    }

    public function read($id = null){
        if (!is_null($id)) {
            $this->db->where($this->primary,$id);
            return $this->db->get($this->table)->row();
        }else{
            return $this->db->get($this->table)->result();
        }
    }

    public function ReadEmail($email){
    	$this->db->where("Email",$email);
    	$this->db->where("Active",1);
    	return $this->db->get($this->table)->row();
    }

	public function deleteWilayah($id){
		$this->db->where('ID_Wilayah',$id);
		$this->db->delete($this->table);
	}
}
