<?php include_once("analyticstracking.php") ?>
<header id="header"><!--header-->

<script src="//edimburgo.ovh/js/cookiechoices.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function(event) {
    cookieChoices.showCookieConsentDialog
('Las cookies nos ayudan a ofrecer nuestros servicios. Al utilizarlos, usted acepta el uso de cookies.',
 'Aceptar', 
 'Más info', 
 '//edimburgo.ovh/cookies.php');
  });
  
   function ChangeCity(city) {
	var myWindow = window.open("getcity.php?city="+city);

    location.reload(true); 
}
</script>

<?php
if( !isset($_SESSION['city']) )
    $_SESSION['city']="%";

//this parts gets the name of the page accessed, no domain, no extension
$nombre_archivo = $_SERVER['SCRIPT_NAME'];
	//get the url of the file of the page we are on
	if ( strpos($nombre_archivo, '/') !== FALSE )
	//remove everything just leaving the name of the file without extension
	$nombre_archivo = preg_replace('/\.php$/', '' ,array_pop(explode('/', $nombre_archivo)));

	$mysqli = new mysqli("localhost", "espanoles", "coco_1drilo", "espenedin2");
	if ($mysqli->connect_errno) {
		echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	};
	$mysqli->set_charset("utf8");
?>
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="social-icons pull-left">
							<ul class="nav navbar-nav">
								<li><div class="mainselection">
									<select name="city" Onchange="ChangeCity(this.value)">
									<?php
									$results = $mysqli->query("SELECT * from cities ORDER BY city ASC");
									if ($_SESSION["city"] == "%"){
										echo '<option value="%" selected>Reino Unido</option>';
									}else{
										echo '<option value="%">Reino Unido</option>';
									}
								
									while($row = $results->fetch_assoc()) {
									if ($_SESSION["city"] == $row["city"]){
										echo '<option value="'.$row["city"].'" selected>'.$row["city"].'</option>';
									}else{
										echo '<option value="'.$row["city"].'">'.$row["city"].'</option>';
									}	
										
									}
									  
									  ?>
									</select>
									</div>
								</li>

							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li>
								
								</li>

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
						<div class="item-title">Paginas Granates</div>
						<div class="col-sm-6">
							<div class="item-subtitle">Directorio de Servicios</div>
						</div>
						<!--The search tool-->
						<div class="col-sm-6" align="right">

						</div>
						<!--End of search tool -->
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						
						
					</div>
					
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	