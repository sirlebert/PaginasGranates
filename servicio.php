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
    <meta name="description" content="Estoy ofreciendo mis servicios en www.edimburgo.ovh">
    <meta name="author" content="">
	<meta property="og:title" content="Servicios | Españoles en Edimburgo" />
	<meta property="og:image" content="http://www.edimburgo.ovh/images/espanoles.png" />
	<meta property="og:description" content="Estoy ofreciendo mis servicios en www.edimburgo.ovh" />
	<title>ServicioS | Españoles en Edimburgo</title>
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
					$results3 = $mysqli->query("SELECT * FROM list where id like '".$v1."'");
					while($row3 = $results3->fetch_assoc()) {
						print '<div class="item-title">'.$row3["name"].'</div>';
						print '<div class="item-subtitle">'.$row3["username"].'</div>';
						print '<div class="item-p">';
						$salida = nl2br($row3["description"]);
						print $salida.'<br><br>';
						if($row3["telephone"] != NULL){
						print '<i class="fa fa-phone-square"></i>'.$row3["telephone"].'<br>';
						}
						if($row3["web"] != NULL){
							print '<a href="'.$row3["web"].'" target="_blank"><i class="fa fa-wifi"></i> Website';
						}
						if($row3["web2"] != NULL){
							print'<a href="'.$row3["web2"].'"target="_blank"><i class="fa fa-wifi"></i> Website2';
						}
						print '<a href="'.$row3["facebook"].' "target="_blank"> <i class="fa fa-facebook"></i> Facebook</a><br>';
						if($row3["email"] != NULL){
						print '<i class="fa fa-envelope"></i> '.$row3["email"].'<br>';
						}
						echo '	<Script>
						document.title = "'.$row3["name"].' - Españoles en Edimburgo";
						
						</script>';
						?>
						<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>
						<?php
						print '<div class="fb-share-button" data-href="'.$_SERVER['REQUEST_URI'].'" data-layout="button"></div>';
						print '</div><br>';
						//evaluaciones

							if ($in==1)
								{
								print '<div class="panel panel-default">';
								print '<div class="panel-heading">';
								print '<h4 class="panel-title">';
								print '<a data-toggle="collapse" data-parent="#accordian" href="#newratings">';
								print '<span class="badge pull-right"><i class="fa fa-arrow-circle-down fa-2x"></i></span>';
								print '<div class="item-subtitle">Escriba su Valoracion</div>';
								print '</a>';
								print '</h4>';
								print '</div>';
								print '<div id="newratings" class="panel-collapse collapse">';
								print '<div class="panel-body">';
								print '<ul>';
								print'<form name="newrating" action="recordnewrating.php" method="post">
								Titulo:
								<input name="title" type="text" size="100%" required /><br>
								<input name="service" type="hidden" value="'.$v1.'">';
								$results7 = $mysqli->query("SELECT id FROM users WHERE email like '".$_SESSION["email"]."'");
								$row7 = $results7->fetch_assoc();
								print '<input name="writer" type="hidden" value="'.$row7["id"].'">
									Valore el Servicio (0-10):<select name="rating" required >
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>							
									<option value="10">10</option>
									</select><p>
									Comente la Valoracion del Servicio:
									<textarea name="descripcion" class="form-control" rows="5" placeholder="Valoracion del Servicio"required> </textarea>
									<br><button name="newbutton" type="submit" class="btn btn-default" >Enviar</button>';
								print '</div>';
								print '</div>';
								print '</div>';	
								}		
								
							$results4 = $mysqli->query("SELECT * FROM rating WHERE rating.service like '".$v1."' and approved like '1'");
							$row_cont=$results4->num_rows;
							if($row_cont > 0){
								print '<div class="panel panel-default">';
								print '<div class="panel-heading">';
								print '<h4 class="panel-title">';
								print '<a data-toggle="collapse" data-parent="#accordian" href="#ratings">';
								print '<span class="badge pull-right"><i class="fa fa-arrow-circle-down fa-2x"></i></span>';
								$results5 = $mysqli->query("SELECT AVG(rating) as avgrating, count(id) as count FROM rating WHERE rating.service like '".$v1."' and approved like '1'");
								$row5 = $results5->fetch_assoc();
								print '<div class="item-subtitle">Valoracion: '.number_format((float)$row5["avgrating"], 2, '.', '').' ('.$row5["count"].' Evaluaciones)</div>';
								print '</a>';
								print '</h4>';
								print '</div>';
								print '<div id="ratings" class="panel-collapse collapse">';
								print '<div class="panel-body">';
								print '<ul>';
										
										$results6 = $mysqli->query("SELECT * FROM rating WHERE rating.service like '".$v1."' and approved like '1'");
										while($row6 = $results6->fetch_assoc()){
										print '<div class="panel panel-default">';
										print '<div class="panel-heading">';
										print '<h4 class="panel-title">';

										print '<span class="badge pull-right"><div class="item-subtitle2">'.$row6["rating"].'</div></span>';
										print '<div class="item-subtitle">'.$row6["title"].'</div>';

										print '</h4>';
										print '</div>';
										print '<div class="panel-body">';
										print '<ul>';
										
										print $row6["descripcion"];
										
										print '</div>';
										print '</div>';
										
										}
								print '</div>';
								print '</div>';
								print '</div>';
							}else{
								print '<div class="panel panel-default">';
								print '<div class="panel-heading">';
								print '<h4 class="panel-title">';
								print '<div class="item-subtitle">No Hay Evaluaciones</div>';
								print '</h4>';
								print '</div>';
								print '</div>';
							}
						// fin evaluaciones
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