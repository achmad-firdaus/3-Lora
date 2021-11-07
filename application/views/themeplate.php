<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
	<!-- <meta name="viewport" content="width=75%, initial-scale=1, shrink-to-fit=no"> -->
	<!-- <meta id="myViewport" name="viewport" content="width = 90, initial-scale=1">
	<script>
	window.onload = function () {
		var mvp = document.getElementById('myViewport');
		mvp.setAttribute('content','width=90');
	}
	</script>  -->
	<!-- <meta name="viewport" content="width=1900px, initial-scale=1.0, shrink-to-fit=no"> -->
	<script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "75%" 
        }
	</script>
	<!-- <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
	<meta name="author" content="Creative Tim"> -->
	<title>Dashboard</title>
	<!-- Favicon -->
	<!-- <link rel="icon" href="<?= $Icon ?>" type="image/png"> -->
	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
	<!-- Icons -->
	<link rel="stylesheet" href="<?= $Css1 ?>" type="text/css">
	<link rel="stylesheet" href="<?= $Css2 ?>" type="text/css">
	<!-- Page plugins -->
	<!-- Argon CSS -->
	<link rel="stylesheet" href="<?= $Css3 ?>" type="text/css">
	<!-- sweet alert -->
	<script src="<?= $sweetalert2 ?>"></script>
</head>

