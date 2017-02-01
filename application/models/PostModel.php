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

	public function __construct()
	{
		parent::__construct();

		//検索条件初期条件を指定
		$this->condition_ori = array(
			'id' => '',
			'post_type_id' => '',
			'title' => '',
			'content' => '',
			'state' => 'public',
			'update_id' =>'',
			'create_id' =>'',
			'create_datetime' =>'',
			'del_flg' =>'0',
			'category_id' =>'',
			'category_del_flg' =>'0',
			);
	}

	public function setCondition($condition){
		//検索条件にページ指定が有ったら、表示ページに入れて、
		//検索条件から削除
		if(isset($condition['page'])){
			$this->nowPage = $condition['page'];
			unset($condition['page']);
		}
		//引数の検索条件を$this->condition_oriと$this->conditionにマージする。
		$this->condition = array_merge($this->condition_ori,$this->condition,$condition);
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
	public function setItemCount(){
		$this->db
		->select('COUNT(*)',FALSE)
		->group_by('posts.id');
		$query = $this->_doPostGetSqlQuery();
		$this->itemCount = $query->num_rows();
	}

	public function search($condition = NULL){
		if(!is_null($condition)){
		//検索条件設定
			$this->setCondition($condition);
		}
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
			'categorys.del_flg AS category_del_flg',
			);
		$this->db
		->select($select)
		->limit($this->pageLimit,$this->offset);
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
		}
	}

	/***********************************************************************************************/
	/**　　　　以下　プライベートメソッド　　　　**/
	/***********************************************************************************************/
	private function _doPostGetSqlQuery(){
		$query = $this->db
		->from('posts')
		->join('post_categorys','posts.id = post_categorys.post_id','left')
		->join('categorys','post_categorys.category_id = categorys.id','left')
		->get();
		return $query;
	}
	private function _setSearchSqlWhere($key,$val){
		switch($key){
			case 'id':
			case 'post_type_id':
			case 'state':
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
