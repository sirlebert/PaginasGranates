<!DOCTYPE html>
<?php 
session_start();
if(isset($_SESSION["username"])){
	$in=1;
	header("Location: user.php");
}else{
	$in=0;
	
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
				<div class="col-sm-3">
					<?php
						include 'categories.php';
					?>
				</div>
				
				<div class="col-sm-9 padding-right">
					<?php
						$username=$_POST["logemail"];
						$passwd=sha1($_POST["logpass"]);

						//MySqli Select Query
						$results3 = $mysqli->query("SELECT * FROM users where email like '".$username."' and password like '".$passwd."' and active like '1'");
						$row_cnt = $results3->num_rows;
						$row3 = $results3->fetch_assoc();
						if ($row_cnt == 1){
							$_SESSION["username"] = $row3["name"].' '.$row3["surname"];
							$_SESSION["level"]=$row3["level"];
							$_SESSION["email"]=$row3["email"];
							print '<div class="item-title">Bienvenido '.$_SESSION["username"].'</div>
							<div class="item-subtitle">A continuacion sera redireccionado hacia la zona de usuarios</div>';
							switch ($row3["level"]) {
								case 1: echo "<meta http-equiv=\"refresh\" content=\"3;url=user.php\"/>";
											break;
								case 2:echo "<meta http-equiv=\"refresh\" content=\"3;url=admin.php\"/>";
											break;
											
							}
						}else{
							echo '<div class="item-subtitle">No se ha podido iniciar sesion</div><br>Puede que el usuario no este activado, en tal caso comprueba tu correo electronico<br> Tambien puede ser que el email o la contraseña sean erroneos';
							echo "<meta http-equiv=\"refresh\" content=\"5;url=login.php\"/>";
						}
					?>
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