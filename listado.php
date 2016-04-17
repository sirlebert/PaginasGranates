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
	<meta property="og:title" content="Servicios | Españoles en Edimburgo" />
	<meta property="og:image" content="http://www.edimburgo.ovh/images/espanoles.png" />
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
					<?php
						$v1=$_GET['cat'];
						
						print '<div class="item-title">'.ucwords ($v1).'</div><br>';
						if ($v1== "todos"){

								$results3 = $mysqli->query("SELECT category.category, category.id FROM category inner join list on category.id=list.category group by category.category ORDER BY category.category");
								
								while($row3 = $results3->fetch_assoc()) {
									print '<div class="item-subtitle">'.$row3["category"].'</div>';
									
									$results4 = $mysqli->query("SELECT * FROM `list` WHERE `category` like ".$row3["id"]);
									print '<div class="item-p"><ul>';
									while($row4 = $results4->fetch_assoc()) {
										print '<p><li><a href="servicio.php?id='.$row4["id"].'">'.$row4["name"].'</a><br></li></p>';
									}
									print '</ul></div>';
	  
								} 
						}else{
							$results5 = $mysqli->query("SELECT list.name, list.id as listid, category.id FROM list INNER JOIN category ON list.category=category.id where category.category like '".$v1."'");
							while($row5 = $results5->fetch_assoc()) {
								print '<li><div class="item-subtitle">'.$row5["name"].'       <a href="servicio.php?id='.$row5["listid"].'"><button type="button" class="btn btn-default get">Go</button></a></div></li>';
								print '<hr>';
							}  
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