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
						$city=$row3["city"];
					}  

				//record the record
				$results3 = mysqli_query($mysqli, "INSERT INTO list (category, name, description, web, web2, facebook, telephone, email, username, user, city) VALUES ('".$category."', '".$name."', '".$description."', '".$web1."', '".$web2."', '".$facebook."', '".$telephone."' , '".$email."', '".$username."', '".$user."', '".$city."')" );
				echo "Servicio aprobado";
				$results4 = $mysqli->query("DELETE FROM list_temp WHERE id like '".$id."'");
				echo "<meta http-equiv=\"refresh\" content=\"3;url=user.php\"/>";
				?>
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