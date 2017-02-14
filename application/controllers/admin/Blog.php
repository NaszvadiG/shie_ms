<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends AdminController {
	var $name = 'Blog';
	var $post_type='blog';
	var $title = '記事一覧画面';
	var $js = array('plugin/jquery.simplePagination','blog/index');
	var $css = array('plugin/simplePagination');

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
		$this->data['condition'] = $condition;
		//検索実行
		$this->BlogModel->setCondition($condition);
		$this->BlogModel->setItemCount();
		$this->BlogModel->search();

		//検索条件を整理
		
		$this->_render('index');

	}

	/**
	 * 記事詳細
	 * @param  [int] $postId [記事ID]
	 */
	function edit($postId){


		//コンテンツ情報の取得
		$condition = array(
			'id'=>$postId,
			'state' => '*'
		);
		$this->BlogModel->search($condition);
		$this->data['post'] = array_shift($this->BlogModel->post);

		//保存ブロックを作成する。
		$this->data['adminBlock'] = $this->load->view("admin/{$this->name}/contentAdminBlock", $this->data,true);

		//htmlライブラリに表示セグメントを送る。
		$this->html->setShowType('front');
		//HTMLライブラリにJSの情報を送る。
		$this->html->setJs(array('plugin/jquery.cookie','plugin/sCollapse','blog/content'),'front');
		$this->html->setCss(array('style'),'front');

		//公開側の詳細ページを表示する。
		$this->load->view("front/{$this->name}/content", $this->data);
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
