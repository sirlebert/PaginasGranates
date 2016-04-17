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
    <title>About US | Españoles en Edimburgo</title>
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
								
							<div class="item-title">About Us</div></td>
							    
						      </tr>
				  </table>
				  
				  <div class="item-p">El directorio es un servicio asociado al grupo de Facebook “Españoles en Edimburgo”.<br><br>
Este nace ante la demanda de servicios por parte de los miembros del grupo, servicios como peluquería, fontanería… publicándose casi entrada la navidad de 2014 el primer directorio en pdf, con más de 80 personas registradas ofreciéndose en más de 25 categorías diferentes, y recibiendo más solicitudes para aparecer.<br><br>
La forma en que el primer directorio fue creado hacia que la actualización de este fuera más compleja, había que crear un documento nuevo cada vez que se actualizaba algo, lo cual conllevaba el esfuerzo del ofertante para corregir los fallos como de los administradores del grupo para editarlo y crear el documento nuevo, y es por ello que nace la idea de este sitio web, un directorio nuevo, más dinámico, más accesible y donde los administradores tuvieran que tomar menos partido y los usuarios tuvieran el control.<br><br>
Y aquí esta, nuestra criatura, en continuo desarrollo, esperamos que les sirva de ayuda.<br><br>
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