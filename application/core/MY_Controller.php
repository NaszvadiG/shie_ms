<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller {
	var $data = array();
	var $showType = 'front';	//views内のフォルダを指定する。
	var $js_ori =array('jquery');
	var $css_ori =array();
	/**
	 * viewsフォルダ内の
	 * 	$this->showType/$this->/_renderメソッド引数で指定する。
	 */
	var $name = '';

	function __construct()
	{
		parent::__construct();
		// something
		//Urlライブラリにshowタイプとコントローラーとメソッド情報を送る。
		$this->url->setRouterVal($this->showType,$this->router->fetch_class(),$this->router->fetch_method());
		//FeachライブラリにJSの情報を送る。
		$this->feach->setJs($this->js_ori);
		$showTypeJsHash = "js_{$this->showType}";
		$this->feach->setJs($this->$showTypeJsHash);
		if(isset($this->js)){
			$this->feach->setJs($this->js);
		}
		//FeachライブラリにCssの情報を送る。
		$this->feach->setCss($this->css_ori);
		$showTypeCssHash = "css_{$this->showType}";
		$this->feach->setCss($this->$showTypeCssHash);
		if(isset($this->css)){
			$this->feach->setCss($this->css);
		}
	}


	/**
	 * 画面を表示する。
	 * viewsフォルダ内の
	 * $this->showType/$this->name/_renderメソッド引数($view)で指定する。
	 * @param  [str]  $view       viewsフォルダ内のviewファイルを指定する。
	 * @return [type]              [description]
	 */
	public function _render($view)
	{
		$viewFile = $this->showType.'/'.$this->name.'/'.$view;
		$this->load->view($viewFile, $this->data);
	}

	// public function feachJs(){
	// 	foreach($this->js as $js){
	// 		print '<script type="text/javascript" src="'.$this->url->js_url($js).'"></script>';
	// 	}
	// 	$showTypeJsHash = "js_{$this->showType}";
	// 	foreach($this->$showTypeJsHash as $js){
	// 		print '<script type="text/javascript" src="'.$this->url->js_url($js).'"></script>';
	// 	}
	// 	foreach($this->$js as $js){
	// 		print '<script type="text/javascript" src="'.$this->url->js_url($js).'"></script>';
	// 	}
	// }
}
