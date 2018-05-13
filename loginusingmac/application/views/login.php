<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Wellcome to admin Panel</title>
    <link rel="stylesheet" href="<?= base_url('');?>assets/css/style.css">
</head>
	<body >
	<div>
		<div class="wrapper">
		    <div class="container" style="background-image:url(<?= base_url('assets/06.jpg');?>);">
		        <h1>Welcome</h1>
		        <form class="form" action="<?= base_url('admin/admin_login');?>" method="post">
		            <input type="text" name="username" value="" placeholder="Username" required>
		            <input type="password" name="password" value="" placeholder="Password" required>
		            <input type="submit" name="submit" value="Login">
		        </form>
		    </div>

		    <ul class="bg-bubbles">
		        <li></li>
		        <li></li>
		        <li></li>
		        <li></li>
		        <li></li>
		        <li></li>
		        <li></li>
		        <li></li>
		        <li></li>
		        <li></li>
		        <li></li>
		    </ul>
		</div>
	</div>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	</body>
</html>