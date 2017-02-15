<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class categoryModel extends CI_Model
{

	var $PostTypeId = '';
	var $maxDepth = '';
	var $cateAry = array();

	public function __construct()
	{
		parent::__construct();
		$CI =& get_instance(); 
		$CI->load->model('sysSetModel');
		$this->maxDepth = $CI->sysSetModel->getSysSet('category_depth');
	}


	public function setCategoryAry($postTypeId){
		$this->cateAry = $this->getCategoryAry($postTypeId);
	}
	public function getCategoryAry($postTypeId,$parentId = NULL,$depth = 1){
		$this->db
		->select('*')
		->from('categorys')
		->where('del_flg','0');
		if(!is_null($parentId)){
			$this->db->where('parent_id',$parentId);
		}else{
			$this->db->where('parent_id IS NULL',NULL ,false);
		}
		$q = $this->db->get();
		$ret = $q->result_array();
		$ary = array();
		foreach($ret as $key => $row){
			if(intval($this->maxDepth) > $depth){
				$dep = $depth +1 ;
				$row['child'] = $this->getCategoryAry($postTypeId,$row['id'],$dep);
			}
			array_push($ary,$row);
		}
		return $ary;
	}

	public function getAdminCategoryTreeHtml(){
		return $this->getCategoryHtml($this->cateAry);
	}
	public function getCategoryHtml($ary){
		$html = '';
		if(!empty($ary)){
			$html .="<ul>";
			foreach($ary as $row){
				$html.="<li>";
				$html.="<label><input type='checkbox' name='category[{$row['id']}]''>{$row['category_show']}</label>";
				if(!empty($row['child'])){
					$html.=$this->getCategoryHtml($row['child']);
				}
				$html.="</li>";
			}
			$html .="</ul>";
		}
		return $html;
	}
}
