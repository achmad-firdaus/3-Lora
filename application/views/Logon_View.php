<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
	<meta name="author" content="Creative Tim">
	<title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
	<!-- Favicon -->
	<!-- <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png"> -->
	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
	<!-- Icons -->
	<link rel="stylesheet" href="<?= $Css1 ?>" type="text/css">
	<link rel="stylesheet" href="<?= $Css2 ?>" type="text/css">
	<!-- Argon CSS -->
	<link rel="stylesheet" href="<?= $Css3 ?>" type="text/css">
</head>

<body class="bg-default">
	<!-- Navbar -->
	<!-- Main content -->
	<div class="main-content">
		<!-- Header -->
		<div class="header bg-gradient-primary py-7 py-lg-4 pt-lg-1">
			<div class="container">
				<div class="header-body text-center mb-7">
					<div class="row justify-content-center">
						<div class="col-xl-5 col-lg-6 col-md-8 px-5">
							<h1 class="text-white">Welcome</h1>
							<p class="text-lead text-white">Use these forms to login.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="separator separator-bottom separator-skew zindex-100">
				<svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
					xmlns="http://www.w3.org/2000/svg">
					<polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
				</svg>
			</div>
		</div>
		<!-- Page content -->
		<div class="container mt--8 pb-5">
			<!-- Table -->
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-8">
					<div class="card bg-secondary border-0">
						<div class="card-body px-lg-5 py-lg-5">
							<div class="text-center text-muted mb-4">
								<small>sign in</small>
							</div>
                            <?= $this->session->flashdata('NOTIF');?>
							<form class="needs-validation" novalidate style="margin: 20px;" role="form" action="<?= $urlLogon ?>" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<div class="input-group input-group-merge input-group-alternative mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ni ni-hat-3"></i></span>
										</div>
										<input class="form-control" placeholder="Username" name="Username" type="text" required>
                                        <div class="invalid-feedback">
                                            <span class="mb-0 text-sm text-light font-weight-bold">Required username</span>
                                        </div>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group input-group-merge input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
										</div>
										<input class="form-control" placeholder="Password" name="Password" type="password" required>
                                        <div class="invalid-feedback">
                                            <span class="mb-0 text-sm text-light font-weight-bold">Required password</span>
                                        </div>
									</div>
								</div>
								<div class="row my-4">
									<div class="col-12">
										<div class="custom-control custom-control-alternative custom-checkbox">
											<input class="custom-control-input" id="customCheckRegister"
												type="checkbox">
											<label class="custom-control-label" for="customCheckRegister">
												<span class="text-muted">I agree with the <a href="#!">Privacy
														Policy</a></span>
											</label>
										</div>
									</div>
								</div>
								<div class="text-center">
									<button type="submit" id="ButtonValidateLogon" class="btn btn-primary mt-4">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<!-- Footer -->
	<footer class="py-5" id="footer-main">
		<div class="container">
			<div class="row align-items-center justify-content-xl-between">
			<div class="col-lg-6">
				<div class="copyright text-center  text-lg-left  text-muted">
					&copy; 2021 <a href="https://thirtysevenprojects.com/" class="font-weight-bold ml-1"
						target="https://thirtysevenprojects.com/">thirtysevenprojects</a>
				</div>
			</div>
			</div>
		</div>
	</footer>
	<!-- Argon Scripts -->
	<!-- Core -->
	<script src="<?= $Js1 ?>"></script>
	<script src="<?= $Js2 ?>"></script>
	<script src="<?= $Js3 ?>"></script>
	<script src="<?= $Js4 ?>"></script>
	<script src="<?= $Js5 ?>"></script>
	<!-- Argon JS -->
	<script src="<?= $Js8 ?>"></script>
</body>

</html>