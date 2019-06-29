<?php
  require "db.php";
  include_once 'functions.php';

  if(isset($_GET['test']))
  {
    $test_id = (int)$_GET['test'];
    $test_data = get_test_data_by_id($test_id);
    $test_questions = get_questions_by_id($test_id);
    $test_answers = get_answers_by_id($test_id);

    shuffle($test_questions);
  }
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
  <link href="vendor/fontawesome-free-5.9.0-web/css/all.css" rel="stylesheet"> <!--load all styles -->
  
  <link href="css/main.css" rel="stylesheet">
  <link href="css/test.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC&display=swap" rel="stylesheet">

</head>

<body class="my_trans_grad">
  
  <!-- Navigation -->
  <?php include 'navigation.php'; ?>

  <!-- Header -->
  <header class="my_grad bg-primary pt-5 pb-1 mb-5 border-bottom box-shadow">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12 col-md-10 mb-3">
          <h1 class="display-6 text-white mb-2" style="font-family: 'Alegreya Sans SC', sans-serif;"><?=$test_data['name']?></h1>
          <p class="lead text-white-50"><?=$test_data['description']?></p>
        </div>
        <div class="col-6 col-md-2">
          <p class="lead text-white small"><i class="far fa-user mr-2"></i><?=$test_data['login']?></p>
          <p class="lead text-white small"><i class="far fa-calendar mr-2"></i><?=$test_data['date']?></p>
          <p class="lead text-white small"><i class="fa fa-graduation-cap mr-2"></i><?=$test_data['type']?></p>
        </div>
      </div>
      <ul class="nav nav-pills mt-2 mb-2" id="pills-tab" role="tablist">
        <?php for($i = 1; $i <= count($test_questions); $i++): ?>
          <li class="nav-item">
            <a class="nav-link question-list <?php if($i==1) echo 'active';?>" id="pills-<?=$i?>-tab" data-toggle="pill" href="#pills-<?=$i?>" role="tab" aria-controls="pills-<?=$i?>" aria-selected="<?php if($i==1)echo 'true';else echo 'false';?>"><?=$i?></a>
          </li>
        <?php endfor; ?>
          <li class="nav-item">
            <a class="nav-link question-list result-page" id="res-tab" data-toggle="pill" href="#res" role="tab" aria-controls="res" aria-selected="false"><i class="fas fa-poll"></i></a>
          </li>
      </ul>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">
    <div class="tab-content" id="pills-tabContent">   
      <?php $i = 1; foreach($test_questions as $question): ?>
        <div class="tab-pane fade <?php if($i==1)echo 'show active';?>" id="pills-<?=$i?>" role="tabpanel" aria-labelledby="pills-<?=$i?>-tab">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title"><?=$i?>/<?=count($test_questions)?></h5>
              <h5 class="card-title"><?=$question['question']?></h5>
              <p class="card-text"><?=$question['additional']?></p>
              <?php foreach($test_answers as $answer): ?>
                <?php if($answer['parent_question'] == $i):?>
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="var<?=$answer['id']?>" name="variants<?=$answer['id']?>">
                    <label class="custom-control-label" for="var<?=$answer['id']?>"><?=$answer['answer']?></label>
                  </div>
                <?php endif;?>
              <?php endforeach;?>
              <?php if($i == count($test_questions)): ?>
                <a href="#res" data-toggle="pill" class="btn btn-primary float-right btn-end">End test<i class="fas fa-angle-right text-white ml-2"></i></a>
              <?php else: ?>
                <a href="#pills-<?=$i+1?>" data-toggle="pill" class="btn btn-primary float-right btn-next">Next<i class="fas fa-angle-right text-white ml-2"></i></a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php $i++; endforeach; ?>
      <?php ?>
        <div class="tab-pane fade" id="res" role="tabpanel" aria-labelledby="res-tab">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title"><?=$i?>/<?=count($test_questions)?></h5>
              <h5 class="card-title"><?=$question['question']?></h5>
              <p class="card-text"><?=$question['additional']?></p>
              
              <?php if($i == count($test_questions)): ?>
                <a href="#res" data-toggle="pill" class="btn btn-primary float-right btn-end">End test<i class="fas fa-angle-right text-white ml-2"></i></a>
              <?php else: ?>
                <a href="#pills-<?=$i+1?>" data-toggle="pill" class="btn btn-primary float-right btn-next">Next<i class="fas fa-angle-right text-white ml-2"></i></a>
              <?php endif; ?>
            </div>
          </div>
        </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include 'footer.html'; ?>
    
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
</body>
</html>