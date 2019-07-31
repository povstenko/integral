<?php
require "db.php";
include_once 'functions.php';

$user = null;
if (isset($_COOKIE['user_token'])) {
	$user = R::findOne('users', 'user_token = ?', array($_COOKIE['user_token']));

	if ($user != null)
		$_SESSION['logged_user'] = $user;
} else {
	header('location: login.php');
}

// Get default subject
$defaultSubject = null;
if (isset($_GET['subject'])) {
	$defaultSubject = $_GET['subject'];
}

// Create Test
if (isset($_POST['do_create_test'])) {
	create_new_test($_POST['name'], $_POST['description'], $_POST['subject'], $user['id']);
	echo "<script>alert('Test " . $_POST['name'] . " was succesfully created!');</script>";
}

// Create Question
if (isset($_POST['do_create_question'])) {
	create_new_question($_POST['parent_test'], $_POST['question'], $_POST['additional'], "");
}

// Create Answer
if (isset($_POST['do_create_answer'])) { 
	create_new_answer();// TODO
	echo "<script>alert('Question " . $_POST[''] . " was succesfully created!');</script>";

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
	<div class="container">
		<!-- Create Test -->
		<div class="card mt-5">
			<div class="card-header my_trans_invert_grad">
				<i class="fas fa-edit mr-2"></i>Create Test
			</div>
			<div class="card-body pb-0">
				<form action="create-test.php" method="POST">
					<div class="row">
						<div class="col-4">
							<div class="form-group row">
								<label for="inputName" class="col-3 text-right">Name</label>
								<div class="col">
									<input type="text" name="name" class="form-control my_form_color" id="inputName" placeholder="Enter Test Name" value="">
								</div>
							</div>
							<div class="form-group row">
								<label for="selectSubjectBox" class="col-3 text-right">Subject</label>
								<div class="col">
									<select name="subject" class="form-control my_form_color" id="selectSubjectBox">
										<?php $subjects = get_subjects();
										foreach ($subjects as $subject) : ?>
											<option><?= $subject['subject'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<textarea name="description" id="inputDescription" class="form-control my_form_color" rows="3" placeholder="Enter Test Description"></textarea>
							</div>
						</div>
						<div class="col-auto">
							<button type="submit" class="btn btn-primary mt-4 float-right" name="do_create_test">Create Test <i class="ml-2 fas fa-plus"></i></button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<!-- Create Question -->
		<div class="card mt-5">
			<div class="card-header my_trans_invert_grad">
				<i class="fas fa-edit mr-2"></i>Create Question
			</div>
			<div class="card-body pb-0">
				<form action="create-test.php" method="POST">
					<div class="row">
						<div class="col-4">
							<div class="form-group row">
								<label for="selectParentTestBox" class="col-auto text-right">Parent Test</label>
								<div class="col">
									<select name="parent_test" class="form-control my_form_color" id="selectParentTestBox">
										<?php $tests = get_test_data_by_author_id($user['id']);
										foreach ($tests as $test) : ?>
											<option><?= $test['name'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group row">
								<label for="inputQuestion" class="col-auto text-right">Question</label>
								<div class="col">
									<input type="text" name="question" class="form-control my_form_color" id="inpuQuestion" placeholder="Enter Main Question">
								</div>
							</div>
							<div class="form-group">
								<textarea name="additional" id="inputAdditional" class="form-control my_form_color" rows="3" placeholder="Enter Aditional Question"></textarea>
							</div>
						</div>
						<div class="col-2">
							<button type="submit" class="btn btn-primary mt-4 float-right" name="do_create_question">Create Question<i class="ml-2 fas fa-plus"></i></button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<!-- Create Answer -->
		<div class="card mt-5">
			<div class="card-header my_trans_invert_grad">
				<i class="fas fa-edit mr-2"></i>Create Answer
			</div>
			<div class="card-body">
				<form action="create-test.php" method="POST">
					<div class="row">
						<div class="col">
							<div class="form-group row">
								<label for="selectParentTestBox" class="col-auto text-right">Parent Test</label>
								<div class="col">
									<select name="parent_test" class="form-control my_form_color" id="selectParentTestBox">
										<?php $tests = get_test_data_by_author_id($user['id']);
										foreach ($tests as $test) : ?>
											<option><?= $test['name'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="form-group row">
								<label for="selectSubjectBox" class="col-auto text-right">Parent Question</label>
								<div class="col">
									<select name="subject" class="form-control my_form_color" id="selectSubjectBox">
										<?php $subjects = get_subjects();
										foreach ($subjects as $subject) : ?>
											<option><?= $subject['subject'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-2">

						</div>
					</div>
					<div class="row">
						<div class="col-auto pr-0">
							<div class="custom-control custom-radio mb-4 text-right">
								<input type="radio" class="custom-control-input" id="var-true-1" name="vars-true" checked>
								<label class="custom-control-label" for="var-true-1" invisible></label>
							</div>
							<div class="custom-control custom-radio mb-4 text-right">
								<input type="radio" class="custom-control-input" id="var-true-2" name="vars-true">
								<label class="custom-control-label" for="var-true-2" invisible></label>
							</div>
							<div class="custom-control custom-radio text-right">
								<input type="radio" class="custom-control-input" id="var-true-3" name="vars-true">
								<label class="custom-control-label" for="var-true-3" invisible></label>
							</div>
						</div>
						<div class="col">
							<input type="text" name="var-1" class="form-control my_form_color mb-1" id="inputVar1" placeholder="Enter Variant 1">
							<input type="text" name="var-2" class="form-control my_form_color mb-1" id="inputVar2" placeholder="Enter Variant 2">
							<input type="text" name="var-3" class="form-control my_form_color mb-1" id="inputVar3" placeholder="Enter Variant 3">
						</div>
						<div class="col-2">
							<button type="submit" class="btn btn-primary mt-4 float-right" name="do_create_test">Create Answer<i class="ml-2 fas fa-plus"></i></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<?php include_once 'footer.html'; ?>

	<script type="text/javascript">
		let item = "<?= $defaultSubject; ?>";
		if (item != null && parseInt(item)) {
			document.getElementById('selectSubjectBox').selectedIndex = item - 1;
		}
	</script>
	<!-- Bootstrap core JavaScript -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>