<?php
require "db.php";

$data = $_POST;
$error = "";

if (isset($data['do_signup'])) {
	if (R::count('users', "login = ? OR email = ?", array($data['login'], $data['email'])) > 0) {
		$error = "This email or login is used";
	} else {
		// registration
		$user = R::dispense('users');
		$user->login = $data['login'];
		$user->email = $data['email'];
		$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
		R::store($user);

		$_SESSION['logged_user'] = $user;
		header('location: index.php');
	}
}
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="">

	<title>Integral - Sign Up</title>

	<link rel="shortcut icon" href="favicon.png">

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/signup.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
</head>

<body class="text-center" style="background-image: linear-gradient(to left, rgba(48, 203, 206, 0.1), rgba(50, 17, 108, 0.1)">
	<form class="form-login" action="signup.php" method="POST">
		<p class="mt-5 mb-3 font-weight-bold text-danger"><?= $error ?></p>
		<a href="index.php">
			<img class="mb-4" src="img/logo.png" alt="" width="72" height="72">
		</a>
		<h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>

		<label for="inputLogin" class="sr-only">Login</label>
		<input type="text" id="inputLogin" name="login" class="form-control" placeholder="Login" required autofocus>

		<label for="inputEmail" class="sr-only">Email address</label>
		<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required>

		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>

		<button class="btn btn-lg btn-primary btn-block" type="submit" name="do_signup">Sign up</button>
		<p class="mt-5 mb-3">Already have an account? <a href="login.php">Log In</a></p>
		<p class="mt-5 mb-3 text-muted">&copy; 2019</p>
	</form>
</body>

</html>