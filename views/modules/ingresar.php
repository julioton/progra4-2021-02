<?php

$ingresar = new MvcController();
$ingresar -> ingresarUsuarioController();

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicie Sesión</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Usuario" name="nombre">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <p class="mb-0">
        <a href="register" class="text-center">Registrar un nuevo usuario</a>
      </p>
	  <p class="mb-0">
	  <?php
		if( isset($_GET["action"]) ){
			if( $_GET["action"] == "registro_ok" ){
				echo "Usuario registrado correctamente";
			}else if( $_GET["action"] == "ingresar_error" ){
				echo "Error al ingresar, verifique su usuario o contraseña";
			}else if( $_GET["action"] == "ingresar_error_invalido" ){
				echo "Error al ingresar, su usuario o contraseña no cumple con los requerimientos mínimos (Usuario: letras, números y/o guíones. Contraseña: Mínimmo 8 carácteres, una letra y un número.)";
			}else if( $_GET["action"] == "ingresar_error_vacio" ){
				echo "Error al ingresar, debe de ingresar un usuario y una contraseña";
			}
		}
	  ?>
	  </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

