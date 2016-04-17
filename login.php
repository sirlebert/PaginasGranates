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
	<script src='https://www.google.com/recaptcha/api.js'></script>
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
					<div class="row">
						<div class="col-sm-4 col-sm-offset-1">
							<div class="login-form"><!--login form-->
								<h2>Inicia Sesion</h2>
								<form name="login" action="login2.php" method="post">
									<input name="logemail" type="email" placeholder="Direccion Email" required/>
									<input name="logpass" type="password" placeholder="Contraseña" required/>
									Olvidaste tu contraseña: click <a href="recuperar.php"> aqui</a>
									<button name="logbutton" type="submit" class="btn btn-default">Login</button>
								</form>
							</div><!--/login form-->
						</div>
						
						<div class="col-sm-1">
							<h2 class="or">O</h2>
						</div>
						
						<div class="col-sm-4">
							<div class="signup-form"><!--sign up form-->
								<h2>Create una Cuenta</h2>
								<form name="newuser" action="newuser.php" method="post">
									<input name="newname" type="text" placeholder="Nombre" required />
									<input name="newsurname" type="text" placeholder="Apellidos" required />
									<input name="newemail" type="email" placeholder="Direccion Email" required/>
									<input name="newrepemail" type="email" placeholder="Confirma Email" required"/>
									<input name="newpass" type="password" placeholder="Contraseña" required/>
									<input name="newreppass" type="password" placeholder="Confirma Contraseña" required"/>
									<div class="g-recaptcha" data-sitekey="6LejMAQTAAAAAJuSA6LKM9CTvqOr-oG_dMNc8Eeo"></div>
									<input type="checkbox" name="accept" required>He leido y aceptado las <a href="docs/CondicionesDeUso.pdf" target="_blank">condiciones de uso</a><br/>
									<button name="newbutton" type="submit" class="btn btn-default" >Enviar</button>
								</form>
							</div><!--/sign up form-->
						</div>
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