<body onload="zoom()">  
	<!-- Sidenav -->
	<!-- Main content -->
	<div class="main-content" id="panel">
		<!-- Topnav -->
		<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Search form -->
					<!-- Navbar links -->
					<ul class="navbar-nav align-items-center  ml-md-auto ">
						<div class="media-body  ml-2  d-none d-lg-block">
							<h1>
								<span class="mb-0 text-sm text-light font-weight-bold">PERANCANGAN DAN IMPLEMENTASI WIRELESS SENSOR NETWORK BERBASIS TOPOLOGI STAR UNTUK CONTROL DAN MONITORING DAYA PADA LAMPU PENERANGAN JALAN UMUM (PJU) DAN UNTUK PERINGATAN DINI GEMPA BUMI</span>
							</h1>
						</div>
					</ul>
					<ul class="navbar-nav align-items-center  ml-auto ml-md-10 ">
						<li class="nav-item dropdown">
							<a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false">
								<i class="ni ni-ungroup"></i>
							</a>
							<div
								class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
								<div class="row shortcuts px-4 mt-2">
									<a href="#" class="col-4 shortcut-item" data-toggle="modal"
										data-target=".resetModal">
										<span class="shortcut-media avatar rounded-circle bg-gradient-red">
											<i class="fa fa-trash" aria-hidden="true"></i>
										</span>
										<label class="ml-1">Reset</label>
									</a>
									<a href="#" class="col-4 shortcut-item">
										<span class="shortcut-media avatar rounded-circle bg-gradient-orange"
											data-toggle="modal" data-target=".bd-example-modal-lg3" >
											<i class="fa fa-window-maximize" aria-hidden="true"></i>
										</span>
										<label class="ml-1">More</label>
									</a>
									<a href="<?= $export_csv ?>" class="col-4 shortcut-item">
										<span class="shortcut-media avatar rounded-circle bg-gradient-info"
											data-toggle="modal" data-target=".exportModal">
											<i class="ni ni-books"></i>
										</span>
										<label class="ml-">Export</label>
									</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false">
								<div class="media align-items-center">
									<span class="avatar avatar-sm rounded-circle">
										<img alt="Image placeholder"
											src="<?= $urlAvatar.$profile['photo'] ?>">
									</span>
									<div class="media-body  ml-2 mr-2  d-none d-lg-block">
										<span class="mb-0 text-sm  font-weight-bold"><?= $profile['first_name'].' '.$profile['last_name'] ?></span>
										<div class="w-100"></div>
										<span class="mb-0 text-sm  font-weight-bold"><?= $profile['nim'] ?></span>
									</div>
								</div>
							</a>
							<div class="dropdown-menu  dropdown-menu-right ">
								<div class="dropdown-header noti-title">
									<h6 class="text-overflow m-0">Welcome!</h6>
								</div>
								<!-- Large modal -->
								<button type="button" class="dropdown-item" data-toggle="modal"
									data-target=".bd-example-modal-lg">
									<i class="ni ni-single-02"></i>
									<span>My profile</span>
								</button>
								<button type="button" class="dropdown-item" data-toggle="modal"
									data-target=".bd-example-modal-lg2">
									<i class="ni ni-settings-gear-65"></i>
									<span>Change Password</span>
								</button>
								<div class="dropdown-divider"></div>
								<a href="<?= $urlLogout ?>" class="dropdown-item">
									<i class="ni ni-user-run"></i>
									<span>Logout</span>
								</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- Header -->
		<?php $this->load->view($View_Parent); ?>
		<!-- Header -->
	</div>
	<!-- Modal -->
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="needs-validation" novalidate style="margin: 20px;" action="<?= $urlProfile ?>"
					method="post" enctype="multipart/form-data">
					<div class="form-row">
						<div class="col-md-4 mb-3">
							<label for="validationCustom01">First name</label>
							<input type="text" class="form-control" id="validationCustom01" placeholder="First name"
								name="firstName" value="<?= $profile['first_name'] ?>" required>
							<div class="invalid-feedback">
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="validationCustom02">Last name</label>
							<input type="text" class="form-control" id="validationCustom02" placeholder="Last name"
								name="lastName" value="<?= $profile['last_name'] ?>" required>
							<div class="invalid-feedback">
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="validationCustomUsername">Username</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroupPrepend">@</span>
								</div>
								<input type="text" class="form-control" id="validationCustomUsername"
									placeholder="Username" aria-describedby="inputGroupPrepend" name="username" value="<?= $profile['username'] ?>"
									required>
								<div class="invalid-feedback">
								</div>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-4 mb-3">
							<label for="validationCustom01">Nim</label>
							<input type="text" class="form-control" id="validationCustom01" placeholder="Nim"
								name="nim" value="<?= $profile['nim'] ?>" required>
							<div class="invalid-feedback">
							</div>
						</div>
						<div class="col-md-8 mb-3">
							<label for="validationCustom01">Upload Photo</label>
							<!-- <input type="file" class="custom-file-input" id="customFile"> -->
							<input type="file" class="form-control" id="validationCustom01" placeholder="Upload Photo"
								name="photo">
							<div class="invalid-feedback">
							</div>
						</div>
					</div>
					<button class="btn btn-primary" id="ButtonValidateProfile" type="submit">Submit form</button>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="needs-validation" novalidate style="margin: 20px;" action="<?= $urlPassword ?>"
					method="post" enctype="multipart/form-data">
					<div class="form-row">
						<div class="col-md-9 mb-3">
							<label for="validationCustom01">New Password</label>
							<input type="text" class="form-control" id="validationCustom01" placeholder="New Password"
								name="password" required>
							<div class="invalid-feedback">
							</div>
						</div>
						<div class="col-md-3 mb-3">
							<label for="validationCustom01">&nbsp;</label>
							<button class="btn btn-primary form-control" id="ButtonValidateProfile" type="submit">Submit
								form</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade bd-example-modal-lg3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="needs-validation" novalidate style="margin: 20px;" action="<?= $urlGen ?>" method="post"
					enctype="multipart/form-data">
					<div class="form-group row">
						<label for="validationCustom01" class="col-sm-4 col-form-label">Date Generate</label>
						<div class="col-sm-8">
							<input type="Number" class="form-control" id="validationCustom01" name="dategenerate" placeholder="Number" maxlength="2" value="<?= $getDateGenerate['value'] ?>"required>
							<div class="invalid-feedback">
							</div>
						</div>
					</div>
					<button class="btn btn-primary" id="ButtonValidateProfile" type="submit">Submit form</button>
				</form>
			</div>
		</div>
	</div>

	<!-- Argon Scripts -->
	<!-- Core -->
	<script src="<?= $Js1 ?>"></script>
	<script src="<?= $Js2 ?>"></script>
	<script src="<?= $Js3 ?>"></script>
	<script src="<?= $Js4 ?>"></script>
	<script src="<?= $Js5 ?>"></script>
	<!-- <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
	<script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/vendor/js-cookie/js.cookie.js"></script>
	<script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
	<script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script> -->
	<!-- Optional JS -->
	<script src="<?= $Js6 ?>"></script>
	<script src="<?= $Js7 ?>"></script>
	<!-- <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
	<script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script> -->
	<!-- Argon JS -->
	<script src="<?= $Js8 ?>"></script>
	<script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>