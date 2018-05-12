<html>
<head>
    <title>Wellcome to admin Panel</title>
</head>
	<body >
	<div>
		<p style="color:#000 !important;">Hi <?php echo $this->session->userdata('username');?> you have successfully login !!!</p> <a href="<?= base_url('admin/logout');?>">Logout</a>
		
	</div>
	</body>
</html>