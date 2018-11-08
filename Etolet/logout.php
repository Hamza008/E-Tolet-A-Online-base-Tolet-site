<?php
session_start();
unset($_SESSION['username']);
$_SESSION['logged']=false;
//session_destroy();

header("Location: home.php");
exit;
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>