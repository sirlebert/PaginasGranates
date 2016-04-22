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
					<?php
						$userget=$_GET["user"];
						$userpost=$_POST["user"];
						if($userpost == NULL){
							$user=$userget;
						}else{
							$user=$userpost;
						}

						$mysqli = new mysqli("localhost", "espanoles", "coco_1drilo", "espenedin2");
								if ($mysqli->connect_errno) {
								echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
								};
								$mysqli->set_charset("utf8");
							//MySqli Select Query
							$results3 = $mysqli->query("SELECT DISTINCT LEFT( users.name, 1 ) AS  'letra' FROM users ORDER BY letra");
							echo '<table  width="100%"><tr><td width="100px" align="left"><div class="item-subtitle"><a href="adminusers.php">TODOS</a></div></td>';
								while($row3 = $results3->fetch_assoc()) {
									print '<td width="30px" align="center"><div class="item-subtitle"><a href="adminusers.php?user='.$row3["letra"].'">'.ucwords ($row3["letra"]).'</a></div></td>';
								} 
							echo'<td align="right"><form name="login" action="adminusers.php" method="post">
							<input name="user" type="search" placeholder="Nombre del Usuario" required/>
							<button name="searchbutton" type="submit" class="btn btn-default">Buscar</button>
							</form></td>';
							echo '</tr></table>';
							echo '<br><div class="left-sidebar"><center><h2>Usuarios</h2></center></div>';
							if ($user == NULL)
							{
							$results4 = $mysqli->query("SELECT DISTINCT LEFT( users.name, 1 ) AS  'letra' FROM users WHERE active like '1' ORDER BY letra");
								echo '<table width="100%" >';
									echo "<tr>";
											echo '<td width="20%">';
												print '<b>Nombre y Apellidos</b>';
											echo "</td>";
											echo '<td width="25%">';
												print '<b>Correo Electronico</b>';
											echo "</td>";
											echo '<td width="15%">';
											echo "</td>";
											echo '<td width="15%">';
											echo "</td>";
											echo '<td width="10%">';
												print "<b>nivel</b>";
											echo "</td>";
											echo '<td width="15%">';
											echo "</td>";
										echo "</tr></table>";
								while($row4 = $results4->fetch_assoc()) {
									//this shows all the users
									print '<div class="item-subtitle">'.ucwords ($row4["letra"]).'</div>';
									
									$results5 = $mysqli->query("SELECT * FROM users WHERE name like '".$row4["letra"]."%'  and active like '1'");
									print '<div class="item-p"><ul><table width="100%">';
									while($row6 = $results5->fetch_assoc()) {
										echo "<tr>";
											echo '<td width="25%" align="left">';
												print '<p><li>'.ucwords ($row6["name"]).' '.ucwords ($row6["surname"]);
											echo "</td>";
											echo '<td width="28%">';
												print '<i class="fa fa-envelope-o"> </i> '.$row6["email"];
											echo "</td>";
											echo '<td width="18%">';
												print '<a href="editpassadmin.php?id='.$row6["id"].'" alt="Delete"> <i class="fa fa-pencil-square-o"> Cambiar Contraseña </i></a>';
											echo "</td>";
											echo '<td width="9%">';
												print '<a href="deluser.php?user='.$row6["email"].'&back=adminusers" alt="Delete"><i class="fa fa-trash-o"> Eliminar</i></a><br></li></p>';
											echo "</td>";
											echo '<td width="8%">';
												if ($row6["level"] == 2)
												{
													$nivel="admin";	
												}else{
													$nivel="usuario";
												}
												print $nivel;
											echo '<td width="12%">';
												if ($row6["level"] == 2)
												{
													print '<a href="leveldown.php?email='.$row6["email"].'&user='.$user.'"><i class="fa fa-level-down"></i>quitar admin</a>';	
												}else{
													print '<a href="levelup.php?email='.$row6["email"].'&user='.$user.'"><i class="fa fa-level-up"></i>hacer admin</a>';
												}
												
											echo "</td>";
										echo "</tr>";
									}
									print '</table></ul></div>';
	  
								}	
							}else{
									if ($userpost != NULL){
										echo '<div class="item-subtitle">Resultados para la busqueda de '.ucwords($user).':</div>';
										$results6 = $mysqli->query("SELECT * FROM `users` WHERE `name` like '".$user."%' or `surname` like '".$user."%' and 'active' like '1'");	
									}else{
										echo '<div class="item-subtitle">'.ucwords($user).'</div>';
										$results6 = $mysqli->query("SELECT * FROM `users` WHERE name like '".$user."%' and active like '1'");
									}
									print '<div class="item-p"><ul>';
									echo '<table width="100%">';
									echo "<tr>";
											echo '<td width="25%" align="left">';
												print '<b>Nombre y Apellidos</b>';
											echo "</td>";
											echo '<td width="28%" align="left">';
												print '<b>Correo Electronico</b>';
											echo "</td>";
											echo '<td width="18%" align="right">';
											echo "</td>";
											echo '<td width="9%" align="right">';
											echo "</td>";
											echo '<td width="8%" align="right">';
												print "<b>nivel</b>";
											echo "</td>";
											echo '<td width="12%" align="right">';
											echo "</td>";
										echo "</tr>";
									while($row6 = $results6->fetch_assoc()) {
										echo "<tr>";
											echo '<td align="left" width="25%">';
												print '<p><li>'.ucwords ($row6["name"]).' '.ucwords ($row6["surname"]);
											echo "</td>";
											echo '<td align="left" width="28%">';
												print '<i class="fa fa-envelope-o"> </i> '.$row6["email"];
											echo "</td>";
											echo '<td align="right" width="18%">';
												print '<a href="editpassadmin.php?id='.$row6["id"].'" alt="Delete"> <i class="fa fa-pencil-square-o"> Cambiar Contraseña </i></a>';
											echo "</td>";
											echo '<td align="right" width="9%">';
												print '<a href="deluser.php?user='.$row6["email"].'&back=adminusers" alt="Delete"><i class="fa fa-trash-o"> Eliminar</i></a><br></li></p>';
											echo "</td>";
											echo '<td align="right" width="8%">';
												if ($row6["level"] == 2)
												{
													$nivel="admin";	
												}else{
													$nivel="usuario";
												}
												print $nivel;
											echo "</td>";
											echo '<td align="right" width="12%">';
												if ($row6["level"] == 2)
												{
													print '<a href="leveldown.php?email='.$row6["email"].'&user='.$user.'"><i class="fa fa-level-down"></i>quitar admin</a>';	
												}else{
													print '<a href="levelup.php?email='.$row6["email"].'&user='.$user.'"><i class="fa fa-level-up"></i>hacer admin</a>';
												}
												
											echo "</td>";
										echo "</tr>";
										
									}
									print '</table></ul></div>';
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