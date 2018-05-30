<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Upohar BANGLA</title>
		<meta name="keywords" content="" />
		<link rel="image_src" href="<?= base_url('assets/front/');?>images/uploads/thumbs/thumb_urgent_gift_delivery.jpg" />
		<link rel="image_src" href="<?= base_url('assets/front/');?>images/uploads/Household/plant_32.jpg" />
		<link rel="image_src" href="<?= base_url('assets/front/');?>skins/upohar/styleImages/UpoharBD.jpg" />
		
		<link href="<?= base_url('assets/front/');?>skins/upohar/styleSheets/bootstrap.css" rel="stylesheet">
		<link href="<?= base_url('assets/front/');?>skins/upohar/styleSheets/qc_upohar.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?= base_url('assets/front/');?>skins/upohar/styleSheets/responsive.css" type="text/css" media="screen" />
		
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		
		<script type="text/javascript" src="<?= base_url('assets/front/');?>js/jquery-2.2.3.min.js"></script> 
		
		<!--<script type="text/javascript" src="<?= base_url('assets/front/');?>js/custom.js"></script>
		
		<script type="text/javascript" src="<?= base_url('assets/front/');?>js/jquery.uploadify-3.1.js"></script>
		
		<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
		
		<link rel="stylesheet" href="<?= base_url('assets/front/');?>fancybox/source/jquery.fancybox8cbb.css" type="text/css" media="screen" />
		<script type="text/javascript" src="<?= base_url('assets/front/');?>fancybox/source/jquery.fancybox.pack8cbb.js?v=2.1.5"></script>
		<script type="text/javascript" src="<?= base_url('assets/front/');?>js/jslibrary.js"></script>
		<script type="text/javascript" src="<?= base_url('assets/front/');?>js/tabcontent.js">

		<script type="text/javascript" src="../apis.google.com/js/plusone.js"></script>
		<script type="text/javascript" src="<?= base_url('assets/front/');?>js/customac66.js"></script>-->
		
		<style>
			.fancybox-nav span {
			 visibility: visible;
			}
		</style>
		
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-3598078-1"></script>
		<noscript>
			<img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1658329947758379&amp;ev=PageView&amp;noscript=1"
		/>
		</noscript>
	</head>

	<body>

		<!-- Start Alexa Certify Javascript -->
		<script type="text/javascript" src="../d31qbv1cthcecs.cloudfront.net/atrk.js"></script>
		<script type="text/javascript">
			_atrk_opts = { atrk_acct: "JEEHg1awAe00in", domain:"upoharbangla.com"}; atrk ();
		</script>
		<noscript>
			<img src="../d5nxst8fruw4z.cloudfront.net/atrk37fa.gif?account=JEEHg1awAe00in" style="display:none" height="1" width="1" alt="---" />
		</noscript>
		<!-- End Alexa Certify Javascript -->
		
		<!-- mobile category -->
		<?php //include('page/category.php');?>
		<!-- mobile category end -->
		
		<!-- header -->
		<?php include('page/header.php');?>
		<!-- //header -->
		
		<div class="bodywhitearea">
			<!-- slider -->
			<?php
				if($slider){
					include('page/slider.php');
				}
			?>
			<!-- //slider -->
			
			<!-- testimonial -->
			<?php 
				if($testimonial){
					include('page/testimonial.php');
				}
			?>
			<!-- //testimonial -->
		  
			<!-- body -->
			<?= (isset($content))? $content : 'Nothing Found'; 
			?>
			<!-- //body -->
			
			<!-- footer -->
			<?php include('page/footer.php');?>
			<!-- //footer -->
			
			<!-- footer_bottom -->
			<?php 
				if($footer_bottom){
					//include('page/footer_bottom.php');
				}
			?>
			<!-- //footer_bottom -->
		</div>
		
		<?php //include('page/gift_package.php');?>
		
		<section class="featured_banner"></section>
	</body>
</html>
