<?php
session_start();
	if (isset($_SESSION['id_user']) && isset($_SESSION['username']) && isset($_SESSION['email'])){
		$id_user = $_SESSION['id_user'];
		$username = $_SESSION['username'];
		$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Drive of <?php echo $username; ?> </title>
	<link rel="stylesheet" type="text/css" href="med/style_home.css">
	<link rel="icon" type="image/png" href="med/coffee.png">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu|Pacifico|Varela+Round" rel="stylesheet">
</head>
<body>
	<header>
		<span><h2>Coldffee Drive</h2></span>
		<span><img src="med/user_icon.png"></span>
	</header>
	<div id="main">
		<h1>Archivos y ficheros</h1>
	</div>
</body>
</html>
<?php	
}else{	
	header("location: index.php");
}
?>