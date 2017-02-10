<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller {
	var $data = array();
	var $showType = 'front';	//views内のフォルダを指定する。
	var $js_ori =array();
	var $css_ori =array();
	var $title ='';
	var $user = array();

	/**
	 * viewsフォルダ内の
	 * 	$this->showType/$this->/_renderメソッド引数で指定する。
	 */
	var $name = '';

	function __construct()
	{
		parent::__construct();
		//ユーザー情報を取得
		$this->user = $this->ion_auth->user()->row();
		// something
		//Urlライブラリにshowタイプとコントローラーとメソッド情報を送る。
		$this->url->setRouterVal($this->showType,$this->router->fetch_class(),$this->router->fetch_method());
		//htmlライブラリに情報を送る
		$this->_setHtmlLibrary();
		$this->elementPath = "{$this->showType}/element/";
	}


	/**
	 * 画面を表示する。
	 * viewsフォルダ内の
	 * $this->showType/$this->name/_renderメソッド引数($view)で指定する。
	 * @param  [str]  $view       viewsフォルダ内のviewファイルを指定する。
	 * @param  [str]  $layoutBool = TRUE       レイアウトファイルに表示するかどうかの真偽値
	 * @param  [str]  $layoutFile = NULL       レイアウトファイルの名を指定する場合は使用する。
	 * @return [type]              [description]
	 */
	public function _render($view,$layoutBool = TRUE,$layoutFile=NULL)
	{
		$viewFile = $this->showType.'/'.$this->name.'/'.$view;
		$this->data['content'] = $this->load->view($viewFile, $this->data,TRUE);
		if($layoutBool === FALSE){
			print $this->data['content'];
		}else{
			if(is_null($layoutFile)){
				$layoutFile = "layout";
			}
			$this->load->view($this->showType."/element/".$layoutFile, $this->data);
		}

	}

	/**
	 * htmlライブラリに対してコンストラクタで行うメソッドをまとめる。
	 */
	private function _setHtmlLibrary(){
		//htmlライブラリに表示セグメントを送る。
		$this->html->setShowType($this->showType);

		//FeachライブラリにJSの情報を送る。
		$this->html->setJs($this->js_ori);
		$showTypeJsHash = "js_{$this->showType}";
		if(isset($this->$showTypeJsHash)){
			$this->html->setJs($this->$showTypeJsHash);
		}
		if(isset($this->js)){
			$this->html->setJs($this->js);
		}
		
		//FeachライブラリにCssの情報を送る。
		$this->html->setCss($this->css_ori);
		$showTypeCssHash = "css_{$this->showType}";
		if(isset($this->$showTypeCssHash)){
			$this->html->setCss($this->$showTypeCssHash);
		}
		if(isset($this->css)){
			$this->html->setCss($this->css);
		}
	}

	public function _getElement($filePath){

		// eval(VIEWPATH."{$this->showType}/element/{$filePath}.php");
	}
}
