<nav class="my_grad navbar navbar-expand-lg navbar-dark fixed-top box-shadow">
	<div class="container">
		<a class="navbar-brand" href="index.php" style="font-family: 'Alegreya Sans SC', sans-serif;"><img src="img/logo_white.png" class="mr-2" alt="Logo" width="32" height="32">INTEGRAL</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">

				<li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == "index.php") { echo "active"; } ?>">
					<a class="nav-link" href="index.php">HOME</a>
				</li>
				<li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == "create-test.php") { echo "active"; } ?>">
					<a class="nav-link" href="create-test.php">NEW TEST</a>
				</li>
				<?php if (isset($_SESSION['logged_user'])) : ?>
					<li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == "account.php" || basename($_SERVER['PHP_SELF']) == "update-password.php") { echo "active"; } ?>">
						<a class="nav-link" href="account.php">ACCOUNT (<?= $_SESSION['logged_user']->login; ?>)</a>
					</li>
					<li class="nav-item">
						<a class="btn btn-outline-light" href="logout.php">LOG OUT <i class="fas fa-sign-out-alt ml-2"></i></a>
					</li>
				<?php else : ?>
					<li class="nav-item">
						<a class="btn btn-outline-light" href="login.php">LOG IN <i class="fas fa-sign-in-alt ml-2"></i></a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</nav>