<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends AdminController {
	var $name = 'Blog';
	var $post_type='blog';

	function __construct(){
		parent::__construct();
	}

	/**
	 * 記事一覧
	 */
	function index($searchKey = NULL,$searchVal =NULL){
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
