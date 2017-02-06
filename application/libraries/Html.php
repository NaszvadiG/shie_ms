<?php 

class Html{

	var $js = array();
	var $css = array();
	var $showType = '';
	var $Ci;

	public function __construct(){
		$this->Ci =& get_instance();
	}

	public function setShowType($showType){
		$this->showType = $showType;
	}

	public function setJs($ary,$showType=NULL){
		$showType = $this->_makeShowTypeAry('js',$showType);
		foreach($ary as $row){
			array_push($this->js[$showType],$row);
		}
	}

	public function setCss($ary,$showType=NULL){
		$showType = $this->_makeShowTypeAry('css',$showType);
		foreach($ary as $row){
			array_push($this->css[$showType],$row);
		}
	}

	public function js($showType=NULL){
		if(empty($showType)){
			$showType = $this->showType;
		}
		if(array_key_exists($showType,$this->js) === TRUE){
			foreach($this->js[$showType] as $js){
				print '<script type="text/javascript" src="'.$this->Ci->url->js_url($js).'"></script>'."\n";
			}
		}
	}

	public function css($showType=NULL){
		if(empty($showType)){
			$showType = $this->showType;
		}
		if(array_key_exists($showType,$this->css) === TRUE){
			foreach($this->css[$showType] as $css){
				print '<link type="text/css" rel="stylesheet" href="'.$this->Ci->url->css_url($css).'"/>'."\n";
			}
		}
	}




	/***********************************************************************************************/
	/**　　　　以下　プライベートメソッド　　　　**/
	/***********************************************************************************************/

	private function _makeShowTypeAry($seg,$showType){
		if(empty($showType)){
			$showType = $this->showType;
		}
		if(array_key_exists($showType,$this->$seg) === FALSE){
			$this->$seg =array_merge($this->$seg,array($showType=> array()));
		}
		return $showType;
	}
}

?>