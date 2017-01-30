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
	function __construct()
	{
		parent::__construct();
		// something
		//ログインしてなければ、ログイン画面に遷移
		if (!$this->ion_auth->logged_in()){
			redirect('admin/auth/login', 'refresh');
		}

	}
}
