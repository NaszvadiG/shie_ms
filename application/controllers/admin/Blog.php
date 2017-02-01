<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends AdminController {
	var $name = 'Blog';
	var $post_type='blog';
	var $js = array('jquery.simplePagination');
	var $css = array('simplePagination');

	function __construct(){
		parent::__construct();
		$this->load->model(array('PostModel','BlogModel'));
		// $this->load->model('BlogModel');
	}

	/**
	 * 記事一覧
	 */
	function index($sKey = NULL,$sVal =NULL,$sKey2=NULL,$sval2=NULL){
		$condition = array();
		if(!is_null($sKey)){
			$condition[$sKey] = $sVal;
		}
		if(!is_null($sKey2)){
			$condition[$sKey2] = $sVal2;
		}
		//検索実行
		$this->BlogModel->setCondition($condition);
		$this->BlogModel->setItemCount();
		$this->BlogModel->search();

		//検索条件を整理
		$this->_render('index');

	}

	function edit($postId){

	}
	function create(){

	}
	function trash($postId){

	}
	function delete($postId){
		
	}
	function delete_trash(){

	}
}
