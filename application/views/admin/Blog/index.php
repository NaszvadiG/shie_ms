<div>
	<a href="<?php  print $this->url->controller_url('create'); ?>">新規作成</a>
	<?php if(isset($this->data['condition']['state']) AND $this->data['condition']['state'] == 'trash'){ ?>
	<a href="<?php  print $this->url->controller_url('delete_trash'); ?>">ゴミ箱の中身を削除</a>
	<?php }else{ ?>
	<a href="<?php  print $this->url->method_url('trash_list'); ?>">ゴミ箱の中身を見る</a>
	<?php } ?>
</div>
<div class="col-xs-12">
	<table id="post_list_table" class="table table-striped">
		<tr>
			<th class="check_td"></th>
			<th class="title_td">記事タイトル</th>
			<th class="cate_td">カテゴリ</th>
			<th class="create_td">作成者</th>
			<th class="other_td">情報</th>
		</tr>
		<?php //var_dump($this->BlogModel->post); ?>
		<?php foreach($this->BlogModel->post as $row){ ?>
		<?php $id = $row['id'] ?>
		<tr>
			<td class="check_td"><input type="checkbox"></td>
			<td class="title_td">
				<p class="title_str">
					<?php if(isset($this->data['condition']['state']) AND $this->data['condition']['state'] == 'trash'){ ?>
					ゴミ箱　:　記事タイトル
					<?php }else{ ?>
					<a href="<?php  print $this->url->controller_url('edit/'.$id); ?>"><?php print $row['title']; ?></a>
					<?php } ?>
				</p>
				<div class="post_edit_bt_bloc">
					<a href="<?php  print $this->url->controller_url('edit/'.$id); ?>">編集</a>
					<?php if(isset($this->data['condition']['state']) AND $this->data['condition']['state'] == 'trash'){ ?>
					<a class="text-danger" href="<?php  print $this->url->controller_url('delete/'.$id); ?>">削除</a>
					<?php }else{ ?>
					<a class="text-danger" href="<?php  print $this->url->controller_url('trash/'.$id); ?>">ゴミ箱に入れる</a>
					<?php } ?>
				</div>
			</td>
			<td class="cate_td">
				<?php foreach($row['category'] as $cate){ ?>
				<a href="<?php  print $this->url->method_url('category_id/'.$cate['id']); ?>"><?php print $cate['category_show']; ?></a><br>
				<?php } ?>
			</td>
			<td class="create_td">
				投稿者：<a href="<?php  print $this->url->method_url('create_id/'.$row['create_id']); ?>">あああ</a><br>
			</td>
			<td class="other_td">
				投稿日時：<?php print $row['create_datetime'] ?><br>
				投稿状況：<a href="<?php  print $this->url->method_url('state/public'); ?>">公開</a>
			</td>
		</tr>
		<?php } ?>
	</table>
	<div class="pageing_block" targ="<?php  print $this->url->method_url('page/<num>');?>"></div>
</div>

<script>
	itemCount = <?php print $this->BlogModel->itemCount; ?>;
	pageLimit = <?php print $this->BlogModel->pageLimit; ?>;
	nowPage = <?php print $this->BlogModel->nowPage; ?>;
</script>