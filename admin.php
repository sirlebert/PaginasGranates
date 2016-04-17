<!DOCTYPE html>
<?php 
session_start();
if(isset($_SESSION["username"])){
	$in=1;

}else{
	$in=0;
	header("Location: login.php");
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Españoles en Edimburgo</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	
</head><!--/head-->

<body>

	<?php
		include 'header.php';
	?>
	<section>
		<div class="container">
			<div class="row">
			<div class="col-sm-12 padding-right">
				<div class="col-sm-4 padding-right">
					<div class="left-sidebar">
						<h2>Usuarios</h2>
						<a href="adminusers.php?user="><center><img src="images/profile.png" width="50%"/></center></a>
					</div>
				</div>
			
				<div class="col-sm-4 padding-right">
					<div class="left-sidebar">
						<h2>Servicios</h2>
						<a href="adminservices.php"><center><img src="images/service.png" width="50%"/></center></a>
					</div>	
				</div>
			
				<div class="col-sm-4 padding-right">
					<div class="left-sidebar">
						<h2>Personal</h2>
						<a href="useradmin.php"><center><img src="images/profileadmin.png" width="50%"/></center></a>
					</div>	
				</div>
			</div>
		</div>
	</section>
	
	<?php
		include 'footer.php';
	?>	
  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>