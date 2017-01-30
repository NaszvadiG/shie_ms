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
		<tr>
			<td class="check_td"><input type="checkbox"></td>
			<td class="title_td">
				<p class="title_str">
					ゴミ箱　:　記事タイトル
					<a href="<?php  print $this->url->controller_url('edit/1'); ?>">記事タイトル</a>
				</p>
				<div class="post_edit_bt_bloc">
					<span class="post_edit_bt"><a href="<?php  print $this->url->controller_url('edit/1'); ?>">編集</a></span>
					<span class="post_edit_bt"><a href="<?php  print $this->url->controller_url('trash/1'); ?>">ゴミ箱に入れる</a></span>
					<span class="post_edit_bt"><a href="<?php  print $this->url->controller_url('delete/2'); ?>">削除</a></span>
				</div>
			</td>
			<td class="cate_td">
				<a href="<?php  print $this->url->method_url('category/1'); ?>">カテゴリ</a><br>
				<a href="">カテゴリ2</a><br>
				<a href="">カテゴリ3</a>
			</td>
			<td class="other_td">
				投稿者：<a href="<?php  print $this->url->method_url('creator/1'); ?>">あああ</a><br>
				投稿日時：2016-01-11　11：33<br>
				投稿状況：<a href="<?php  print $this->url->method_url('state/public'); ?>"></a>公開
			</td>
		</tr>
	</table>
	<div class="pagint_bt">
		最初<<a href="<a href="<?php  print $this->url->method_url('page/1'); ?>">1</a>2345>最後
	</div>
</div>