<?php
  require "db.php";
  include_once 'functions.php';

  $user = null;
  if (isset($_COOKIE['user_token']))
  {
    $user = R::findOne('users', 'user_token = ?', array($_COOKIE['user_token']));

    if($user != null)
    $_SESSION['logged_user'] = $user;
  }

  if(!isset($_SESSION['logged_user']))
    header('location: index.php');

  $current_user_data = $_SESSION['logged_user'];
  $current_id = $current_user_data['id'];

  $data = $_POST;
  $error = "";

  if(isset($data['do-save']))
  {
    $user = R::findOne('users', 'login = ?', array($data['login']));

    $newLogin = $data['login'];
    $newName = $data['name'];
    $newEmail = $data['email'];
    $newPass = $data['password'];
    
    if($data['login'] == $current_user_data['login'])
    {
      R::exec("UPDATE `users`
      SET name = '$newName',
      login = '$newLogin',
      email = '$newEmail'
      WHERE id = '$current_id'");
      
      if($newPass != null)
      {
        R::exec("UPDATE `users`
        SET password = '$newPass'
        WHERE id = '$current_id'");
      }
    }
    else
    {
      if($user == null)
      {
        R::exec("UPDATE `users`
        SET name = '$newName',
        login = '$newLogin',
        email = '$newEmail',
        WHERE id = '$current_id'");

        if($newPAss != null)
        {
          R::exec("UPDATE `users`
          SET password = '$newPass'
          WHERE id = '$current_id'");
        }
      }
      else
        $error = "Wrong login";
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

  <title>User Page</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/fontawesome-free-5.9.0-web/css/all.css" rel="stylesheet"> <!--load all styles -->

  <link href="css/main.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC&display=swap" rel="stylesheet">
</head>

<body class="my_trans_grad">
  <!-- Navigation -->    
  <?php include_once 'navigation.php'; ?>


  <div class="container">
    <div class="row mt-5">
      <div class="col-12 col-md-4">
        <div class="card">
          <img src="img/user.jpg" alt="user default image" class="rounded mx-auto my-4" style="width:300px;height:300px;">
        </div>
      </div>
      <div class="col-12 col-md-8">
        <div class="card ">
          <div class="card-header my_trans_invert_grad">
            <i class="fas fa-user-edit mr-2"></i>  
            Edit your personal information
          </div>
          <div class="card-body">
            <p class="card-text small">User ID: <?=$current_user_data['id']?></p>
            <form action="account.php" method="POST">
            <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" name="name" class="form-control my_form_color" id="inputName" placeholder="Enter your name" value="<?=$current_user_data['name']?>">
              </div>
              <div class="form-group">
                <label for="inputLogin">Login</label>
                <input type="text" name="login" class="form-control my_form_color" id="inputLogin" placeholder="Enter login" value="<?=$current_user_data['login']?>">
              </div>
              <div class="form-group">
                <label for="inputEmail">Email address</label>
                <input type="email" name="email" class="form-control my_form_color" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email" value="<?=$current_user_data['email']?>">
              </div>
              <div>
                <label for="inputPassword">New password</label>
                <input type="password" name="password" class="form-control my_form_color" id="inputPassword" placeholder="Enter new password">
              </div>
              <p class=""><?=$error?></p>
              <button type="submit" class="btn btn-primary mt-4 float-right" name="do-save">Save changes <i class="ml-2 fas fa-save"></i></button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card mt-4">
          <div class="card-header my_trans_invert_grad">
          <i class="fas fa-book-open mr-2"></i>
            Your tests
          </div>
          <div class="card-body">
            <?php
              $user_tests = get_test_data_by_author_id($current_id);
              if($user_tests == null):?>
                <div class="card-body">
                  <h5 class="card-title mb-0 text-center text-danger"><i class="fas fa-exclamation-circle mr-3"></i>No tests found</h5>
                </div>
              <?php else: 
              foreach($user_tests as $test): ?>
                <div class="card text-left mb-3">
                  <div class="card-body">
                    <h5 class="card-title"><?=$test['name']?></h5>
                    <div class="row">
                      <div class="col">
                        <p class="card-text mb-4"><?=$test['description']?></p>
                        <p class="card-text text-muted small"><span class="my_label mr-3"><i class="fas fa-user mr-2"></i><?=$test['login']?></span><i class="far fa-calendar mr-2"></i><?=$test['date']?></p>
                      </div>
                      <div class="col align-self-end">
                        <a href="test.php?test=<?=$test['id']?>" class="btn btn-primary float-right">Start Test<i class="fas fa-angle-right text-white ml-2"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
              <?php endif; ?>
              <div class="card mt-3 rgba-indigo-strong">
                <button class="btn card-body my_trans_invert_grad text-center rgba-indigo-strong" href="#">
                  <i class="fas fa-plus text-primary h3"></i>
                </button>
              </div>        
          </div>
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