<?php
	session_start();
	$id_user = $_SESSION['id_user'];
	$username = $_SESSION['username'];
	$email = $_SESSION['email'];
	if ($email != "" && $username != "") {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Account <?php echo $username; ?> </title>
	<link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu|Pacifico|Varela+Round" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="med/style_account.css">
</head>
<body>
	Aqui podras editar datos de tu usuario
</body>
</html>
<?php
	}else{
		header("location: index.php");
	}
?>