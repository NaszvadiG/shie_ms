<?php 

class Url{

	var $showType = '';
	var $controller = '';
	var $method = '';

	public function __construct(){

	}

	/**
	 * サイトのURLを返す。
	 * サイトのトップページのURL【(ドメイン)/（システムインストールされたディレクトリ）/(引数の文字列)】
	 * 引数空白でトップページのURLを返す
	 * @param  [str] $url [サイト内部のURLを指定する。admin/blog/edit/1等]
	 * @return [str]      [(ドメイン)/（システムインストールされたディレクトリ）/(引数の文字列)を返す。]
	 */
	public function site_url($url=''){
		return site_url($url);
	}

	/**
	 * 現在表示中のメソッドのURLを返す。
	 *で表示中コントローラー/表示中メソッドまでを自動で設定し、メソッド以降の文字列のみを指定して
	 *URLを作成することができる。
	 * 
	 * 
	 * @param  [str] $url [現在表示中のメソッド以降の文字列を指定する。]
	 * @return [str]      [url文字列]
	 */
	public function method_url($url=''){
		return $this->site_url("{$this->showType}/{$this->controller}/{$this->method}/{$url}");
	}


	public function controller_url($url){
		return $this->site_url("{$this->showType}/{$this->controller}/{$url}");
	}


	public function setRouterVal($showType,$controller,$method){
		$this->showType = $showType;
		$this->controller = $controller;
		$this->method = $method;
	}
}

 ?>