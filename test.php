<?php
  require "db.php";
  include_once 'functions.php';

  if(isset($_GET['test']))
  {
    $test_id = (int)$_GET['test'];
    $test_data = get_test_data_by_id($test_id);
    $test_questions = get_questions_by_id($test_id);
    $test_answers = get_answers_by_id($test_id);
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
          <h1 class="display-6 text-white mb-2" style="font-family: 'Alegreya Sans SC', sans-serif;"><?=$test_data['name'];?></h1>
          <p class="lead mb-5 text-white-50"><?=$test_data['description'];?></p>
        </div>
      </div>
      <ul class="nav nav-pills" id="pills-tab" role="tablist">
        <?php foreach($test_questions as $question): ?>
          <li class="nav-item">
            <a class="nav-link question-list <?php if($question['id']==1)echo 'active';?>" id="pills-<?=$question['id']?>-tab" data-toggle="pill" href="#pills-<?=$question['id']?>" role="tab" aria-controls="pills-<?=$question['id']?>" aria-selected="<?php if($question['id']==1)echo 'true';else echo 'false';?>"><?=$question['id']?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">
    <div class="tab-content" id="pills-tabContent">   
      <?php foreach($test_questions as $question): ?>
        <div class="tab-pane fade <?php if($question['id']==1)echo 'show active';?>" id="pills-<?=$question['id']?>" role="tabpanel" aria-labelledby="pills-<?=$question['id']?>-tab">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title"><?=$question['id']?>/6</h5>
              <h5 class="card-title"><?=$question['question']?></h5>
              <p class="card-text"><?=$question['question']?></p>
                <?php foreach($test_answers as $answer): ?>
                  <?php if($answer['parent_question'] == $question['id']):?>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="var<?=$answer['id']?>" name="variants">
                      <label class="custom-control-label" for="var<?=$answer['id']?>"><?=$answer['answer']?></label>
                    </div>
                  <?php endif;?>
                <?php endforeach;
                ?>
              <a href="#pills-<?=++$question['id']?>" data-toggle="pill" class="btn btn-primary float-right btn-next">Next</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Footer -->
  <?php include 'footer.php'; ?>
    
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
</body>
</html>