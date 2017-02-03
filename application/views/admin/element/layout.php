<!DOCTYPE html>
<html lang="jp">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?php print $this->title; ?>|　AlloraWiki 管理画面</title>
	<?php $this->html->css(); ?>
</head>

<body>
	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php print $this->url->site_url('admin/dashbord'); ?>">AlloraWiki 管理画面</a>
			</div>
			<!-- /.navbar-header -->

			<ul class="nav navbar-top-links navbar-right">
				<li class="">
					<a class=""  href="<?php print $this->url->site_url(); ?>" target="_brank">サイトを表示</a>
					<!-- /.dropdown-user -->
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="<?php print $this->url->site_url('admin/auth/edit_user/'.$this->user->id); ?>"><i class="fa fa-user fa-fw"></i> プロフィール</a></li>
						<li><a href="<?php print $this->url->site_url('admin/auth'); ?>"><i class="fa fa-gear fa-fw"></i> ユーザー一覧</a></li>
						<li class="divider"></li>
						<li><a href="<?php print $this->url->site_url('admin/auth/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> ログアウト</a>
						</li>
					</ul>
					<!-- /.dropdown-user -->
				</li>
				<!-- /.dropdown -->
			</ul>
			<!-- /.navbar-top-links -->

			<div class="navbar-default sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse collapse"">
					<ul class="nav" id="side-menu">
						<li>
							<a href="<?php print $this->url->site_url('admin/dashbord'); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
						</li>
						<li>
							<a href="#"><i class="fa  fa-list-alt fa-fw"></i>ブログ<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="<?php print $this->url->site_url('admin/blog'); ?>">一覧</a>
								</li>
								<li>
									<a href="<?php print $this->url->site_url('admin/blog/create'); ?>">新規作成</a>
								</li>
								<li>
									<a href="<?php print $this->url->site_url('admin/category/index/blog'); ?>">ブログ-カテゴリ</a>
								</li>
							</ul>
							<!-- /.nav-second-level -->
						</li>
						<li>
							<a href="#"><i class="glyphicon glyphicon-user fa-fw"></i> ユーザー管理<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="<?php print $this->url->site_url('admin/auth'); ?>">ユーザー一覧</a>
								</li>
								<li>
									<a href="<?php print $this->url->site_url('admin/auth/edit_user/'.$this->user->id); ?>">プロフィール</a>
								</li>
							</ul>
							<!-- /.nav-second-level -->
						</li>
						<li>
							<a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="#">Second Level Item</a>
								</li>
								<li>
									<a href="#">Second Level Item</a>
								</li>
								<li>
									<a href="#">Third Level <span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
										<li>
											<a href="#">Third Level Item</a>
										</li>
										<li>
											<a href="#">Third Level Item</a>
										</li>
										<li>
											<a href="#">Third Level Item</a>
										</li>
										<li>
											<a href="#">Third Level Item</a>
										</li>
									</ul>
									<!-- /.nav-third-level -->
								</li>
							</ul>
							<!-- /.nav-second-level -->
						</li>
						<li>
							<a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="blank.html">Blank Page</a>
								</li>
								<li>
									<a href="login.html">Login Page</a>
								</li>
							</ul>
							<!-- /.nav-second-level -->
						</li>
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>
			<!-- /.navbar-static-side -->
		</nav>

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header"><?php print $this->title; ?></h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div id="content" class="row">
				<?php print $this->data['content']; ?>
			</div>
			<!-- /.row -->
		</div>
		<!--  / #page-wrapper -->
	</div>
	<!-- /#wrapper -->
	<?php $this->html->js(); ?>
	<!-- <script src="[rooturl]theme/vender/highlight/highlight.pack.js"></script> -->
	<script>
		$(function() {
			//かっこ良いセレクトを実行
			$(".select2").select2();
			//アコーディオンプラグイン＆状態cookie保存
			$('.sCollapse').sCollapse();

			// #で始まるアンカーをクリックした場合に処理
			// $('a[href^="#"]').click(function() {
			// 	// スクロールの速度
			// 		var speed = 400; // ミリ秒
			// 	// アンカーの値取得
			// 	var href= $(this).attr("href");
			// 	// 移動先を取得
			// 	var target = $(href == "#" || href == "" ? 'html' : href);
			// 	// 移動先を取得を数値で取得
			// 	var position = target.offset().top;
			// 	// スムーススクロール
			// 	$('body,html').animate({scrollTop:position}, speed, 'swing');
			// 	return false;
			// });
		});
	</script>
</body>

</html>
