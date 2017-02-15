<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class sysSetModel extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
	}


	public function getSysSet($key){
		$q = $this->db
		->select(array('val'))
		->from('system_setting')
		->where('key',$key)
		->get();
		$r = $q->row(0,'array');
		return $r['val'];
	}
}
