<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		var_dump('Test');
		$this->load->view('welcome_message');
	}
}
