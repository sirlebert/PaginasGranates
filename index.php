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
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>Empezando</span></h1>
									<h2></h2>
									<p>Acabas de llegar al pais y tenias una profesion en España? te explicamos como hacerte autonomo y no morir en el intento </p>
									<a href="employment.php"><button type="button" class="btn btn-default get">Go</button></a>
								</div>
								<div class="col-sm-6">
									<img src="images/carlton.png" class="banner-img img-responsive" alt="" />

								</div>
							</div>
		
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Actualiza</span></h1>
									<h2></h2>
									<p>Manten tus datos actualizados, por ejemplo que estas fuera, para que tus potenciales clientes puedan encontrarte</p>
									<button type="button" class="btn btn-default get">Go</button>
								</div>
								<div class="col-sm-6">
									<img src="images/castle.png" class="banner-img img-responsive" alt="" />

								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Valora</span></h1>
									<h2></h2>
									<p>Has contratado algun servicio? Inicia sesion y valora el servicio, tu opinion ayudara a otros a elegir</p>
									<button type="button" class="btn btn-default get">Go</button>
								</div>
								<div class="col-sm-6">
									<img src="images/forth.png" class="banner-img img-responsive" alt="" />

								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
						
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">ULTIMAS NOVEDADES</h2>
						<div class="col-sm-12">
							<div class="productinfo text-center">
								<h2>Ultimos Servicios</h2>
								<?php
									$results3 = $mysqli->query("SELECT id, name, username, left(description, 150) as description FROM list ORDER BY id DESC LIMIT 3");
									while($row3 = $results3->fetch_assoc()) {
										print '<div class="col-sm-4">';
											print '<div class="product-image-wrapper">';
												print '<div class="single-products">';
													print '<div class="productinfo text-center">';
													print '<div class="item-subtitle">'.$row3["name"].'</div>';
														print '<div class="item-p">'.nl2br($row3["description"]).'...</div>';
														print '<div class="item-subtitle">'.$row3["username"].'</div>';
														print '<a href="servicio.php?id='.$row3["id"].'"><button type="button" class="btn btn-default get">Leer mas...</button></a></li>';
													print '</div>';
												print '</div>';
											print '</div>';
										print '</div>';
									}  
								?>
							</div>
						</div>
					</div><!--features_items-->
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