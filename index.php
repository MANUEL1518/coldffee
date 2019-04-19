<?
session_start();
	$_SESSION["error_name"] = "";
	$_SESSION['error_email'] = "";
	$_SESSION['error_plen'] = "";
	$_SESSION['error_p'] = "";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Coldffee Drive - Login</title>
	<link rel="stylesheet" type="text/css" href="med/style.css">
	<link rel="icon" type="image/png" href="med/coffee.png">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu|Pacifico|Varela+Round" rel="stylesheet">
</head>
<body>
	<div id="cont" style="height: 100%;">
		<div id="title">
			<center><h1><img id="coffee" width="90px" src="med/coffee1.png"> Coldffee Drive <img id="coffee" width="90px" src="med/coffee1.png"></h1></center>
		</div>
		<section id="main">
			<h1>Login</h1>
			<form action="validar.php" method="post">
				<p>
					<label for="user">
						<p id="label_p">Email : </p>
						<input id="user" type="text" name="email" autofocus autocomplete="off" required title="Email">
					</label>
				</p>
				<p>
					<label for="pass" >
						<p id="label_p">Password : </p>
						<input id="pass" type="password" name="pass" required title="Password">
					</label>
				</p><br>
				<p>
					<input type="submit" value="Enter">
				</p><br>
				<p id="register">
					<center>or you can <a href="register.php">register</a></center>
				</p>
			</form>
		</section><br><br><br><br><br>
	</div>
</body>
</html>