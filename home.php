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

                <?php
                $maths_tests = get_tests_by_type('maths');
                if($maths_tests): ?>
                    <?php foreach($maths_tests as $test): ?>
                        <div class="card text-left mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><?=$test['name'];?></h5>
                                <div class="row">
                                    <div class="col">
                                        <p class="card-text"><?=$test['description'];?></p>
                                    </div>
                                    <div class="col">
                                        <a href="test.php?test=<?=$test['id'];?>" class="btn btn-primary float-right">Start Test</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                <?php else: ?>
                <div class="card text-left mb-3">
                    <div class="card-body">
                      <h5 class="card-title">No Maths tests found</h5>
                    </div>
                </div>
                <?php endif; ?>
              </div>
              <div class="tab-pane fade" id="nav-physics" role="tabpanel" aria-labelledby="nav-physics-tab">
                    <?php
                    $physics_tests = get_tests_by_type('physics');
                    if($physics_tests): ?>
                        <?php foreach($physics_tests as $test): ?>
                            <div class="card text-left mb-3">
                                <div class="card-body">
                                    <h5 class="card-title"><?=$test['name'];?></h5>
                                    <div class="row">
                                        <div class="col">
                                            <p class="card-text"><?=$test['description'];?></p>
                                        </div>
                                        <div class="col">
                                            <a href="test.php?test=<?=$test['id'];?>" class="btn btn-primary float-right">Start Test</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    <?php else: ?>
                    <div class="card text-left mb-3">
                        <div class="card-body">
                        <h5 class="card-title">No Physics tests found</h5>
                        </div>
                    </div>
                    <?php endif; ?>
              </div>
              <div class="tab-pane fade" id="nav-chemistry" role="tabpanel" aria-labelledby="nav-chemistry-tab">
                <?php
                    $chemistry_tests = get_tests_by_type('chemistry');
                    if($chemistry_tests): ?>
                        <?php foreach($chemistry_tests as $test): ?>
                            <div class="card text-left mb-3">
                                <div class="card-body">
                                    <h5 class="card-title"><?=$test['name'];?></h5>
                                    <div class="row">
                                        <div class="col">
                                            <p class="card-text"><?=$test['description'];?></p>
                                        </div>
                                        <div class="col">
                                            <a href="test.php?test=<?=$test['id'];?>" class="btn btn-primary float-right">Start Test</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    <?php else: ?>
                    <div class="card text-left mb-3">
                        <div class="card-body">
                        <h5 class="card-title">No Chemistry tests found</h5>
                        </div>
                    </div>
                    <?php endif; ?> 
              </div>
              <div class="tab-pane fade" id="nav-english" role="tabpanel" aria-labelledby="nav-english-tab">
                    <?php
                    $english_tests = get_tests_by_type('english');
                    if($english_tests): ?>
                        <?php foreach($english_tests as $test): ?>
                            <div class="card text-left mb-3">
                                <div class="card-body">
                                    <h5 class="card-title"><?=$test['name'];?></h5>
                                    <div class="row">
                                        <div class="col">
                                            <p class="card-text"><?=$test['description'];?></p>
                                        </div>
                                        <div class="col">
                                            <a href="test.php?test=<?=$test['id'];?>" class="btn btn-primary float-right">Start Test</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    <?php else: ?>
                    <div class="card text-left mb-3">
                        <div class="card-body">
                        <h5 class="card-title">No English tests found</h5>
                        </div>
                    </div>
                    <?php endif; ?> 
              </div>
            </div>     
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container -->