

<?php print form_open(); ?>
<span class="glyphicon glyphicon-remove pull-right" aria-hidden="true"></span>
<h4>投稿設定</h4>
<div class="panel panel-default">
	<div class="panel-heading sCollapse sCollapseOp" data-target="#admin_edit_bt_select">
		<i></i>
		編集
	</div>
	<div id="admin_edit_bt_select" class="panel-body">
		<button id="editing_bt" class="btn">編集モードを表示</button>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading sCollapse " data-target="#admin_category_select">
		<i></i>
		カテゴリ
	</div>
	<div id="admin_category_select" class="panel-body">
		<?php print $categoryHtml; ?>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading sCollapse sCollapseCl" data-target="#admin_save">
		<i></i>
		保存
	</div>
	<div id="admin_save" class="panel-body">
		<button id="save_bt" class="btn">公開</button>
	</div>
</div>
<?php print form_close(); ?>