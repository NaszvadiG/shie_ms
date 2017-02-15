<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class postTypeModel extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
	}


	/**
	 * ポストタイプ名からポストタイプIDを取得する。
	 * @param  [str]　$slug		ポストタイプ表示名
	 * @return [int]				ポストタイプID
	 */
	function getPostTypeNameToId($slug){
		$q = $this->db
		->select(array('id'))
		->from('post_types')
		->where('type_name',$slug)
		->get();
		$id = $q->row(0,'array');
		return $id['id'];
	}
}
