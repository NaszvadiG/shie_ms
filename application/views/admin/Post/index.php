<?php ob_start(); ?>
<div>
	<a href="<?php  print $this->url->controller_url('create/'.$this->postType); ?>">新規作成</a>
	<?php if($trashFlg === TRUE){ ?>
	<a href="<?php  print $this->url->controller_url('delete_trash/'.$this->postType); ?>">ゴミ箱の中身を削除</a>
	<?php }else{ ?>
	<a href="<?php  print $this->url->method_url($this->postType.'/state/trash'); ?>">ゴミ箱の中身を見る</a>
	<?php } ?>
	<?php if($allShowFlg === TRUE){ ?>
	<a href="<?php  print $this->url->method_url($this->postType); ?>">全て表示</a>
	<?php } ?>
</div>
<?php 
$naviHtml = ob_get_contents();
ob_end_clean();
?>
<?php print $naviHtml; ?>
<div class="col-xs-12">
	<table id="post_list_table" class="table table-striped">
		<tr>
			<th class="check_td"></th>
			<th class="title_td">記事タイトル</th>
			<th class="cate_td">カテゴリ</th>
			<th class="create_td">作成者</th>
			<th class="other_td">情報</th>
		</tr>
		<?php //var_dump($this->PostModel->post); ?>
		<?php foreach($this->PostModel->post as $row){ ?>
		<?php $id = $row['id'] ?>
		<tr>
			<td class="check_td"><input type="checkbox"></td>
			<td class="title_td">
				<p class="title_str">
					<?php if($trashFlg === TRUE){ ?>
					ゴミ箱　:<?php print $row['title']; ?>
					<?php }else{ ?>
					<a href="<?php  print $this->url->controller_url('edit/'.$this->postType.'/'.$id); ?>"><?php print $row['title']; ?></a>
					<?php } ?>
				</p>
				<div class="post_edit_bt_bloc">
					<?php if($trashFlg === TRUE){ ?>
					<a href="<?php  print $this->url->controller_url('draft/'.$this->postType.'/'.$id); ?>">ゴミ箱から出す</a>
					<a class="text-danger" href="<?php  print $this->url->controller_url('delete/'.$this->postType.'/'.$id); ?>">削除</a>
					<?php }else{ ?>
					<a href="<?php  print $this->url->controller_url('edit/'.$this->postType.'/'.$id); ?>">編集</a>
					<a class="text-danger" href="<?php  print $this->url->controller_url('trash/'.$this->postType.'/'.$id); ?>">ゴミ箱に入れる</a>
					<?php } ?>
				</div>
			</td>
			<td class="cate_td">
				<?php foreach($row['category'] as $cate){ ?>
				<a href="<?php  print $this->url->method_url($this->postType.'/category_id/'.$cate['id']); ?>"><?php print $cate['show']; ?></a><br>
				<?php } ?>
			</td>
			<td class="create_td">
				投稿者：<a href="<?php  print $this->url->method_url($this->postType.'/create_id/'.$row['create_id']); ?>"><?php print $row['user']; ?></a><br>
			</td>
			<td class="other_td">
				投稿日時：<?php print $row['create_datetime'] ?><br>
				投稿状況：
				<a href="<?php  print $this->url->method_url($this->postType.'/state/'.$row['state']); ?>">
					<?php print $this->PostModel->getPostStateJpName($row['state']); ?>
				</a>
			</td>
		</tr>
		<?php } ?>
	</table>
	<div class="pageing_block" targ="<?php  print $this->url->method_url($this->postType.$searchStr.'/page/<num>');?>"></div>
</div>
<?php print $naviHtml; ?>
<script>
	itemCount = <?php print $this->PostModel->itemCount; ?>;
	pageLimit = <?php print $this->PostModel->pageLimit; ?>;
	nowPage = <?php print $this->PostModel->nowPage; ?>;
</script>