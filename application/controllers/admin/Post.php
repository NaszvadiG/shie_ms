<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends AdminController {
	var $name = 'Post';
	var $postType='';
	var $postTypeId = '';
	var $postTypeModelName = 'PostModel';
	var $title = '記事一覧画面';
	var $js = array('plugin/jquery.simplePagination','post/index');
	var $css = array('plugin/simplePagination');

	function __construct(){
		parent::__construct();
		$this->load->model(array('PostModel','postTypeModel','categoryModel'));
		$this->load->helper('form');


	}

	/**
	 * 記事一覧
	 */
	function index($type = '', $sKey = NULL,$sVal =NULL,$sKey2=NULL,$sval2=NULL){
		$this->_setPostType($type);
		$modl = $this->postTypeModelName;

		//検索条件の整理
		$condition = array();
		$this->data['searchStr']  = '';
		if(!is_null($sKey)){
			$condition[$sKey] = $sVal;
			//ページングボタン用に文字列を作製
			$this->data['searchStr'] = "/{$sKey}/{$sVal}";
		}

		if(!is_null($sKey2)){
			$condition[$sKey2] = $sVal2;
		}
		$this->data['condition'] = $condition;

		//検索条件によって、画面のふるまいを変えるためのフラグを立てる
		//ゴミ箱かどうかのフラグ　TRUE=> ゴミ箱
		$this->data['trashFlg'] = FALSE;
		if(array_key_exists('state',$condition) && $condition['state'] == 'trash'){
			$this->data['trashFlg'] = TRUE;
		}
		//全て表示を表示するかどうか　TRUE->全て表示ボタンを表示する
		$this->data['allShowFlg'] =FALSE;
		if(!is_null($sKey) || !is_null($sKey2)){
			$this->data['allShowFlg'] =TRUE;
		}


		
		//検索実行
		$this->$modl->setItemCount($condition,$this->postTypeId);
		$this->$modl->search($condition,$this->postTypeId);

		//画面の表示
		$this->_render('index');

	}

	/**
	 * 記事詳細
	 * @param  [str] $type 記事タイプ名
	 * @param  [int] $postId [記事ID]
	 */
	function edit($type,$postId){
		$this->_setPostType($type);
		$modl = $this->postTypeModelName;

		//コンテンツ情報の取得
		$condition = array(
			'id'=>$postId,
			'state' => '*'
			);
		$this->$modl->search($condition,$this->postTypeId);
		$this->data['post'] = array_shift($this->$modl->post);

		//全カテゴリ情報をセット
		$this->categoryModel->setCategoryAry($this->postTypeId);
		$this->data['category'] = $this->categoryModel->cateAry;
		//カテゴリ選択部分のHTMLをセット
		$this->data['categoryHtml'] = $this->categoryModel->getAdminCategoryTreeHtml();

		//保存ブロックを作成する。
		$this->data['adminBlock'] = $this->load->view("admin/{$this->name}/contentAdminBlock", $this->data,true);

		//htmlライブラリに表示セグメントを送る。
		$this->html->setShowType('front');
		//HTMLライブラリにJSの情報を送る。
		$this->html->setJs(array('plugin/jquery.cookie','plugin/sCollapse','blog/content'),'front');
		$this->html->setCss(array('style'),'front');

		//公開側の詳細ページを表示する。
		$this->load->view("front/{$this->postType}/content", $this->data);
	}

	function create(){

	}
	function trash($postId){

	}
	function delete($postId){
		
	}
	function delete_trash(){

	}


	/**
	 * 引数のポストタイプをプロパティーに設定する関数
	 * @param [str] $type ポストタイプの名前
	 */
	private function _setPostType($type){
		$this->postType = $type;
		$this->postTypeId = $this->postTypeModel->getPostTypeNameToId($this->postType);
	}
}
