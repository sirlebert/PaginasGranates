<html>
<head>
</head>
<body>
<?php
$serviceId=$_GET['id'];
$mysqli = new mysqli("localhost", "espanoles", "coco_1drilo", "espenedin2");
if ($mysqli->connect_errno) {
	echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
};
$mysqli->set_charset("utf8");
$results = $mysqli->query("DELETE FROM list_temp WHERE id like '".$serviceId."'");

echo "<meta http-equiv=\"refresh\" content=\"1;url=user.php\"/>";
?>
</body>
</html>