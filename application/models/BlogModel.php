<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class BlogModel extends PostModel
{

	var $condition = array();
	var $pageLimit ='20';
	var $postTypeId = 1;

	public function __construct()
	{
		parent::__construct();
		$this->condition =array(
			'post_type_id' => $this->postTypeId,
			);
	}
}
