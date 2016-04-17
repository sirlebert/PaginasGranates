<!DOCTYPE html>
<?php 
session_start();
if(isset($_SESSION["username"])){
	$in=1;

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
					<?php
						$name=$_POST["name"];
						$subject= "recupera tu contraseña";
						$to=$_POST["message"];

						$mysqli = new mysqli("localhost", "espanoles", "coco_1drilo", "espenedin2");
						if ($mysqli->connect_errno) {
							echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
						};
						$mysqli->set_charset("utf8");
						$results = $mysqli->query("SELECT * FROM users where email like '".$to."'");
						$row_cnt = $results->num_rows;
							if($row_cnt == 0){
							echo "El correo introducido no coincide con ningun registro";	
							}else{
								$row = $results->fetch_assoc();
								$message = '<html><body>';
								$message .= '<h1>Hola, '.$row["name"].' '.$row["surname"].'!</h1>';
								$message .= 'Estas recibiendo este email por que has olvidado tu contraseña, haciendo click en el siguiente link podras cambiarla por una nueva<br><br>';
								$message .= 'Si tu no has solicitado este email, simplemente ignoralo<br><br>';
								$message .= 'Accede a este link e introduce tu nueva contraseña:<br><br><a href="http://edimburgo.ovh/passforgot.php?id='.$row["id"].'&code='.$row[code].'">http://edimburgo.ovh/passforgot.php?id='.$row["id"].'&code='.$row[code].'</a><br><br>';
								$message .= 'O tambien puedes ir a <a href="http://edimburgo.ovh/passforgot.php?id='.$row["id"].'">aqui</a> e Introducir el codigo: <h3>'.$row[code].'</h3><br><br> ';		
								$message .= '<br><br>Atentamente <br><br>El equipo de <a href="http://edimburgo.ovh">Españoles en Edimburgo - El Directorio</a>';
								$message .= '</body></html>';
								$headers = "From: noreply@Edimburgo.ovh\r\n";
								$headers .= "Reply-To: espanolesenedimburgo@gmail.com\r\n";
								$headers .= "Return-Path: espanolesenedimburgo@gmail.com\r\n";
								$headers .= "CC: \r\n";
								$headers .= "MIME-Version: 1.0\r\n";
								$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
								$headers .= "\r\n";

								if ( mail($to,$subject,$message,$headers) ) {
								   echo "<h2>Comprueba tu Correo, tienes un email!</h2><br>Puede que el email haya ido a la carpeta de Spam, compruebala si ves que no te llega";
								   } else {
								   echo "<h2>No se ha podido enviar el email, pruebe mas tarde</h2>";
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