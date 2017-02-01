<?php 

class Feach{
	var $js = array();
	var $css = array();
	var $Ci;
	public function __construct(){
		$this->Ci =& get_instance();
		// $this->Ci = $CI->load->library('url');
	}


	public function setJs($ary){
		foreach($ary as $row){
			array_push($this->js,$row);
		}
	}
	public function setCss($ary){
		foreach($ary as $row){
			array_push($this->css,$row);
		}
	}

	public function js(){
		foreach($this->js as $js){
			print '<script type="text/javascript" src="'.$this->Ci->url->js_url($js.'.js').'"></script>';
		}
	}

	public function css(){
		foreach($this->css as $css){
			print '<link type="text/css" rel="stylesheet" href="'.$this->Ci->url->css_url($css.'.css').'"/>';
		}
	}
}

?>