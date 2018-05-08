<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?= (isset($title))? $title : ''; ?></title>

		<!-- Bootstrap -->
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
		<link href="<?= base_url('assets/front/');?>css/bootstrap.min.css" rel="stylesheet">
		<link href="<?= base_url('assets/front/');?>css/hover_style.css" rel="stylesheet">
		<link href="<?= base_url('assets/front/');?>css/headers.css" rel="stylesheet">

		<!--  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
		<!-- jQuery (necessary JavaScript plugins) -->
		<script type='text/javascript' src="<?= base_url('assets/front/');?>js/jquery-1.11.1.min.js"></script>
		<!-- Custom Theme files -->
		<link href="<?= base_url('assets/front/');?>css/style.css" rel='stylesheet' type='text/css' />
		<!-- Custom Theme files -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfont-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<!-- start menu -->
		<link href="<?= base_url('assets/front/');?>css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
		<script type="text/javascript" src="<?= base_url('assets/front/');?>js/megamenu.js"></script>
		<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
		<!-- start slider -->
		<link rel="stylesheet" href="<?= base_url('assets/front/');?>css/fwslider.css" media="all">
		<script src="<?= base_url('assets/front/');?>js/jquery-ui.min.js"></script>
		<script src="<?= base_url('assets/front/');?>js/fwslider.js"></script>
		<script src="<?= base_url('assets/front/');?>js/menu_jquery.js"></script>
		<!--end slider -->
	</head>

	<body>
		<?php
			include 'page/header.php';

			echo (isset($content))? $content : '';

			include 'page/footer.php';
		?>
		<script src="<?= base_url('assets/front/');?>js/bootstrap.min.js"></script> 
		<script src="<?= base_url('assets/front/');?>js/npm.js"></script>

	</body>
</html>