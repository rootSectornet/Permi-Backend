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

class Category_model extends CI_Model
{

	public $table = "DB_Category";
	public $primary = "ID_Category";


    public function read(){
      return $this->db->get($this->table)->result();
    }

    public function save($param){
      $this->db->insert($this->table,$param);
      return $this->db->insert_id();
    }
}

