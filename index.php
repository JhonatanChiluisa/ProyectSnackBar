<?php
     include('config/constantes.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>BAR - ESPEL</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="assets/css/style.css">




</head>

<!-- [ signin-img ] start -->
<div class="auth-wrapper align-items-stretch aut-bg-img">
	<div class="flex-grow-1">
		<div class="h-100 d-md-flex align-items-center auth-side-img">
			<div class="col-sm-10 auth-content w-auto">
				<img src="assets/images/auth/logo.png" alt="" class="img-fluid">
				<h1 class="text-white my-4">Bienvenido</h1>
				<h4 class="text-white font-weight-normal">Inicia sesión para explorar la bases de datos del bar de la ESPEL.</h4>
			</div>
		</div>
		<div class="auth-side-form">
			<form action="" method="POST">
				<div class=" auth-content">
					<img src="assets/images/auth/logo-m.png" alt="" class="img-fluid mb-5 d-block d-xl-none d-lg-none">
					<h3 class="mb-4 f-w-400">Inicio de sesión</h3>
					<div class="form-group mb-3">
						<label class="floating-label" for="Email">Nombre de usuario</label>
						<input type="text" class="form-control" id="Email" name="username" placeholder="">
					</div>
					<div class="form-group mb-4">
						<label class="floating-label" for="Password">Contraseña</label>
						<input type="password" class="form-control" id="Password" name="password" placeholder="">
					</div>
					<p class="text-danger">
						<?php
						if (isset($_SESSION['iniciado'])) {
							echo $_SESSION['iniciado'];
							unset($_SESSION['iniciado']);
						}
						if (isset($_SESSION['error_inicio'])) {
							echo $_SESSION['error_inicio'];
							unset($_SESSION['error_inicio']);
						}
						?>
					</p>
					<button type="submit" name="submit" class="btn btn-block btn-primary mb-4">Iniciar sesión</button>

				</div>
			</form>

		</div>
	</div>
</div>

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/ripple.js"></script>
<script src="assets/js/pcoded.min.js"></script>


</body>

</html>

<?php
//Verificar si el formulario a sido enviado


if (isset($_POST['submit'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];
	$conexion = mysqli_connect(SERVIDOR, USERNAME, PASSWORD, BASEDATOS);

	$sentenciasql = mysqli_query($conexion, "SELECT user_name, user_password FROM user WHERE user_name = '" . $username . "' and user_password='" . $password . "';");
	$nr=mysqli_num_rows($sentenciasql);
	if($nr==1){
		$_SESSION['iniciado'] = "Bienvenido ".$username;
    	header('location:'.URLSITIO.'usuarios.php');
	}
	else if($nr ==0){
		$_SESSION['error_inicio'] = "Usuario o contraseña incorrectos";
        header('location:'.URLSITIO);
	}
}
?>