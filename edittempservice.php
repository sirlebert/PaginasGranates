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
	<SCRIPT type="text/javascript">
	function myFunction() {
		var e = event || window.event;  
		var key = e.keyCode || e.which; 

		if (key < 48 || key > 57) { 
			if(key == 8 || key == 46){} //allow backspace and delete                                   
			else{
				if (e.preventDefault) e.preventDefault(); 
				e.returnValue = false; 
			}	
		}
	}
	</script>
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
						<div class="signup-form">
							<?php
								$id=$_GET["id"];
								$results3 = $mysqli->query("SELECT * FROM list_temp where id like '".$id."'");
								$row3 = $results3->fetch_assoc();
							?>
							<h2>Editar Servicio</h2>
							<form name="updateservice" action="recordupdateservice.php" method="post">
							<?php
								echo'<input name="category" type="hidden" value="'.$row3["category"].'"/>';
								echo'<input name="id" type="hidden" value="'.$id.'"/>';
								echo'<input name="name" type="text" placeholder="Nombre del Servicio" value="'.$row3["name"].'"/>';
								echo'<textarea name="description" class="form-control" rows="5">'.$row3["description"].'</textarea>';
								echo'<input name="web1" type="url" placeholder="Direccion web o de facebook incluyendo http://" value="'.$row3["web"].'"/>';
								echo'<input name="web2" type="url" placeholder="Direccion web incluyendo http://" value="'.$row3["web2"].'" />';
								echo'<input name="facebook" type="url" placeholder="Perfil de Facebook incluyendo http://" value="'.$row3["facebook"].'"/>';
								echo'<input name="telephone" type="text" placeholder="Numero de Telefono" onKeyDown="myFunction()" value="'.$row3["telephone"].'"/>';
								echo'<input name="email" type="email" placeholder="Direccion Email" value="'.$row3["email"].'"/>';
							?>
							<button name="newbutton" type="submit" class="btn btn-default" >Enviar</button>
							</form>
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