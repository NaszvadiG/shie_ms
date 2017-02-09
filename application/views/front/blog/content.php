<!DOCTYPE html>
<html lang="jp">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Blog Post - Start Bootstrap Template</title>
	<!-- Bootstrap Core CSS -->
	<link href="<?php print $this->url->css_url('plugin/bootstrap.min','front'); ?>" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?php print $this->url->css_url('blog-post','front'); ?>" rel="stylesheet">
	<link href="<?php print $this->url->css_url('style','front'); ?>" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>

		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Start Bootstrap</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							<a href="#">About</a>
						</li>
						<li>
							<a href="#">Services</a>
						</li>
						<li>
							<a href="#">Contact</a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container -->
		</nav>

		<!-- Page Content -->
		<div class="container">

			<div class="row">

				<!-- Blog Post Content Column -->
				<div class="col-lg-8">

					<!-- Blog Post -->

					<!-- Title -->
					<h1 id="blog_title" class="post_title">
						<?php print htmlspecialchars($this->data['post']['title']); ?>
					</h1>

					<!-- Author -->
					<p class="lead">
						by <a href="<?php  print $this->url->controller_url('index/create_id/'.htmlspecialchars($this->data['post']['create_id'])); ?>"><?php print htmlspecialchars($this->data['post']['user']); ?></a>
					</p>

					<hr>

					<!-- Date/Time -->
					<p><span class="glyphicon glyphicon-time"></span> Posted on <?php print htmlspecialchars($this->data['post']['create_datetime']); ?></p>

					<hr>

					<div id="blog_content" class="post_content">
						<?php print $this->data['post']['content']; ?>
					</div>

					<hr>

					<!-- Blog Comments -->

					<!-- Comments Form -->


				</div>

				<!-- Blog Sidebar Widgets Column -->
				<div class="col-md-4">

					<!-- Blog Search Well -->
					<div class="well">
						<h4>Blog Search</h4>
						<div class="input-group">
							<input type="text" class="form-control">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button">
									<span class="glyphicon glyphicon-search"></span>
								</button>
							</span>
						</div>
						<!-- /.input-group -->
					</div>

					<!-- Blog Categories Well -->
					<div class="well">
						<h4>Blog Categories</h4>
						<div class="row">
							<div class="col-lg-6">
								<ul class="list-unstyled">
									<li><a href="#">Category Name</a>
									</li>
									<li><a href="#">Category Name</a>
									</li>
									<li><a href="#">Category Name</a>
									</li>
									<li><a href="#">Category Name</a>
									</li>
								</ul>
							</div>
							<div class="col-lg-6">
								<ul class="list-unstyled">
									<li><a href="#">Category Name</a>
									</li>
									<li><a href="#">Category Name</a>
									</li>
									<li><a href="#">Category Name</a>
									</li>
									<li><a href="#">Category Name</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- /.row -->
					</div>

					<!-- Side Widget Well -->
					<?php if(array_key_exists('adminBlock', $this->data)){ ?>
					<?php print $this->data['adminBlock']; ?>
					<?php } ?>

				</div>

			</div>
			<!-- /.row -->

			<hr>

			<!-- Footer -->
			<footer>
				<div class="row">
					<div class="col-lg-12">
						<p>Copyright &copy; Your Website 2014</p>
					</div>
				</div>
				<!-- /.row -->
			</footer>

		</div>
		<!-- /.container -->

		<!-- jQuery -->
		<script src="<?php print $this->url->js_url('plugin/jquery','front')?>"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="<?php print $this->url->js_url('plugin/bootstrap.min','front')?>"></script>
		<?php $this->html->js('front'); ?>

	</body>

	</html>
