<?php include('logic.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Badili Neno-siri</title>
	<link rel="stylesheet" href="main.css">
</head>
<body>
	<form class="login-form" action="new_pass.php" method="post">
		<h2 class="form-title">Neno-siri Jipya</h2>
		<!-- form validation messages -->
		<?php include('messages.php'); ?>
		<div class="form-group">
			<label>Neno-siri jipya</label>
			<input type="password" name="new_pass">
		</div>
		<div class="form-group">
			<label>Rudia neno-siri jipya</label>
			<input type="password" name="new_pass_c">
		</div>
		<div class="form-group">
			<button type="submit" name="new_password" class="login-btn">Wasilisha</button>
		</div>
	</form>
</body>
</html>