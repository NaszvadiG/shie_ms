<?php 

/**
 *　コンロ―ローラーとビューで使用するURL情報を取得するためのライブラリクラス。
 *　
 */
class Url{

	//setRouterValで設定した表示セグメント
	var $showType = '';
	//setRouterValで設定した実行中のコントローラー名
	var $controller = '';
	//setRouterValで設定した実行中のアクションメソッド名
	var $method = '';
	//ドキュメントルートから、システムルールのURL　/shie_ms/
	var $rootUrl = '';
	//httpから始まる絶対URL　http://localhost/shie_ms/
	var $fullUrl = '';

	public function __construct(){
		//ドキュメントルート(/)からシステムルートまでのパスを設定
		$this->rootUrl = str_replace('index.php','',$_SERVER['SCRIPT_NAME']);
		//httpから始まる絶対URL　http://localhost/shie_ms/
		if(array_key_exists('REQUEST_SCHEME',$_SERVER)){
			$mes = $_SERVER['REQUEST_SCHEME'];
		}else{
			$mes = 'http';
		}
		$this->fullUrl = $mes.'://'.$_SERVER['SERVER_NAME'].$this->rootUrl;
	}

	/**
	 * 現在表示中の表示セグメントとコントローラー・アクションメソッドを受領する関数
	 * MY_Contollerの__constructで実行されている。
	 * @param [str] $showType   [表示セグメントを指定　admin or front]
	 * @param [type] $controller [実行中のコントローラー名を指定する。]
	 * @param [type] $method     [実行中のアクションメソッドを指定する。]
	 */
	public function setRouterVal($showType,$controller,$method){
		$this->showType = $showType;
		$this->controller = $controller;
		$this->method = $method;
	}

	/**
	 * サイトのURLを返す。
	 * サイトのトップページのURL【(ドメイン)/（システムインストールされたディレクトリ）/(引数の文字列)】
	 * 引数空白でトップページのURLを返す
	 * @param  [str] $url [サイト内部のURLを指定する。admin/blog/edit/1等]
	 * @return [str]      [(ドメイン)/（システムインストールされたディレクトリ）/(引数の文字列)を返す。]
	 */
	public function site_url($url=''){
		return $this->rootUrl .$url;
	}

	/**
	 * 現在表示中のメソッドのURLを返す。
	 *で表示中コントローラー/表示中メソッドまでを自動で設定し、メソッド以降の文字列のみを指定して
	 *URLを作成することができる。
	 * @param  [str] $url [現在表示中のメソッド以降の文字列を指定する。]
	 * @return [str]      [url文字列]
	 */
	public function method_url($url=''){
		return $this->site_url("{$this->showType}/{$this->controller}/{$this->method}/{$url}");
	}

	/**
	 * 現在表示中のコントローラーのURLを返す。
	 * 引数でコントローラー以降のURLを指定する事で簡単に同じ表示コントローラーの違うアクションメソッドのURLを作成する事ができる。
	 * @param  [str] $url [現在表示中のコントローラー以降のURL文字列を指定する]
	 * @return [str]      [相対URL]
	 */
	public function controller_url($url){
		return $this->site_url("{$this->showType}/{$this->controller}/{$url}");
	}



	/**
	 * システムルートのWEBフォルダのURLを返す。
	 * @param  [str] $url [web以下のURLを指定する]
	 * @return [str]      [相対URL]
	 */
	public function view_url($url){
		return $this->site_url("web/{$url}");
	}

	/**
	 * webフォルダの表示セグメントDir配下のjsフォルダ内のファイルのURLを返す
	 * 第二引数を指定しないと、あらかじめMy_Controllerで設定した表示セグメントを使用するが
	 * 指定する事でwebフォルダは以下の表示セグメントdirを指定する事ができる。
	 * @param  [str] $url  [jsフォルダ以下のURLを指定]
	 * @param  [str] $type [指定しなくてもOK、指定した場合はWEBフォルダ直下のフォルダを変更できる。]
	 * @return [str]       [指定したJSファイルへの相対パス]
	 */
	public function js_url($url,$type=NULL){
		if(empty($type)){
			$type = $this->showType;
		}
		return $this->view_url("{$type}/js/{$url}.js");
	}

	/**
	 * webフォルダの表示セグメントDir配下のcssフォルダ内のファイルのURLを返す
	 * 第二引数を指定しないと、あらかじめMy_Controllerで設定した表示セグメントを使用するが
	 * 指定する事でwebフォルダは以下の表示セグメントdirを指定する事ができる。
	 * @param  [str] $url  [cssフォルダ以下のURLを指定]
	 * @param  [str] $type [指定しなくてもOK、指定した場合はWEBフォルダ直下のフォルダを変更できる。]
	 * @return [str]       [指定したCSS]ファイルへの相対パス]
	 */
	public function css_url($url,$type = NULL){
		if(empty($type)){
			$type = $this->showType;
		}
		return $this->view_url("{$type}/css/{$url}.css");
	}
}

?>