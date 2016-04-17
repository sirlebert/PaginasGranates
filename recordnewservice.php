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
    <title>Guardar Servicio | Españoles en Edimburgo</title>
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
					
						$category=$_POST["category"];
						$name=$_POST["name"];
						$description=$_POST["description"];
						$web1=$_POST["web1"];
						$web2=$_POST["web2"];
						$facebook=$_POST["facebook"];
						$telephone=$_POST["telephone"];
						$email=$_POST["email"];
						$username=$_POST["username"];
						$user=$_POST["user"];
						echo "<h2>Guardando Servicio</h2>";
						
						$results3 = mysqli_query($mysqli, "INSERT INTO list_temp 
								   (category, name, description, web, web2, facebook, telephone, email, username, user) 
						VALUES ('".$category."', '".$name."', '".$description."', '".$web1."', '".$web2."', '".$facebook."', '".$telephone."' , '".$email."', '".$username."', '".$user."')" );
						echo "servicio guardado pendiente de aprobacion";
						$subject= "Un nuevo servicio registrado - Edimburgo.ovh";
						$to="sgsantillana@edimburgo.ovh";
						$message = '<html><body>';
						$message .= '<h1>Hola!</h1>';
						$message .= 'Estas recibiendo este email por que alguien ha registrado un nuevo servicio,';
						$message .= '<br><br>Atentamente <br><br>El equipo de <a href="http://edimburgo.ovh">Españoles en Edimburgo - El Directorio</a>';
						$message .= '</body></html>';
						$headers = "From: noreply@Edimburgo.ovh\r\n";
						$headers .= "Reply-To: admin@edimburgo.ovh\r\n";
						$headers .= "Return-Path: admin@edimburgo.ovh\r\n";
						$headers .= "CC: \r\n";
						$headers .= "MIME-Version: 1.0\r\n";
						$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
						$headers .= "\r\n";
						mail($to,$subject,$message,$headers);
						echo "<meta http-equiv=\"refresh\" content=\"3;url=user.php\"/>";
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