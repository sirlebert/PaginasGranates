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
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com/groups/225683810811975/"target="_blank"><i class="fa fa-facebook"></i>Españoles en Edimburgo</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="item-title">Españoles en Edimburgo</div>
						<div class="item-subtitle">El Directorio</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						
					</div>
					<div class="col-sm-6">
						<div class="item-subtitle">
						<div class="search_box pull-right">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li>
								<li><a href="listado.php?cat=todos&letter=zz">Listado</a></li>
								<li><a href="aboutus.php">About Us</a></li>
								<?php 
								if($in==1){
									print '<li><a href="user.php">Cuenta</a>';
									print '<li><a href="logout.php">Logout</a></li>';
								}else{									
									Print '<li><a href="login.php">Login</a>';
								}
								?>
                            </ul>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Categorias</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<!-- Conectar a la base de datos -->
							<?php
								$mysqli = new mysqli("localhost", "espanoles", "coco_1drilo", "espenedin2");
								if ($mysqli->connect_errno) {
								echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
								};
								$mysqli->set_charset("utf8");
							?>
							<!-- hasta aqui conectar base de datos -->
							
							<!-- Aqui empieza la select -->
							<?php 
							//MySqli Select Query
							$results = $mysqli->query("SELECT DISTINCT LEFT( category.category, 1 ) AS  'letra' FROM category INNER JOIN list on list.category=category.id ORDER BY letra");
							?>
							<!-- Aqui acaba la select -->
							<!--aqui empieza lo que se repite -->
							<?php while($row = $results->fetch_assoc()) {
							print '<div class="panel panel-default">';
								print '<div class="panel-heading">';
									print '<h4 class="panel-title">';
										print '<a data-toggle="collapse" data-parent="#accordian" href="#category'.$row["letra"].'">';
											print '<span class="badge pull-right"><i class="fa fa-plus"></i></span>';
											print '<div class="item-subtitle">'.$row["letra"].'</div>';
										print '</a>';
									print '</h4>';
								print '</div>';
								print '<div id="category'.$row["letra"].'" class="panel-collapse collapse">';
									print '<div class="panel-body">';
										print '<ul>';
										//MySqli Select Query
										$results2 = $mysqli->query("SELECT distinct category.category, category.id FROM category INNER JOIN list on list.category=category.id WHERE category.category like '".$row["letra"]."%'");
										
										while($row2 = $results2->fetch_assoc()) {
										print '<li><a href="listado.php?cat='.$row2["category"].'&letter='.$row["letra"].'"><div class="item-category">'.$row2["category"].'</div></a></li>';
										}  
										
										print '</ul>';
									print '</div>';
								print '</div>';
							print '</div>';
							} 
							
							?>
							<!--y aqui acaba -->
												
							
						</div><!--/category-products-->
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
				<?php
				$id=$_GET["id"];
				
				$mysqli = new mysqli("localhost", "espanoles", "coco_1drilo", "espenedin2");
				if ($mysqli->connect_errno) {
					echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				};
				$mysqli->set_charset("utf8");
				$results5 = $mysqli->query("SELECT * FROM list_temp where id like '".$id."'");
					while($row3 = $results5->fetch_assoc()) {
						$category=$row3["category"];
						$name=$row3["name"];
						$description=$row3["description"];
						$web1=$row3["web"];
						$web2=$row3["web2"];
						$facebook=$row3["facebook"];
						$telephone=$row3["telephone"];
						$email=$row3["email"];
						$username=$row3["username"];
						$user=$row3["user"];
					}  

				//record the record
				$results3 = mysqli_query($mysqli, "INSERT INTO list (category, name, description, web, web2, facebook, telephone, email, username, user) VALUES ('".$category."', '".$name."', '".$description."', '".$web1."', '".$web2."', '".$facebook."', '".$telephone."' , '".$email."', '".$username."', '".$user."')" );
				echo "Servicio aprobado";
				$results4 = $mysqli->query("DELETE FROM list_temp WHERE id like '".$id."'");
				echo "<meta http-equiv=\"refresh\" content=\"3;url=user.php\"/>";
				?>
			</div>
				</div>
			</div>
		</div>
	</section>
	
	
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>Españoles</span> En Edimburgo</h2>
							<p>Comunidad de inmigrantes españoles afincados en Edimburgo</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<p>Webs de Interes:</p>
								
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="http://www.viviredimburgo.com">
									<div class="iframe-img">
										<img src="images/viviredimburgo-logo.png" alt="" />
									</div>
									
								</a>
								<p>Vivir Edimburgo</p>
								
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Topic</p>
								<h2>24 DEC 2013</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Topic</p>
								<h2>24 DEC 2013</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">No Copyright © 2015 No rights reserved.</p>
					<p class="pull-right">This is a Beta </p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>