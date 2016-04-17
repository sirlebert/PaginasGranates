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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cookies | Españoles en Edimburgo</title>
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
		include'header.php';
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
							
							<table width="100%" border="0">
							  <tr>
							    <td>
								
							<div class="item-title">Cookies</div></td>
							    
						      </tr>
				  </table>
				  
				  <div class="item-p">Edimburgo.ovh usa cookies sólo con objetivos técnicos, para la autenticación de usuarios. En ningún caso estos cookies se usan para otro fines a los anteriormente descriptos, ni se pasa información a terceros. 

<br><br>Usamos Google Analytics para obtener las estadísticas de accesos, por lo que además de los cookies mencionados, se podrían incluir otros cookies para el seguimiento de sesiones y usuarios únicos. En ningún caso estos cookies incluyen información personal o privada de los usuarios registrados en edimburgo.ovh, están completamente disasociados y aislados de los datos que gestiona Españoles en Edimburgo - El Directorio -. 

<br><br>Las empresas que llevan las estadísticas de acceso, podrían usar cookies con fines estadísticos y sólo para los accesos a sus servidores. En ningún caso se relacionan con los datos de usuarios de edimburgo.ovh, y hacemos el esfuerzo técnico para impedir que haya fugas de datos personales. 

<br><br>Los usuarios pueden eliminarlos o impedir el envío de esos cookies desde las opciones de su navegador.<br><br>
La administración 

		</div></div>
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