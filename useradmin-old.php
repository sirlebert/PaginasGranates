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
				<!-- user information -->
				<?php
					print '<div class="item-title">Bienvenido '.$_SESSION["username"].'</div>';
				?>

				<a href="newpassword.php"><button name="edit" type="button" class="boton">Cambiar Contraseña</button></a> <a href="newservice.php"><button name="add_service" type="button" class="boton">Añadir Servicio</button></a>
				<!-- /user information -->
				<!-- Services offered-->
				<div class="left-sidebar">
					<h2>Servicios Ofrecidos</h2>
					<div class="item-p">
						<?php 
							//MySqli Select Query
							$results3 = $mysqli->query("SELECT * FROM list where user like '".$_SESSION["email"]."'");
							while($row3 = $results3->fetch_assoc()) {
								echo $row3["name"].'<a href="editservice.php?id='.$row3["id"].'" alt="Edit"> <i class="fa fa-pencil-square-o"> Edit </i></a> <a href="delservice.php?id='.$row3["id"].'" alt="Delete"><i class="fa fa-trash-o"> Delete</i></a>';
							echo "<br>";
							}
						?>
					</div>
				</div>
				<!-- Services Pending-->
				<div class="left-sidebar">
					<h2>Servicios Pendientes</h2>
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
				<!-- /services -->
				<div class="left-sidebar">
					<h2>Otros</h2>
					<?php
						echo '<a href="deluser.php?user='.$_SESSION["email"].'"><button name="edit" type="button" class="boton">Eliminar Usuario y Servicios</button></a>';
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