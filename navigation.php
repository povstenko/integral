<nav class="my_grad navbar navbar-expand-lg navbar-dark fixed-top box-shadow">
    <div class="container">
      
      <a class="navbar-brand" href="index.php" style="font-family: 'Alegreya Sans SC', sans-serif;">INTEGRAL</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">NEW TEST</a>
          </li>
            
          <?php if(isset($_SESSION['logged_user'])) : ?>
            <li class="nav-item">
              <a class="nav-link" href="account.php">ACCOUNT (<?=$_SESSION['logged_user']->login;?>)</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-light" href="logout.php">LOG OUT</a>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a class="btn btn-outline-light" href="login.php">LOG IN</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>