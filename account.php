<?php
require "db.php";
include_once 'functions.php';

$user = null;
if (isset($_COOKIE['user_token'])) {
	$user = R::findOne('users', 'user_token = ?', array($_COOKIE['user_token']));

	if ($user != null)
		$_SESSION['logged_user'] = $user;
}

if (!isset($_SESSION['logged_user']))
	header('location: index.php');

$current_user_data = $_SESSION['logged_user'];
$current_id = $current_user_data['id'];

$data = $_POST;
$error = "";
$old_password_error = "";
$new_password_error = "";
$repeat_password_error = "";
$avatar_error = "";
$avatar_success = "";

// EDIT USER INFO
if (isset($data['do-save'])) {
	$user = R::findOne('users', 'login = ?', array($data['login']));

	$newLogin = $data['login'];
	$newName = $data['name'];
	$newEmail = $data['email'];

	if ($newLogin == $current_user_data['login']) // login not changed
	{
		R::exec("UPDATE `users`
				SET name = '$newName',
				email = '$newEmail'
				WHERE id = '$current_id'");

		header("Refresh:0");
	} else // login changed
	{
		R::exec("UPDATE `users`
				SET name = '$newName',
				email = '$newEmail'
				WHERE id = '$current_id'");

		if ($user == null) // entered login doesnt exists in db
		{
			if ($newLogin != null) // entered login is null
			{
				R::exec("UPDATE `users`
          		SET login = '$newLogin'
          		WHERE id = '$current_id'");

				header("Refresh:0");
			} else
				$error = "Empty login. Please enter your new login.";
		} else
			$error = "This login already used.";
	}
}

// CHANGE PASSWORD
if (isset($data['do-change-password'])) {
	$user = R::findOne('users', 'id = ?', array($current_id));
	$newPass = $data['password'];
	$repPass = $data['password2'];

	if (password_verify($data['old-password'], $user->password)) // old-password == current-password
	{
		if ($newPass != null) // new-password not null
		{
			if ($newPass == $repPass) // if repeat-password = new-password
			{
				$pass = password_hash($newPass, PASSWORD_DEFAULT);
				R::exec("UPDATE `users`
						SET password = '$pass'
						WHERE id = '$current_id'");

				header('location: login.php');
			} else {
				$repeat_password_error = "Your password doesn't match.";
			}
		} else {
			$new_password_error = "Empty password. Please enter your new password.";
		}
	} else {
		$old_password_error = "Wrong password!";
	}
}

// UPLOAD AVATAR
if (isset($_POST['do-upload-avatar'])) {
	$uploadDir = 'uploads/avatars/';
	$uploadName = basename($_FILES['userfile']['name']);
	$uploadFile = $uploadDir . $uploadName;
	$info = pathinfo($uploadFile);

	if ($info["extension"] == "jpg" || $info["extension"] == "png" || $info["extension"] == "gif") {
		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadFile)) {
			$oldAvatar = $current_user_data['avatar'];
			unlink("uploads/avatars/" . $oldAvatar);

			R::exec("UPDATE `users`
					SET avatar = '$uploadName'
					WHERE id = '$current_id'");

			header("Refresh:0");
		} else {
			$avatar_error = "Возможная атака с помощью файловой загрузки!";
		}
	} else {
		$avatar_error = "Wrong file!";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Integral - User Page</title>

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

	<div class="container">
		<!-- Edit personal info -->
		<div class="card mt-5">
			<div class="card-header my_trans_invert_grad">
				<i class="fas fa-user-edit mr-2"></i> Edit your personal information
			</div>
			<div class="card-body">
				<div class="row ">
					<div class="col-12 col-md-4">
						<img src="<?php if ($current_user_data['avatar'] == null) {
										echo "img/user.jpg";
									} else {
										echo "uploads/avatars/" . $current_user_data['avatar'];
									} ?>" alt="avatar" width="300" height="300" class="rounded mx-auto centered-and-cropped">
						<!-- Upload avatar -->
						<form enctype="multipart/form-data" action="account.php" method="POST">
							<div class="form-group mt-2 mb-2">
								<input type="hidden" name="MAX_FILE_SIZE" value="3000000">
								<input name="userfile" type="file">
								<p class="text-danger"><?= $avatar_error ?></p>
							</div>
							<button type="submit" class="btn btn-primary text-center" name="do-upload-avatar">Change avatar<i class="ml-2 fas fa-upload"></i></button>
						</form>
					</div>
					<div class="col-12 col-md-8">
						<p class="card-text small text-info">User ID: <?= $current_user_data['id'] ?></p>
						<form action="account.php" method="POST">
							<div class="form-group">
								<label for="inputName">Name</label>
								<input type="text" name="name" class="form-control my_form_color" id="inputName" placeholder="Enter your name" value="<?= $current_user_data['name'] ?>">
							</div>
							<div class="form-group">
								<label for="inputLogin">Login</label>
								<input type="text" name="login" class="form-control my_form_color" id="inputLogin" placeholder="Enter login" value="<?= $current_user_data['login'] ?>">
								<p class="text-danger"><?= $error ?></p>
							</div>
							<div class="form-group">
								<label for="inputEmail">Email address</label>
								<input type="email" name="email" class="form-control my_form_color" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email" value="<?= $current_user_data['email'] ?>">
							</div>
							<button type="submit" class="btn btn-primary mt-4 float-right" name="do-save">Save changes <i class="ml-2 fas fa-save"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Change password -->
		<div class="card mt-4">
			<div class="card-header my_trans_invert_grad">
				<i class="fa fa-key mr-2"></i> Change your password
			</div>
			<div class="card-body pb-0">
				<form action="account.php" method="POST">
					<div class="row ">
						<div class="col-12 col-md-8">
							<div class="form-group">
								<input type="password" name="old-password" class="form-control my_form_color" id="inputOld" placeholder="Enter old password">
								<p class="text-danger"><?= $old_password_error ?></p>
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control my_form_color" id="inputPassword" placeholder="Enter new password">
								<p class="text-danger"><?= $new_password_error ?></p>
							</div>
							<div class="form-group mb-0">
								<input type="password" name="password2" class="form-control my_form_color" id="inputPassword2" placeholder="Repeat new password">
								<p class="text-danger"><?= $repeat_password_error ?></p>
							</div>
						</div>
						<div class="col align-self-end">
							<button type="submit" class="btn btn-primary mt-4 mb-3 float-right" name="do-change-password">Change password <i class="ml-2 fas fa-save"></i></button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- Tests -->
		<div class="card mt-4">
			<div class="card-header my_trans_invert_grad">
				<i class="fas fa-book-open mr-2"></i> Your tests
			</div>
			<div class="card-body">
				<?php
				$user_tests = get_test_data_by_author_id($current_id);
				if ($user_tests == null) : ?>
					<div class="card-body">
						<h5 class="card-title mb-0 text-center text-danger"><i class="fas fa-exclamation-circle mr-3"></i>No tests found</h5>
					</div>
				<?php else :
					foreach ($user_tests as $test) : ?>
						<div class="card text-left mb-3">
							<div class="card-body">
								<h5 class="card-title"><?= $test['name'] ?></h5>
								<div class="row">
									<div class="col">
										<p class="card-text mb-4"><?= $test['description'] ?></p>
										<p class="card-text text-muted small"><span class="my_label mr-3"><i class="fas fa-user mr-2"></i><?= $test['login'] ?></span><i class="far fa-calendar mr-2"></i><?= $test['date'] ?></p>
									</div>
									<div class="col align-self-end">
										<a href="test.php?test=<?= $test['id'] ?>" class="btn btn-primary float-right">Start Test<i class="fas fa-angle-right text-white ml-2"></i></a>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
				<div class="card mt-3">
					<a href="create-test.php" class="btn card-body my_trans_invert_grad text-center" role="button">
						<i class="fas fa-plus text-primary h3"></i>
					</a>
				</div>
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