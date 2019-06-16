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

  <title>Integral - Testing Portal</title>

  

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="css/main.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC&display=swap" rel="stylesheet">
</head>

<body class="my_trans_grad">
  
  <!-- Navigation -->    
  <?php include 'navigation.php'; ?>

  <!-- Header -->
  <header class="my_grad bg-primary py-5 mb-5 border-bottom box-shadow">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-4 text-white mt-5 mb-2" style="font-family: 'Alegreya Sans SC', sans-serif;">INTEGRAL</h1>
          <p class="lead mb-5 text-white-50">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non possimus ab labore provident mollitia. Id assumenda voluptate earum corporis facere quibusdam quisquam iste ipsa cumque unde nisi, totam quas ipsam.</p>
        </div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">
      <div class="card text-center  mb-5">
          <div class="card-header my_trans_invert_grad">
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                <a class="nav-item nav-link active" id="nav-maths-tab" data-toggle="tab" href="#nav-maths" role="tab" aria-controls="nav-maths" aria-selected="true">Maths</a>
              </li>
              <li class="nav-item">
                <a class="nav-item nav-link" id="nav-physics-tab" data-toggle="tab" href="#nav-physics" role="tab" aria-controls="nav-physics" aria-selected="false">Physics</a>
              </li>
              <li class="nav-item">
                <a class="nav-item nav-link" id="nav-chemistry-tab" data-toggle="tab" href="#nav-chemistry" role="tab" aria-controls="nav-chemistry" aria-selected="false">Chemistry</a>
              </li>
              <li class="nav-item">
                <a class="nav-item nav-link" id="nav-english-tab" data-toggle="tab" href="#nav-english" role="tab" aria-controls="nav-english" aria-selected="false">English</a>                
              </li>
            </ul>
          </div>
          <div class="card-body">

            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-maths" role="tabpanel" aria-labelledby="nav-maths-tab">

                  <div class="card text-left mb-3">
                    <div class="card-body">
                      <h5 class="card-title">Maths Test 1</h5>
                      <div class="row">
                        <div class="col">
                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        </div>
                        <div class="col">
                          <a href="test.php" class="btn btn-primary float-right">Start Test</a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card text-left mb-3">
                    <div class="card-body">
                      <h5 class="card-title">Maths Test 2</h5>
                      <div class="row">
                            <div class="col">
                              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            </div>
                            <div class="col">
                              <a href="test.php" class="btn btn-primary float-right">Start Test</a>
                            </div>
                          </div>
                    </div>
                  </div>

                  <div class="card text-left mb-3">
                    <div class="card-body">
                       <h5 class="card-title">Maths Test 3</h5>
                       <div class="row">
                            <div class="col">
                              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            </div>
                            <div class="col">
                              <a href="test.php" class="btn btn-primary float-right">Start Test</a>
                            </div>
                        </div>
                    </div>
                  </div>

                  <div class="card text-left mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Maths Test 4</h5>
                        <div class="row">
                            <div class="col">
                              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            </div>
                            <div class="col">
                              <a href="test.php" class="btn btn-primary float-right">Start Test</a>
                            </div>
                        </div>
                    </div>
                  </div>

              </div>
              <div class="tab-pane fade" id="nav-physics" role="tabpanel" aria-labelledby="nav-physics-tab">
                  <div class="card text-left mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Physics Test 1</h5>
                        <div class="row">
                            <div class="col">
                              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            </div>
                            <div class="col">
                              <a href="test.php" class="btn btn-primary float-right">Start Test</a>
                            </div>
                        </div>
                    </div>
                  </div>

                  <div class="card text-left mb-3">
                    <div class="card-body">
                      <h5 class="card-title">Physics Test 2</h5>
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                      <a href="test.php" class="btn btn-primary float-right">Start Test</a>
                    </div>
                  </div>

              </div>
              <div class="tab-pane fade" id="nav-chemistry" role="tabpanel" aria-labelledby="nav-chemistry-tab">
                    <div class="card text-left mb-3">
                      <div class="card-body">
                        <h5 class="card-title">Chemistry Test 1</h5>
                        <div class="row">
                                <div class="col">
                                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                </div>
                                <div class="col">
                                  <a href="test.php" class="btn btn-primary float-right">Start Test</a>
                                </div>
                            </div>
                      </div>
                    </div>
  
                    <div class="card text-left mb-3">
                      <div class="card-body">
                        <h5 class="card-title">Chemistry Test 2</h5>
                        <div class="row">
                                <div class="col">
                                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                </div>
                                <div class="col">
                                  <a href="test.php" class="btn btn-primary float-right">Start Test</a>
                                </div>
                            </div>
                      </div>
                    </div>
  
                    <div class="card text-left mb-3">
                      <div class="card-body">
                        <h5 class="card-title">Chemistry Test 3</h5>
                        <div class="row">
                                <div class="col">
                                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                </div>
                                <div class="col">
                                  <a href="test.php" class="btn btn-primary float-right">Start Test</a>
                                </div>
                            </div>
                      </div>
                    </div>
              </div>
              <div class="tab-pane fade" id="nav-english" role="tabpanel" aria-labelledby="nav-english-tab">
                    <div class="card text-left mb-3">
                      <div class="card-body">
                        <h5 class="card-title">English Test 1</h5>
                        <div class="row">
                                <div class="col">
                                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                </div>
                                <div class="col">
                                  <a href="test.php" class="btn btn-primary float-right">Start Test</a>
                                </div>
                            </div>
                      </div>
                    </div>
              </div>
            </div>     
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include 'footer.php'; ?>
    
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>