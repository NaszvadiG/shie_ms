<?php $this->html->css(); ?>
記事一覧画面
<div>
	<a href="<?php  print $this->url->controller_url('create'); ?>">新規作成</a>
	<a href="<?php  print $this->url->method_url('trash_list'); ?>">ゴミ箱の中身を見る</a>
	<a href="<?php  print $this->url->controller_url('delete_trash'); ?>">ゴミ箱の中身を削除</a>
</div>
<div>
	<table>
		<tr>
			<th class="check_td"></th>
			<th class="title_td">記事タイトル</th>
			<th class="cate_td">カテゴリ</th>
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
					<span class="post_edit_bt"><a href="<?php  print $this->url->controller_url('edit/'.$id); ?>">編集</a></span>
					<?php if(isset($this->data['condition']['state']) AND $this->data['condition']['state'] == 'trash'){ ?>
					<span class="post_edit_bt"><a href="<?php  print $this->url->controller_url('trash/'.$id); ?>">ゴミ箱に入れる</a></span>
					<?php }else{ ?>
					<span class="post_edit_bt"><a href="<?php  print $this->url->controller_url('delete/'.$id); ?>">削除</a></span>
					<?php } ?>
				</div>
			</td>
			<td class="cate_td">
				<?php foreach($row['category'] as $cate){ ?>
				<a href="<?php  print $this->url->method_url('category_id/'.$cate['id']); ?>"><?php print $cate['category_show']; ?></a><br>
				<?php } ?>
			</td>
			<td class="other_td">
				投稿者：<a href="<?php  print $this->url->method_url('create_id/'.$row['create_id']); ?>">あああ</a><br>
				投稿日時：<?php print $row['create_datetime'] ?><br>
				投稿状況：<a href="<?php  print $this->url->method_url('state/public'); ?>">公開</a>
			</td>
		</tr>
		<?php } ?>
	</table>
	<div class="pageing_block" targ="<?php  print $this->url->method_url('page/<num>');?>"></div>
</div>

<?php $this->html->js(); ?>
<script>
	$(function() {
		/**
		 * http://flaviusmatis.github.com/simplePagination.js/
		 */
		$('.pageing_block').pagination({
			items: <?php print $this->BlogModel->itemCount; ?>,
			itemsOnPage: <?php print $this->BlogModel->pageLimit; ?>,
			cssStyle: 'light-theme',
			currentPage :<?php print $this->BlogModel->nowPage; ?>,
			onPageClick:function(page,e){
				var targUrl = $('.pageing_block').attr('targ').replace('<num>',page);
				location.href = targUrl;
			}
		});
	});
</script>