<?php 

class Feach{
	var $js = array();

	public function __construct(){
		$CI =& get_instance();
		$this->Ci = $CI->load->library('url');
	}


	public function setJs($ary){
		foreach($ary as $row){
			array_push($this->js,$row);
		}
	}

	public function js(){
		foreach($this->js as $js){
			print '<script type="text/javascript" src="'.$this->Ci->url->js_url($js.'.js').'"></script>';
		}
	}
}

?>