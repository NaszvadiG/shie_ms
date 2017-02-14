<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 記事情報取得のスーパークラス
 * 記事タイプ毎にクラスを作成してこのクラスを継承する事で
 * 各記事タイプクラスから使用可能な物を作成する。
 */
class PostModel extends CI_Model
{
	var $post = array();
	var $condition_ori = array();
	var $condition = array();
	var $nowPage = 1;
	var $pageLimit ='20';
	var $itemCount = 0;
	var $postTypeId = 0;

	public function __construct()
	{
		parent::__construct();
		$this->user = $this->ion_auth->user()->row();
		//検索条件初期条件を指定
		$this->condition_ori = array(
			'id' => '',
			'post_type_id' => '',
			'title' => '',
			'content' => '',
			'state' => '',
			'update_id' =>'',
			'create_id' =>'',
			'create_datetime' =>'',
			'del_flg' =>'0',
			'category_id' =>'',
			'category_del_flg' =>'0',
			);

		//$this->postの初期化
		// $this->post[0] = array(
		// 	'id' => '',
		// 	'post_type_id' => $this->postTypeId,
		// 	'title' => '',
		// 	'content' => '',
		// 	'state' => 'draft',
		// 	'update_id' =>'',
		// 	'create_id' =>$this->user->id,
		// 	'create_datetime' =>'',
		// 	'del_flg' =>0,
		// 	'category' =>array(),
		// 	);
	}

	/**
	 * 検索条件を設定する。
	 * pageの場合はLimit句に入れないといけないので、Limit句を作成後検索条件から削除する。
	 * それ以外の条件は$this->condition_ori(検索初期値)と引数の検索値をマージしてWHERE句を作成する。
	 * @param [type] $condition [description]
	 */
	public function setCondition($condition){
		//検索条件にページ指定が有ったら、表示ページに入れて、
		//検索条件から削除
		if(isset($condition['page'])){
			$this->nowPage = $condition['page'];
			unset($condition['page']);
		}
		//引数の検索条件を$this->condition_oriと$this->conditionにマージする。
		if(is_null($condition) ){
			$condition = array();
		}
		$this->condition = array_merge($this->condition_ori,$this->condition,$condition);
		
		// public=>公開　draft=>下書き　private =>非公開　trash=>ゴミ箱
		//公開ステータスだけ別で検索条件作成
		if($this->condition['state'] !== '*' && mb_strlen($this->condition['state']) == 0){
			$this->db->where('posts.state != ','trash');
		}elseif($this->condition['state'] !== '*' && mb_strlen($this->condition['state']) > 0){
			$this->db->where('posts.state',$this->condition['state']);
		}
		unset($condition['state']);


		//検索条件設定
		foreach($this->condition as $key => $val){
			if($val !== ''){
				$this->_setSearchSqlWhere($key,$val);
			}
		}
		//表示ページからLimit句を作成
		$this->offset = 0;
		if($this->nowPage > 1){
			$this->offset = ($this->pageLimit * ($this->nowPage-1))-1;
		}
	}

	/**
	 * 検索結果の結果数を$this->itemCountに代入する
	 */
	public function setItemCount(){
		$this->db
		->select('COUNT(*)',FALSE)
		->group_by('posts.id');
		//SELECTとLIMIT以外のFROMとJOINは共通関数で作成して、結果を返す。
		$query = $this->_doPostGetSqlQuery();
		//件数を代入
		$this->itemCount = $query->num_rows();
	}

	/**
	 * 検索結果を$this->postに代入する。
	 * @param  [ary] $condition [array('検索カラム名：物理'=>'検索値')]
	 */
	public function search($condition = NULL){
		//検索条件設定
		$this->setCondition($condition);
		//SQL作成とSELECT文の実行
		$select = array(
			'posts.id',
			'posts.post_type_id',
			'posts.title',
			'posts.content',
			'posts.state',
			'posts.update_id',
			'posts.create_id',
			'posts.create_datetime',
			'posts.del_flg',
			'categorys.id AS category_id',
			'categorys.category_slug',
			'categorys.category_show',
			'categorys.parent_id',
			'categorys.del_flg AS category_del_flg,',
			'users.first_name'
			);
		//SELECTとLIMIT句だけ先に作る。
		$this->db
		->select($select)
		->limit($this->pageLimit,$this->offset);

		//SELECTとLIMIT以外のFROMとJOINは共通関数で作成して、結果を返す。
		$postQuery =  $this->_doPostGetSqlQuery();
		//取得したデータの整理
		foreach($postQuery->result_array() as $row){
			//記事情報の取得と整理
			if(!isset($this->post[$row['id']])){
				$this->post[$row['id']] = array(
					'id' => $row['id'],
					'post_type_id' => $row['post_type_id'],
					'title' => $row['title'],
					'content' => $row['content'],
					'state' => $row['state'],
					'update_id' =>$row['update_id'],
					'create_id' =>$row['create_id'],
					'create_datetime' =>$row['create_datetime'],
					'del_flg' =>$row['del_flg'],
					'user' =>$row['first_name'],
					'category' =>array(),
					);

			}
			//カテゴリ情報の整理
			if(!is_null($row['category_id'])){
				$this->post[$row['id']]['category'][$row['category_id']] =array(
					'id' => $row['category_id'],
					'slug'  => $row['category_slug'],
					'show' => $row['category_show'],
					'parent_id' => $row['parent_id'],
					'del_flg' => $row['category_del_flg'],
					);
			}
			//END　if
		}
		//　END foreach
	}
	//END function


	// public=>公開　draft=>下書き　private =>非公開　trash=>ゴミ箱
	function getPostStateJpName($state){
		if($state == 'public'){
			return '公開';
		}elseif($state == 'draft'){
			return '下書き';
		}elseif($state == 'private'){
			return '非公開';
		}elseif($state == 'trash'){
			return 'ゴミ箱';
		}
	}

	/***********************************************************************************************/
	/**　　　　以下　プライベートメソッド　　　　**/
	/***********************************************************************************************/
	/**
	 * 共通のFROM・JOIN句を作成して結果を返す
	 */
	private function _doPostGetSqlQuery(){
		$sql = $this->db
		->from('posts')
		->join('post_categorys','posts.id = post_categorys.post_id','left')
		->join('categorys','post_categorys.category_id = categorys.id','left')
		->join('users','posts.create_id = users.id','left')
		->get_compiled_select();
		$query = $this->db->query($sql);
		return $query;
	}

	/**
	 * 検索配列のkeyによってWHERE句の作り方を変得ながらWHERE句を作成する。
	 * @param [str] $key [検索対象カラム名：物理名]
	 * @param [str] $val [検索条件]
	 */
	private function _setSearchSqlWhere($key,$val){
		switch($key){
			case 'id':
			case 'post_type_id':
			case 'update_id':
			case 'create_id':
			case 'del_flg':
			$this->db->where("posts.{$key}", $val);
			break;
			case 'title':
			case 'content':
			$this->db->like("posts.{$key}", $val);
			break;
			case 'category_id':
			$this->db->where("categorys.id", $val);
			case 'category_del_flg':
			$this->db
			->group_start()
			->where("categorys.del_flg", $val)
			->or_where("categorys.del_flg IS NULL")
			->group_end();
			break;
		}

	}
}
