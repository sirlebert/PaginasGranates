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
    <title>Servicio temp | Admin | Españoles en Edimburgo</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
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
					$v1=$_GET['id'];

					//MySqli Select Query
					$results3 = $mysqli->query("SELECT * FROM list_temp where id like '".$v1."'");
					while($row3 = $results3->fetch_assoc()) {
						print '<div class="item-title">'.$row3["name"].'</div>';
						print '<div class="item-subtitle">'.$row3["username"].'</div>';
						print '<div class="item-p">';
						$salida = nl2br($row3["description"]);
						print $salida.'<br>';
						if($row3["telephone"] != NULL){
						print '<i class="fa fa-phone-square"></i>'.$row3["telephone"].'<br>';
						}
						if($row3["web"] != NULL){
							print '<a href="'.$row3["web"].'" target="_blank"><i class="fa fa-wifi"></i> '.$row3["web"];
						}
						if($row3["web2"] != NULL){
							print'<a href="'.$row3["web2"].'"target="_blank"><i class="fa fa-wifi"></i> '.$row3["web2"];
						}
						print '<a href="'.$row3["facebook"].' "target="_blank"> <i class="fa fa-facebook"></i> '.$row3["facebook"].'</a><br>';
						if($row3["email"] != NULL){
						print '<a href="correo.php?to='.$row3["email"].' "target="_blank"><i class="fa fa-envelope"></i> '.$row3["email"].'<br>';
						}
						print '</div>';
						print '<hr>';
					}  
						echo '<a href="aprobar.php?id='.$v1.'"><button name="aprobar" type="button" class="boton">Aprobar</button></a>';
						echo ' <a href="deltempservice.php?id='.$v1.'"><button name="eliminar" type="button" class="boton">Eliminar</button></a>';
						echo ' <a href="edittempservice.php?id='.$v1.'"><button name="edit" type="button" class="boton">Editar</button></a>';
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