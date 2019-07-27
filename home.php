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
				<?php $subjects = get_subjects();
				foreach ($subjects as $subject) : ?>
					<li class="nav-item">
						<a class="nav-item nav-link <?php if ($subject['id'] == 1) {
														echo "active";
													} ?>" id="nav-<?= $subject['id'] ?>-tab" data-toggle="tab" href="#nav-<?= $subject['id'] ?>" role="tab" aria-controls="nav-<?= $subject['id'] ?>" aria-selected="true"><i class="<?php if ($subject['subject'] == "Maths") {
																																																												echo "fas fa-square-root-alt";
																																																											} else if ($subject['subject'] == "Physics") {
																																																												echo "fas fa-atom";
																																																											} else if ($subject['subject'] == "Chemistry") {
																																																												echo "fas fa-flask";
																																																											} else if ($subject['subject'] == "English") {
																																																												echo "fab fa-amilia";
																																																											} else {
																																																												echo "fas fa-file";
																																																											} ?> mr-2"></i><?= $subject['subject'] ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="card-body">
			<div class="tab-content" id="nav-tabContent">
				<?php $subjects = get_subjects();
				foreach ($subjects as $subject) : ?>
					<div class="tab-pane fade <?php if ($subject['id'] == 1) {
													echo "show active";
												} ?>" id="nav-<?= $subject['id'] ?>" role="tabpanel" aria-labelledby="nav-<?= $subject['id'] ?>-tab">
						<?php
						$subject_tests = get_tests_by_type($subject['subject']);
						if ($subject_tests) : ?>
							<?php foreach ($subject_tests as $test) : ?>
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
						<?php else : ?>
							<div class="card">
								<div class="card-body">
									<h5 class="card-title mb-0 text-center text-danger"><i class="fas fa-exclamation-circle mr-3"></i>No <?= $subject['subject'] ?> tests found</h5>
								</div>
							</div>
						<?php endif; ?>
						<div class="card mt-3 rgba-indigo-strong">
							<a href="create-test.php?subject=<?= $subject['id'] ?>" class="btn card-body my_trans_invert_grad text-center" role="button">
								<i class="fas fa-plus text-primary h3"></i>
							</a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
</div>
</div>