<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 管理画面の継承元クラス
 *
 * -----------------------------------------------------------------------------------
 * 2017-1-20　add shie
 * 
 */
class AdminController extends MY_Controller {
	var $showType = 'admin';	//views内のフォルダを指定する。
	var $name = '';
	var $js_admin = array('plugin/jquery.min','plugin/metisMenu.min','plugin/bootstrap','plugin/jquery.cookie','plugin/select2','plugin/sb-admin-2','plugin/sCollapse');
	var $css_admin = array('plugin/bootstrap','plugin/sb-admin-2','plugin/font-awesome.min','plugin/metisMenu.min','style');


	function __construct()
	{
		parent::__construct();
		// something
		//ログインしてなければ、ログイン画面に遷移
		if (!$this->ion_auth->logged_in()){
			redirect('admin/auth/login', 'refresh');
		}
		$this->user = $this->ion_auth->user()->row();
	}
}
