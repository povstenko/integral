<?php
  require "db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Integral - Test</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="css/main.css" rel="stylesheet">
  <link href="css/test.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC&display=swap" rel="stylesheet">

</head>

<body class="my_trans_grad">
  
  <!-- Navigation -->    
  <?php include 'navigation.php'; ?>

  <!-- Header -->
  <header class="my_grad bg-primary pt-5 pb-3 mb-5 border-bottom box-shadow">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-6 text-white mb-2" style="font-family: 'Alegreya Sans SC', sans-serif;">Test Title</h1>
          <p class="lead mb-5 text-white-50">Test Description Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
      </div>
      <ul class="nav nav-pills" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-1-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1" aria-selected="true">1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false">2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-3-tab" data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-3" aria-selected="false">3</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-4-tab" data-toggle="pill" href="#pills-4" role="tab" aria-controls="pills-4" aria-selected="false">4</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-5-tab" data-toggle="pill" href="#pills-5" role="tab" aria-controls="pills-5" aria-selected="false">5</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-6-tab" data-toggle="pill" href="#pills-6" role="tab" aria-controls="pills-6" aria-selected="false">6</a>
        </li>
      </ul>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">
    <div class="tab-content" id="pills-tabContent">   

      <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">1/6</h5>
            <p class="card-text">Question Lorem ipsum dolor sit amet consectetur adipisicing elit?</p>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="var1" name="variants">
                <label class="custom-control-label" for="var1">Variant 1</label>
              </div>
              <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" id="var2" name="variants">
                <label class="custom-control-label" for="var2">Variant 2</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="var3" name="variants">
                <label class="custom-control-label" for="var3">Variant 3</label>
              </div>
            <a href="#" class="btn btn-primary float-right">Next</a>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">2/6</h5>
              <p class="card-text">Question Lorem ipsum dolor sit amet consectetur adipisicing elit?</p>
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input" id="var1" name="variants">
                  <label class="custom-control-label" for="var1">Variant 1</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input" id="var2" name="variants">
                  <label class="custom-control-label" for="var2">Variant 2</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input" id="var3" name="variants">
                  <label class="custom-control-label" for="var3">Variant 3</label>
                </div>
              <a href="#" class="btn btn-primary float-right">Next</a>
          </div>
        </div>
      </div>   

      <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">3/6</h5>
              <p class="card-text">Question Lorem ipsum dolor sit amet consectetur adipisicing elit?</p>
            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" id="var1" name="variants">
              <label class="custom-control-label" for="var1">Variant 1</label>
            </div>
            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" id="var2" name="variants">
              <label class="custom-control-label" for="var2">Variant 2</label>
            </div>
            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" id="var3" name="variants">
              <label class="custom-control-label" for="var3">Variant 3</label>
            </div>
              <a href="#" class="btn btn-primary float-right">Next</a>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">4/6</h5>
            <p class="card-text">Question Lorem ipsum dolor sit amet consectetur adipisicing elit?</p>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="var1" name="variants">
                <label class="custom-control-label" for="var1">Variant 1</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="var2" name="variants">
                <label class="custom-control-label" for="var2">Variant 2</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="var3" name="variants">
                <label class="custom-control-label" for="var3">Variant 3</label>
              </div>
            <a href="#" class="btn btn-primary float-right">Next</a>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="pills-5" role="tabpanel" aria-labelledby="pills-5-tab">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">5/6</h5>
            <p class="card-text">Question Lorem ipsum dolor sit amet consectetur adipisicing elit?</p>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="var1" name="variants">
                <label class="custom-control-label" for="var1">Variant 1</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="var2" name="variants">
                <label class="custom-control-label" for="var2">Variant 2</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="var3" name="variants">
                <label class="custom-control-label" for="var3">Variant 3</label>
              </div>
            <a href="#" class="btn btn-primary float-right">Next</a>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="pills-6" role="tabpanel" aria-labelledby="pills-6-tab">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">6/6</h5>
            <p class="card-text">Question Lorem ipsum dolor sit amet consectetur adipisicing elit?</p>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="var1" name="variants">
                <label class="custom-control-label" for="var1">Variant 1</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="var2" name="variants">
                <label class="custom-control-label" for="var2">Variant 2</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="var3" name="variants">
                <label class="custom-control-label" for="var3">Variant 3</label>
              </div>
            <a href="#" class="btn btn-primary float-right">Next</a>
          </div>
        </div>
      </div>     
    </div>
  </div>

  <!-- Footer -->
  <?php include 'footer.php'; ?>
    
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>