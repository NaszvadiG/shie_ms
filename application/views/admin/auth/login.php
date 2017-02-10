<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">


	<title><?php print $this->title; ?>|　AlloraWiki 管理画面</title>
	<?php $this->html->css(); ?>

	<!-- Custom Fonts -->
	<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">ログインしてください</h3>
					</div>
					<div class="panel-body">
						<?php 
						echo form_open();
						?>
						<fieldset>
							<div class="form-group">
								<?php echo form_input($identity);?>
							</div>
							<div class="form-group">
								<?php echo form_input($password);?>
							</div>
							<div class="checkbox">
								<label>
									<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>自動的にログイン
								</label>
							</div>
							<!-- Change this to a button or input when using this as a form -->
							<?php echo form_submit('submit', 'Login',array('class'=>"btn btn-lg btn-success btn-block"));?>
						</fieldset>
						<?php echo form_close();?>
					</div>
				</div>
				<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
			</div>
		</div>
	</div>
	<?php $this->html->js(); ?>
</body>
</html>