<?php
require "db.php";
include_once 'functions.php';

$user = null;
if (isset($_COOKIE['user_token'])) {
	$user = R::findOne('users', 'user_token = ?', array($_COOKIE['user_token']));

	if ($user != null)
		$_SESSION['logged_user'] = $user;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Integral - Testing Portal</title>

	<link rel="shortcut icon" href="favicon.png">

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="vendor/fontawesome-free-5.9.0-web/css/all.css" rel="stylesheet">
	<!--load all styles -->

	<link href="css/main.css" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC&display=swap" rel="stylesheet">
</head>

<body class="my_trans_grad">
	<!-- Navigation -->
	<?php include_once 'navigation.php'; ?>

	<!-- Page Content -->
	<?php include_once 'home.php'; ?>

	<!-- Footer -->
	<?php include_once 'footer.html'; ?>

	<!-- Bootstrap core JavaScript -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>