<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
*
*/
class Layout
{
	protected $CI;
	function __construct(){
		$this->CI =& get_instance();
	}

	function view($link,$param = null){
		$this->CI->load->view('Template/Header');
        $this->CI->load->view('Template/Menu');
        $this->CI->load->view($link,$param);
        $this->CI->load->view('Template/Footer');
	}
}