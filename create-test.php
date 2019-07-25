<?php
require "db.php";
include_once 'functions.php';

$user = null;
if (isset($_COOKIE['user_token'])) {
	$user = R::findOne('users', 'user_token = ?', array($_COOKIE['user_token']));

	if ($user != null)
		$_SESSION['logged_user'] = $user;
}
else{
	header('location: login.php');
}

if (isset($_POST['do_create_test'])) {
	create_new_test($_POST['name'], $_POST['description'], $_POST['subject'], $user['id']);
	echo "<script>alert('Test ".$_POST['name']." was created!');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Integral - Create New Test</title>

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
	<div class="container">
		<div class="card mt-5">
			<div class="card-header my_trans_invert_grad">
				<i class="fas fa-edit mr-2"></i>Create new test
			</div>
			<div class="card-body">
				<form action="create-test.php" method="POST">
					<div class="form-group">
						<label for="inputName">Name</label>
						<input type="text" name="name" class="form-control my_form_color" id="inputName" placeholder="Enter Test Name" value="">
					</div>
					<div class="form-group">
						<label for="inputDescription">Description</label>
						<input type="text" name="description" class="form-control my_form_color" id="inputDescription" placeholder="Enter Test Description" value="">
						<p class="text-danger"></p>
					</div>
					<div class="form-group">
						<label for="inputSubject">Subject</label>
						<select name="subject" class="form-control my_form_color" id="inputSubject">
							<?php $subjects = get_subjects();
							foreach ($subjects as $subject) : ?>
								<option><?= $subject['subject'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<button type="submit" class="btn btn-primary mt-4 float-right" name="do_create_test">Create Test <i class="ml-2 fas fa-edit"></i></button>
				</form>

			</div>
		</div>
	</div>

	<!-- Footer -->
	<?php include_once 'footer.html'; ?>

	<!-- Bootstrap core JavaScript -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>