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
    <title>Nuevo Servicio | Españoles en Edimburgo</title>
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
						<div class="signup-form"><!--sign up form-->
							<?php
								$results3 = $mysqli->query("SELECT * FROM `category` order by category");
							?>
							<h2>Añadir Servicio</h2>
							<form name="newservice" action="recordnewservice.php" method="post">
							Elije una Categoria (obligatorio):<select name="category" required >
							<option value="0">Seleccione...</option>
							<?php
								while($row3 = $results3->fetch_assoc()) {
									print '<option value="'.$row3["ID"].'">'.$row3["category"].'</option>';
								} 
							?>
							</select><p>
								Nombre de la empresa o Servicio ofrecido:
								<input name="name" type="text" placeholder="Nombre del Servicio (obligatorio)" required />
								Descripcion del Servicio:
								<textarea name="description" class="form-control" rows="5" placeholder="Descripcion del Servicio (obligatorio)"required> </textarea>
								Introduce tu perfil personal de Facebook:
								<input name="facebook" type="url" placeholder="Perfil de Facebook incluyendo http:// (obligatorio)" required />
								Pagina web o Pagina de facebook del servicio:
								<input name="web1" type="url" placeholder="Direccion web o de facebook incluyendo http://"  />
								Si dispones de alguna direccion mas:
								<input name="web2" type="url" placeholder="Direccion web incluyendo http://" />
								Telefono:
								<input name="telephone" type="number" onKeyDown="myFunction()" placeholder="Numero de Telefono" />
								Email:
								<input name="email" type="email" placeholder="Direccion Email" />
								<?php
									echo'<input name="username" type="hidden" value="'.$_SESSION["username"].'"/>';
									echo'<input name="user" type="hidden" value="'.$_SESSION["email"].'"/>';
								?>
								
								<button name="newbutton" type="submit" class="btn btn-default" >Enviar</button>
							</form>
							Solicitamos el perfil de facebook como prueba de que la gente que ofrece servicios es miembro del grupo "Españoles en Edimburgo".
						</div><!--/sign up form-->
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