<!DOCTYPE html>
<?php 
session_start();
if(isset($_SESSION["username"])){
	$in=1;
	if ($_SESSION["level"] == 1)
	{
		header("Location: user.php");
	}
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
    <title>User Area | Españoles en Edimburgo</title>
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
				<!-- user information -->
				<?php
					print '<div class="item-title">Bienvenido '.$_SESSION["username"].'</div>';
				?>

								Recuerda comprobar la carpeta Spam, puede que tengas mensajes alli.<br><br>
				
				<!-- /user information -->
				<?php
												//Servicios Pendientes
								print '<div class="panel panel-default">';
								print '<div class="panel-heading">';
								print '<h4 class="panel-title">';
								print '<a data-toggle="collapse" data-parent="#accordian" href="#pendientes">';
								print '<span class="badge pull-right"><i class="fa fa-arrow-circle-down fa-2x"></i></span>';
								print '<div class="item-subtitle">Servicios Pendientes</div>';
								print '</a>';
								print '</h4>';
								print '</div>';
								print '<div id="pendientes" class="panel-collapse collapse">';
								print '<div class="panel-body">';
								print '<ul>';
								?>
								<div class="item-p">
									<?php 
										//MySqli Select Query
										$results5 = $mysqli->query("SELECT * FROM list_temp where user like '".$_SESSION["email"]."'");
										while($row5 = $results5->fetch_assoc()) {
											echo $row5["name"].' -Estado:'.$row5["estado"].'<a href="edittempservice.php?id='.$row5["id"].'" alt="Edit"> <i class="fa fa-pencil-square-o"> Edit </i></a> <a href="deltempservice.php?id='.$row5["id"].'" alt="Delete"><i class="fa fa-trash-o"> Delete</i></a>';
										echo "<br>";
										}
									?>
								</div>
								<?php
								print '</div>';
								print '</div>';
								print '</div>';
								
								//servicios aprovados
								print '<div class="panel panel-default">';
								print '<div class="panel-heading">';
								print '<h4 class="panel-title">';
								print '<a data-toggle="collapse" data-parent="#accordian" href="#aprobados">';
								print '<span class="badge pull-right"><i class="fa fa-arrow-circle-down fa-2x"></i></span>';
								print '<div class="item-subtitle">Servicios Aprobados</div>';
								print '</a>';
								print '</h4>';
								print '</div>';
								print '<div id="aprobados" class="panel-collapse collapse">';
								print '<div class="panel-body">';
								print '<ul>';
								?>
								<div class="item-p">
									<?php 
										//MySqli Select Query
										$results4 = $mysqli->query("SELECT * FROM list where user like '".$_SESSION["email"]."'");
										while($row4 = $results4->fetch_assoc()) {
											echo $row4["name"].' -Estado:'.$row4["estado"].'<a href="editservice.php?id='.$row4["id"].'" alt="Edit"> <i class="fa fa-pencil-square-o"> Edit </i></a> <a href="delservice.php?id='.$row4["id"].'" alt="Delete"><i class="fa fa-trash-o"> Delete</i></a>';
										echo "<br>";
										}
										
									?>
								</div>
								<?php
								print '</div>';
								print '</div>';
								print '</div>';
								
								//Valoraciones
								print '<div class="panel panel-default">';
								print '<div class="panel-heading">';
								print '<h4 class="panel-title">';
								print '<a data-toggle="collapse" data-parent="#accordian" href="#valoraciones">';
								print '<span class="badge pull-right"><i class="fa fa-arrow-circle-down fa-2x"></i></span>';
								print '<div class="item-subtitle">Valoraciones</div>';
								print '</a>';
								print '</h4>';
								print '</div>';
								print '<div id="valoraciones" class="panel-collapse collapse">';
								print '<div class="panel-body">';
								print '<ul>';
								?>
								<div class="item-p">
									<?php 
										$results4 = $mysqli->query("SELECT id FROM users where email like '".$_SESSION["email"]."'");
										$row4 = $results4->fetch_assoc();
										$results6 = $mysqli->query("SELECT rating.id as ratid, rating.title, list.id, list.name FROM rating INNER JOIN list on rating.service=list.id where rating.writer like '".$row4["id"]."' and rating.approved like '1'");
										while($row6 = $results6->fetch_assoc()) {
											echo $row6["title"].' - <a href="http://edimburgo.ovh/servicio.php?id='.$row6["id"].'">'.$row6["name"].'</a>';
											echo ' - <a href="delrating.php?id='.$row6["ratid"].'" alt="Delete"><i class="fa fa-trash-o"> Delete</i></a>';
											echo "<br>";
										}
									?>
								</div>
								<?php
								print '</div>';
								print '</div>';
								print '</div>';
								//Otros
								
								print '<div class="panel panel-default">';
								print '<div class="panel-heading">';
								print '<h4 class="panel-title">';
								print '<a data-toggle="collapse" data-parent="#accordian" href="#Otros">';
								print '<span class="badge pull-right"><i class="fa fa-arrow-circle-down fa-2x"></i></span>';
								print '<div class="item-subtitle">Otros <div class="item-subtitle3">(Cambiar Contraseña, Eliminar Usuario, Añadir Servicio)</div></div>';
								print '</a>';
								print '</h4>';
								print '</div>';
								print '<div id="Otros" class="panel-collapse collapse">';
								print '<div class="panel-body">';
								print '<ul>';
								?>
								<div class="item-p">
									<a href="newpassword.php"><button name="edit" type="button" class="boton">Cambiar Contraseña</button></a> 
									 <a href="newservice.php"><button name="add_service" type="button" class="boton">Añadir Servicio</button></a>
									 <a href="comprobar.php"><button name="edit" type="button" class="boton">Eliminar Usuario y Servicios</button></a>
								</div>
								<?php
								print '</div>';
								print '</div>';
								print '</div>';
								?>
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