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
					if(isset($_POST['g-recaptcha-response'])){
					  $captcha=$_POST['g-recaptcha-response'];
					}
					   if(!$captcha){
					  echo '<div class="item-subtitle">Please check the the captcha form.</div>';
					  echo "<meta http-equiv=\"refresh\" content=\"5;url=login.php\"/>";
					  exit;
					}
					$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=YOUR SECRET KEY&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
					if($response.success==false)
					{
						echo '<div class="item-subtitle">Please feel the form</div>';
					}else{
						 if ($_POST["newpass"]==$_POST["newreppass"]){
							if($_POST["newemail"]==$_POST["newrepemail"]){
								print 'contraseñas e emails coinciden';
								// Codigo generar clave
								function generar_clave($longitud){ 
								   $cadena="[^A-Z0-9]"; 
								   return substr(eregi_replace($cadena, "", md5(rand())) . 
								   eregi_replace($cadena, "", md5(rand())) . 
								   eregi_replace($cadena, "", md5(rand())), 
								   0, $longitud); 
								} 

							$clave=generar_clave(16); 
						$subject= "Activa tu Cuenta en Edimburgo.ovh";
						$to=$_POST["newemail"];
							$passwd=sha1($_POST["newpass"]);
							//record the user in the database
							$results3 = mysqli_query($mysqli, "INSERT INTO users (password, name, surname, email, active, code) VALUES ('".$passwd."', '".$_POST["newname"]."', '".$_POST["newsurname"]."', '".$_POST["newemail"]."', '1', '".$clave."')" );
							//enviar email activar
							$row = $results->fetch_assoc();
								$message = '<html><body>';
								$message .= '<h1>Hola, '.$row["name"].' '.$row["surname"].'!</h1>';
								$message .= 'Estas recibiendo este email por que te has registrado en Edimburgo.ovh, El directorio de Servicios de Españoles en Edimburgo<br><br>';
								$message .= 'Si tu no has solicitado este email, simplemente ignoralo<br><br>';
								$message .= 'Accede a este link para activar el usuario:<br><br><a href="http://edimburgo.ovh/activate.php?email='.$_POST["newemail"].'&code='.$clave.'">http://edimburgo.ovh/activate.php?email='.$_POST["newemail"].'&code='.$clave.'</a><br><br>';
								$message .= '<br><br>Atentamente <br><br>El equipo de <a href="http://edimburgo.ovh">Españoles en Edimburgo - El Directorio</a>';
								$message .= '</body></html>';
								$headers = "From: noreply@Edimburgo.ovh\r\n";
								$headers .= "Reply-To: espanolesenedimburgo@gmail.com\r\n";
								$headers .= "Return-Path: espanolesenedimburgo@gmail.com\r\n";
								$headers .= "CC: \r\n";
								$headers .= "MIME-Version: 1.0\r\n";
								$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
								$headers .= "\r\n";

						//		if ( mail($to,$subject,$message,$headers) ) {
						//		   	echo "<h2>Ya estas registrado</h2><br>Inicia sesion con tu nombre y usuario y";
						// 		  } else {
						//			echo "<h2>No se ha podido enviar el email, pruebe mas tarde</h2>";
						//		  }
							//volver al index

							echo "<h2>Ya estas registrado</h2><br>Inicia sesion con tu nombre y usuario <br> Recuerda que como usuario registrado puedes valorar servicios y publicar los tuyos propios";
							echo "<meta http-equiv=\"refresh\" content=\"5;url=index.php\"/>";
							
							}else{
								print '<div class="item-subtitle">emails no coinciden</div>';
								echo "<meta http-equiv=\"refresh\" content=\"5;url=login.php\"/>";
							}
						
						}else{
							print '<div class="item-subtitle">contraseñas no coinciden</div>';
							echo "<meta http-equiv=\"refresh\" content=\"5;url=login.php\"/>";
						}
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