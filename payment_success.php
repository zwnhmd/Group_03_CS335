<?php

session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}

?>$t

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>VifaaVyaShughuli Payment</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<style>
			table tr td {padding:10px;}
		</style>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">

			<!-- A logo is to be added here
				<a href="#" class="navbar-brand"><img src="#" alt="" width="135" height="96"/></a> -->

			</div>
			<ul class="nav navbar-nav">
				<li><a href="profile.php"><span class="glyphicon glyphicon-home"></span> Nyumbani</a></li>
		
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
	
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<h1>Asante! </h1>
						<hr/>
						<p>Habari, <?php echo $_SESSION["name"]; ?>, malipo yako yamekamilika,  namba ya muamala huu ni VTH5415SHSH87D25S<b></b><br/>
						Kwa sasa unaweza kuendelea na mahitaji mengine.<br/></p>
						<a href="index.php" class="btn btn-success btn-lg"> Endelea na mahitaji</a>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>

