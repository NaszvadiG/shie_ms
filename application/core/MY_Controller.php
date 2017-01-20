<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller {
	var $data = array();
	var $showType = 'front';	//views内のフォルダを指定する。
	/**
	 * viewsフォルダ内の
	 * 	$this->showType/$this->/_renderメソッド引数で指定する。
	 */
	var $name = '';

	function __construct()
	{
		parent::__construct();
		// something
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
}
