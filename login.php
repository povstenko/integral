<?php
require "db.php";
include_once "functions.php";

$data = $_POST;
$error = "";

if (isset($data['do_login'])) {
	$user = R::findOne('users', 'login = ?', array($data['login']));

	if ($user) {
		if (password_verify($data['password'], $user->password)) {
			// login session
			$_SESSION['logged_user'] = $user;

			// login cookie
			if ($data['remember']) {
				if (isset($_COOKIE['user_token']))
					setcookie('user_token', '', 0, "/");

				$user_token = generate_random_string(80);
				$time = 31536000;
				setcookie('user_token', $user_token, time() + $time, "/");

				$login = $data['login'];

				R::exec("UPDATE `users` SET user_token = '$user_token' WHERE login = '$login'");
			}

			header('location: index.php');
		} else {
			$error = "Wrong password";
		}
	} else {
		$error = "Wrong login";
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

	<title>Integral - Log In</title>
	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/login.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
</head>

<body class="text-center" style="background-image: linear-gradient(to left, rgba(48, 203, 206, 0.1), rgba(50, 17, 108, 0.1)">

	<form class="form-login" action="login.php" method="POST">
		<p class="mt-5 mb-3 font-weight-bold text-danger"><?= $error ?></p>
		<a href="index.php">
			<img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
		</a>
		<h1 class="h3 mb-3 font-weight-normal">Please log in</h1>

		<label for="inputLogin" class="sr-only">Login</label>
		<input type="text" id="inputLogin" name="login" class="form-control" placeholder="Username" required autofocus>

		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>

		<div class="checkbox mb-3">
			<label>
				<input type="checkbox" value="remember-me" name="remember"> Remember me
			</label>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit" name="do_login">Log in</button>
		<p class="mt-5 mb-3">Don't have an account? <a href="signup.php">Sign Up</a></p>
		<p class="mt-5 mb-3 text-muted">&copy; 2019</p>
	</form>
</body>

</html>