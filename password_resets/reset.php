<?php include('logic.php'); ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Badili Neno-siri </title>
	<link rel="stylesheet" href="main.css">
</head>
<body>
	<form class="login-form" action="reset.php" method="post">
		<h2 class="form-title">Badili Neno-siri</h2>
		<!-- form validation messages -->
		<?php include('messages.php'); ?>
		<div class="form-group">
			<label>Jaza anwani yako ya barua pepe:</label>
			<input type="email" name="email">
		</div>
		<div class="form-group">
			<button type="submit" name="reset-password" class="login-btn">Wasilisha</button>
		</div>
	</form>
</body>
</html>