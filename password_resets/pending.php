<?php include('logic.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Badili Neno-siri</title>
	<link rel="stylesheet" href="main.css">
</head>
<body>

	<form class="login-form" action="login.php" method="post" style="text-align: center;">
		<p>
			Tumetuma barua pepe kwenye anwani  <b><?php echo $_GET['email'] ?></b>, barua pepe hiyo itakusaidia kurudisha akaunti yako! 
		</p>
	    <p>Tafadhali ingia kwenye anwani yako ya barua pepe na ubonyeze link ili ubadili neno-siri lako.</p>
	</form>
		
</body>
</html>