<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashbord extends AdminController {
	var $name = 'Dashbord';

	function __construct(){
		parent::__construct();
	}

	/**
	 * ダッシュボードの表示
	 */
	function index(){
		$this->_render('index');
	}
}
