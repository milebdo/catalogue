<!DOCTYPE HTML>
<html dir="ltr" lang="en-US">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Catalog-login</title>
	<!--- Javascript libraries (jQuery and Selectivizr) used for the custom checkbox --->
	<link rel="shortcut icon" type="image/png" href="<?=base_url()?>file/style/favicon.png" />
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>file/pss/style.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>file/pss/fallback.css" />
	<script type="text/javascript" src="<?=base_url()?>file/pss/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>file/pss/selectivizr.js"></script>
	<!--[if (gte IE 6)&(lte IE 8)]>
		<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="selectivizr.js"></script>
		<noscript><link rel="stylesheet" href="fallback.css" /></noscript>
	<![endif]-->

	</head>

	<body>
		<div id="container">
			<?php echo form_open('screen'); ?>
				<div class="login">LOGIN</div>
				<div class="username-text">Username:</div>
				<div class="password-text">Password:</div>
				<div class="username-field">
					<input type="text" name="username" value="" />
				</div>
				<div class="password-field">
					<input type="password" name="password" value="" />
				</div>
				<div style="padding-left:410px;"><input type="submit" name="submit" value="GO" /></div>
			<?=form_close()?>
		</div>
		<div id="footer">
		<?php 
			echo"<a style='font-size:10px; color:#606060'>";
			echo validation_errors(); 
			echo"</a>";
		?>
		</div>
	</body>
</html>
