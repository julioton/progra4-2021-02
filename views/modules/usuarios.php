<?php
	if( isset($_SESSION) ){
		if(!$_SESSION["usuarioActivo"]){
			header("location:ingresar_error");
			exit();
		}
	}else{
		header("location:ingresar_error");
		exit();
	}
	
	$usuarios = new MvcController();
	$usuarios->borrarUsuarioController();
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Simple Tables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  
<?php
	include "navegacion.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Simple Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row USUARIOS -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">USUARIOS REGISTRADOS</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Usuario</th>
                      <th>Contraseña</th>
                      <th>Correo Electrónico</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
				  	<?php
						$usuarios->vistaUsuariosController();
					?>	
                  </tbody>
                </table>
				<?php
		
					if( isset($_GET["action"]) ){
						if( $_GET["action"] == "eliminado_ok" ){
							echo "Usuario eliminado correctamente";
						}else if( $_GET["action"] == "eliminado_error" ){
							echo "Ocurrió un error al eliminar el Usuario";
						}else if( $_GET["action"] == "actualizado_ok" ){
							echo "Usuario actualizado correctamente";
						}else if( $_GET["action"] == "actualizado_error" ){
							echo "Ocurrió un error al actualizar el Usuario";
						}else if( $_GET["action"] == "ingresar_ok" ){
							echo "Bienvenido!";
						}
					}

				?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php
	include "footer.php";
?>
</body>
</html>
