<?php
include('config/constantes.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
	<title>Document</title>
</head>

<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->

	<nav class="pcoded-navbar menu-light ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div ">



				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
						<label>Navegación</label>
					</li>
					<li class="nav-item"><a href="animation.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Usuarios</span></a></li>
					<li class="nav-item"><a href="animation.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Campus</span></a></li>

					<li class="nav-item"><a href="animation.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-map-pin"></i></span><span class="pcoded-mtext">Bar Campus</span></a></li>

					<li class="nav-item"><a href="animation.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-package"></i></span><span class="pcoded-mtext">Snack</span></a></li>

					<li class="nav-item"><a href="animation.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-inbox"></i></span><span class="pcoded-mtext">Buzón de sugerencias</span></a></li>

					<li class="nav-item"><a href="animation.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-heart"></i></span><span class="pcoded-mtext">Preferencias</span></a></li>

					<li class="nav-item"><a href="animation.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-book"></i></span><span class="pcoded-mtext">Menu</span></a></li>

					
				</ul>
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">


		<div class="m-header">
			<h5 class="text-light">
				<?php
				if (isset($_SESSION['iniciado'])) {
					echo $_SESSION['iniciado'];
				}

				?>
			</h5>
			<a href="#!" class="mob-toggler">
				<i class="feather icon-more-vertical"></i>

			</a>
		</div>



	</header>
	<!-- [ Header ] end -->



	<!-- [ Main Content ] start -->
	<section class="pcoded-main-container">
		<div class="pcoded-content">
			<!-- [ breadcrumb ] start -->
			<div class="page-header">
				<div class="page-block">
					<div class="row align-items-center">
						<div class="col-md-12">

							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
								<li class="breadcrumb-item"><a href="#!">Bar ESPEL BDD</a></li>
								<li class="breadcrumb-item"><a href="#!">Usuarios</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- [ breadcrumb ] end -->
			<!-- [ Main Content ] start -->
			<div class="row">
				<!-- [ sweetalert ] start -->
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<h5>Usuarios</h5>
							<div class="card-header-right">
								<div class="btn-group card-option">
									<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="feather icon-more-horizontal"></i>
									</button>
									<ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
										<li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
										<li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
										<li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
										<li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="card-body btn-page">

							<div class="row">
								<!-- customar project  start -->
								<div class="col-xl-12">

									<div class="card-body">
										<div class="row align-items-center m-l-0">
											<div class="col-sm-6">
											</div>
											<div class="col-sm-6 text-right">

											</div>
										</div>
										<div class="table-responsive">
											<table id="report-table" class="table table-bordered table-striped mb-0">
												<thead>
													<tr>
														<th>ID USUARIO</th>
														<th>NOMBRE DE USUARIO</th>
														<th>CONTRASEÑA</th>

													</tr>
												</thead>
												<tbody>
													<?php
													$conn = mysqli_connect(SERVIDOR, USERNAME, PASSWORD, '') or die(mysqli_error($conn));
													$basededatos = mysqli_select_db($conn, BASEDATOS);
													$sql = "Select * from user";
													$res = mysqli_query($conn, $sql);
													if ($res == true) {
														$numFilas = mysqli_num_rows($res);
														if ($numFilas > 0) {
															while ($fila = mysqli_fetch_assoc($res)) {
																$id = $fila['user_id'];
																$nombre = $fila['user_name'];
																$password = $fila['user_password'];
																
													?>
																<tr>
																	<td><?php echo $id ?></td>
																	<td><?php echo $nombre  ?></td>
																	<td><?php echo $password ?></td>
																	
																</tr>
															<?php
															}
														} else {
															?>
															<tr>
																<td colspan="5">Aún no se han creado usuarios</td>
															</tr>
													<?php
														}
													}
													?>

												</tbody>
											</table>
										</div>
									</div>

								</div>
								<!-- customar project  end -->


							</div>
						</div>
					</div>
					<!-- [ sweetalert ] end -->
				</div>
				<!-- [ Main Content ] end -->
			</div>
	</section>


	<!-- Required Js -->
	<script src="assets/js/vendor-all.min.js"></script>
	<script src="assets/js/plugins/bootstrap.min.js"></script>
	<script src="assets/js/ripple.js"></script>
	<script src="assets/js/pcoded.min.js"></script>


	<!-- sweet alert Js -->
	<script src="assets/js/plugins/sweetalert.min.js"></script>
	<script src="assets/js/pages/ac-alert.js"></script>

	<footer class="text-center text-white" style="background-color: #f1f1f1;">
		<!-- Grid container -->
		<div class="container pt-4">
			<!-- Section: Social media -->
			<section class="mb-4">
				<!-- Facebook -->
				<a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-facebook-f"></i></a>

				<!-- Twitter -->
				<a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-twitter"></i></a>

				<!-- Google -->
				<a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-google"></i></a>

				<!-- Instagram -->
				<a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-instagram"></i></a>

				<!-- Linkedin -->
				<a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-linkedin"></i></a>
				<!-- Github -->
				<a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-github"></i></a>
			</section>
			<!-- Section: Social media -->
		</div>
		<!-- Grid container -->

		<!-- Copyright -->
		<div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
			© 2022 Copyright:
			<a class="text-dark" href="#" target="_blank">ESPE</a>
		</div>
		<!-- Copyright -->
	</footer>
</body>

</html>