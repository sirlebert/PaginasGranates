<html>
<head>
</head>
<body>
<?php
$user=$_GET['user'];
$back=$_GET['back'];
$mysqli = new mysqli("localhost", "espanoles", "coco_1drilo", "espenedin2");
if ($mysqli->connect_errno) {
	echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
};
$mysqli->set_charset("utf8");
$results = $mysqli->query("DELETE FROM list WHERE user like '".$user."'");
$results2 = $mysqli->query("DELETE FROM list_temp WHERE user like '".$user."'");
$results3 = $mysqli->query("DELETE FROM users WHERE email like '".$user."'");
echo "<meta http-equiv=\"refresh\" content=\"0;url=".$back.".php\"/>";
?>
</body>
</html>