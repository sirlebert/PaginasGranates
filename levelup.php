<html>
<head>
</head>
<body>
<?php
$user=$_GET['user'];
$email=$_GET['email'];
$mysqli = new mysqli("localhost", "espanoles", "coco_1drilo", "espenedin2");
if ($mysqli->connect_errno) {
	echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
};
$mysqli->set_charset("utf8");
$results1 = $mysqli->query("update users set level='2' where email ='".$email."'");

echo "<meta http-equiv=\"refresh\" content=\"0;url=adminusers.php?user=".$user."\"/>";
?>
</body>
</html>