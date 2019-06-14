<?php
  require "db.php";

  $data = $_POST;

  if( isset($data['do_login']))
  {
    $user = R::findOne('users', 'login = ?', array($data['login']));

    if($user)
    {
      if(password_verify($data['password'], $user->password))
      {
        // login
        $_SESSION['logged_user'] = $user;
        header('location: home.php');
      }
      else
      {
        echo'<script>alert("Wrong password")</script> ';
      }
    }
    else
    {
      echo'<script>alert("Wrong login")</script> ';
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

  <body class="text-center my_trans_grad">
    <form class="form-login" action="login.php" method="POST">
      <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please log in</h1>

      <label for="inputLogin" class="sr-only">Login</label>
      <input type="text" id="inputLogin" name="login" class="form-control" placeholder="Username" required autofocus>

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="do_login">Log in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
    </form>
  </body>
</html>
