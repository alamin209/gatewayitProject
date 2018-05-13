<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Wellcome</title>
</head>
	<body >
		<div style="text-align:center;">
			<h1>Registration here</h1>
	        <form class="form" action="<?= base_url('admin/registration');?>" method="post">
	            <input type="text" name="username" value="" placeholder="Username" required><br><br>
	            <input type="email" name="email" value="" placeholder="email" required><br><br>
	            <input type="password" name="password" value="" placeholder="Password" required><br><br>
	            <input type="submit" name="submit" value="Submit here"><br><br>
	            <a href="<?= base_url('welcome/reg_success');?>">Login</a>
	        </form>
		</div>
	</body>
</html>