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

class Event_model extends CI_Model
{

	public $table = "Event";
	public $primary = "ID_Event";


    public function read(){
      $tmp = $this->db->get($this->table)->result();
      if ($tmp) {
        foreach ($tmp as $key => $item) {
          $tmp[$key]->Picture = base_url()."assets/img/event/".$item->Picture;
        }
      }
      return $tmp;
    }
}

