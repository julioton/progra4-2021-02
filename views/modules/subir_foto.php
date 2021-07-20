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
    $editar = new MvcController();
    $editar -> subirFotoController();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Simple Tables</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
                                
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <form method="post" action="">

                                        <!-- general form elements -->
                                        <div class="col-md-6">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Subir Fotos</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <!-- form start -->
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Archivo</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    id="archivo" onchange="subir_archivo();">
                                                                <label class="custom-file-label"
                                                                    for="archivo">Seleccione un Archivo</label>
                                                                    <input type="hidden"  name="ruta" id="archivo_subido">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Nombre del Archivo" name="nombre">
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->

                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </form>
                                    <div for="mensaje_error">
                                    </div>
                                    <?php
		
                                        if( isset($_GET["action"]) ){
                                            if( $_GET["action"] == "foto_subida_ok" ){
                                                echo "Foto cargada correctamente";
                                            }else if( $_GET["action"] == "foto_subida_error" ){
                                                echo "Error al cargar foto";
                                            }
                                        }

                                    ?>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-12">
                            <?php 
                                $editar -> mostrarFotosController2();
                            ?>
                        <!--
                            
                        -->
                        </div>
                    </div>

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <?php
	include "footer.php";
?>
<script src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/js/mdb5/plugins/all.min.js?v=3.8.1"></script>
</body>

</html>