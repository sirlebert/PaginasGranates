<!DOCTYPE html>
<?php 
session_start();
if(isset($_SESSION["username"])){
	$in=1;

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
			<div class="col-sm-12 padding-right">
				<div class="col-sm-6 padding-right">
					
				<div class="left-sidebar">
					<h2>Servicios Pendientes</h2>
				</div>
				<?php
						$mysqli = new mysqli("localhost", "espanoles", "coco_1drilo", "espenedin2");
								if ($mysqli->connect_errno) {
								echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
								};
								$mysqli->set_charset("utf8");
							//MySqli Select Query
							$results = $mysqli->query("SELECT category.category, category.id FROM category inner join list_temp on category.id=list_temp.category group by category.category ORDER BY category.category");
							$row_cont=$results->num_rows;
							if($row_cont > 0){
								while($row = $results->fetch_assoc()) {
									print '<div class="item-subtitle">'.$row["category"].'</div>';
									
									$results2 = $mysqli->query("SELECT * FROM `list_temp` WHERE `category` like ".$row["id"]);
									print '<div class="item-p"><ul>';
									while($row2 = $results2->fetch_assoc()) {
										print '<p><li><a href="serviciotempadmin.php?id='.$row2["id"].'">'.$row2["name"].'</a><br></li></p>';
									}
									print '</ul></div>';
	  
								} 
							}else{
								echo '<center><img src="images/toilet.jpg"></center>';
							}
					?>
				</div>
			
			
				<div class="col-sm-6 padding-right">
					
				<div class="left-sidebar">
					<h2>Servicios Aprobados</h2>
				</div>
						<?php
							$results3 = $mysqli->query("SELECT category.category, category.id FROM category inner join list on category.id=list.category group by category.category ORDER BY category.category");
							
							while($row3 = $results3->fetch_assoc()) {
								print '<div class="item-subtitle">'.$row3["category"].'</div>';
								$results4 = $mysqli->query("SELECT * FROM `list` WHERE `category` like ".$row3["id"]);
									print '<div class="item-p"><ul>';
									while($row4 = $results4->fetch_assoc()) {
										print '<p><li><a href="servicioadmin.php?id='.$row4["id"].'">'.$row4["name"].'</a><br></li></p>';
									}
								print '</ul></div>';
  							}  
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