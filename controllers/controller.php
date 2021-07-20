<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public static function pagina(){	

		include "views/template.php";

	}

	#ENLACES
	#-------------------------------------

	public static function enlacesPaginasController(){

		if(isset( $_GET['action'])){

			$enlaces = $_GET['action'];

		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}

	#----------------------------------------------
	#REGISTRO USUARIOS
	public static function registroUsuarioController(){

		if( isset( $_POST["nombre"]) &&
			isset( $_POST["password"]) &&
			isset( $_POST["email"]) ){
				if( !empty($_POST["nombre"]) && !empty($_POST["email"]) && !empty($_POST["password"])){
					if( preg_match('/^[A-Za-z0-9\-\_\.]{3,20}$/', $_POST["nombre"] ) && 
						preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $_POST["email"] ) && 
						preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/', $_POST["password"]) ){
							//$password = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
							$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

							$datos = array(
								"nombre" => $_POST["nombre"], 
								"password" => $password, 
								"email" => $_POST["email"] 
								);
				
							$respuesta = Datos::registroUsuarioModel( $datos, "usuarios");
								
							if( $respuesta == "success"){
								header("location:registro_ok");
							}else{
								header("location:registro_error");
							}
					}
				}
		}
	}
	#----------------------------------------------
	#VISTA USUARIOS
	public static function vistaUsuariosController(){
		$respuesta = Datos::vistaUsuariosModel("usuarios");
		foreach ($respuesta as $key => $value) {
			echo '
			<tr>
				<td>'.$value["nombre"].'</td>
				<td>*********</td>
				<td>'.$value["email"].'</td>
				<td>
					<a href="editar&idEditar='.$value["id"].'">
						<button>
							Editar
						</button>
					</a>
				</td>
				<td>
					<a href="usuarios&idBorrar='.$value["id"].'">
						<button>
							Borrar
						</button>
					</a>
				</td>
			</tr>
			';
		}
	}
	#----------------------------------------------
	#ELIMINAR USUARIOS
	public static function borrarUsuarioController(){
		if( isset($_GET["idBorrar"])  ){
			if( !empty($_GET["idBorrar"]) ){
				if( preg_match('/^[0-9]{1,20}$/', $_GET["idBorrar"] ) ){
					$datos = $_GET["idBorrar"];
					$respuesta = Datos::borrarUsuarioModel( $datos, "usuarios");
					if( $respuesta == "success"){
						header("location:eliminado_ok");
					}else{
						header("location:eliminado_error");
					}				
				}
			}
		}
	}
	#----------------------------------------------
	#EDITAR USUARIOS
	public static function editarUsuarioController(){
		if( isset($_GET["idEditar"])  ){
			if( !empty($_GET["idEditar"]) ){
				if( preg_match('/^[0-9]{1,20}$/', $_GET["idEditar"] ) ){
					$datos = $_GET["idEditar"];
					$respuesta = Datos::editarUsuarioModel($datos, "usuarios");
					echo '
						<input type="hidden" name="id" value="'.$respuesta["id"].'" required>
						<input type="hidden" id="nombre_validar" value="'.$respuesta["nombre"].'" required>
						<input type="hidden" id="email_validar" value="'.$respuesta["email"].'" required>
		
						<input type="text" placeholder="Usuario" name="nombre" id="nombre_registro" value="'.$respuesta["nombre"].'" required>
		
						<input type="password" placeholder="Contraseña" name="password" required>
					
						<input type="email" placeholder="Email" name="email" id="email_registro" value="'.$respuesta["email"].'" required>
					
						<input type="submit" value="Enviar">
					';
				}
			}
		}
	}
	#----------------------------------------------
	#ACTUALIZAR USUARIOS
	public static function actualizarUsuarioController(){
		if( isset($_POST["id"]) &&
			isset($_POST["nombre"]) &&
			isset($_POST["password"]) &&
			isset($_POST["email"]) ){
				if( !empty($_POST["id"]) && !empty($_POST["nombre"]) && !empty($_POST["email"]) && !empty($_POST["password"])){
					if( preg_match('/^[0-9]{1,20}$/', $_POST["id"] ) && 
						preg_match('/^[A-Za-z0-9\-\_\.]{3,20}$/', $_POST["nombre"] ) && 
						preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $_POST["email"] ) && 
						preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/', $_POST["password"]) ){
							//$password = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
							$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

							$datos = array(
								"id" => $_POST["id"], 
								"nombre" => $_POST["nombre"], 
								"password" => $password, 
								"email" => $_POST["email"] 
								);
				
							$respuesta = Datos::actualizarUsuarioModel( $datos, "usuarios");
								
							if( $respuesta == "success"){
								header("location:actualizado_ok");
							}else{
								header("location:actualizado_error");
							}
					}
				}
		}
	}
	#----------------------------------------------
	#INGRESO DE USUARIOS
	public static function ingresarUsuarioController(){
		if( isset($_POST["nombre"]) &&
			isset($_POST["password"]) ){	
			if( !empty($_POST["nombre"]) && !empty($_POST["password"])){
				if( preg_match('/^[A-Za-z0-9\-\_\.]{3,20}$/', $_POST["nombre"]) && 
					preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/', $_POST["password"]) ){
						$password = $_POST["password"];
			
						$datos = array(
							"nombre" => $_POST["nombre"], 
							"password" => $password
							);
			
						$respuesta = Datos::ingresarUsuarioModel( $datos, "usuarios");
							
						if( $respuesta["nombre"] == $datos["nombre"] && password_verify($password, $respuesta["password"]) ){
							$_SESSION["usuarioActivo"] = true;
							header("location:ingresar_ok");
						}else{
							header("location:ingresar_error");
						}
				}else{
					header("location:ingresar_error_invalido");
				}
			}else{
				header("location:ingresar_error_vacio");
			}
		}
	}
	#----------------------------------------------
	#VALIDAR USUARIOS
	public static function validarUsuarioController($datos){
		$respuesta = 0;
		if( !empty($datos) ){
			if( preg_match('/^[A-Za-z0-9\-\_\.]{3,20}$/', $datos) || 
				preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $datos) ){
				$respuesta = Datos::validarUsuarioModel($datos);
				if( $respuesta[0] > 0 ){
					$respuesta = 1;
				}else{
					$respuesta = 0;
				}
			}
		}
		return $respuesta;
	}
	#----------------------------------------------
	#SUBIR FOTO	
	public static function subirFotoController(){
		if( isset($_POST["ruta"]) &&
			isset($_POST["nombre"]) ){
				if( !empty($_POST["ruta"]) && !empty($_POST["nombre"]) ){
					if( preg_match('/^[A-Za-z0-9\-\_\.]{1,100}$/', $_POST["ruta"] ) && 
						preg_match('/^[A-Za-z0-9\-\_\.]{1,100}$/', $_POST["nombre"] ) ){
							
							$datos = array(
								"ruta" => $_POST["ruta"], 
								"nombre" => $_POST["nombre"]
								);
				
							$respuesta = Datos::subirFotoModel( $datos, "fotos");
								
							if( $respuesta == "success"){
								header("location:foto_subida_ok");
							}else{
								header("location:foto_subida_error");
							}
					}
				}
		}
	}
	#----------------------------------------------
	#VISTA USUARIOS
	public static function mostrarFotosController2(){
		$respuesta = Datos::mostrarFotosModel("fotos");
		echo '
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
		';
		$contador = 0;
		foreach ($respuesta as $key => $value) { //
			if($contador == 0){
				echo '
				<div class="carousel-item active">
				<img class="d-block w-100" src="uploads/'.$value["ruta"].'" alt="'.$value["nombre"].'">
				<div class="carousel-caption d-none d-md-block">
					<h5>'.$value["nombre"].'</h5>
				</div>
				</div>
				';
			}else{
				echo '
				<div class="carousel-item ">
				<img class="d-block w-100" src="uploads/'.$value["ruta"].'" alt="'.$value["nombre"].'">
				<div class="carousel-caption d-none d-md-block">
					<h5>'.$value["nombre"].'</h5>
				</div>
				</div>
				';
			}
			$contador++;
		}
		echo '
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		';
	}

	#----------------------------------------------
	#VISTA USUARIOS
	public static function mostrarFotosController(){
		$respuesta = Datos::mostrarFotosModel("fotos");
		echo '
		<div class="lightbox">
                                <div class="row">
                                    
		';
		$contador = 0;
		foreach ($respuesta as $key => $value) { //
				echo '
				<div class="col-md-3">
				<img
				src="uploads/'.$value["ruta"].'"
				alt="'.$value["nombre"].'"
				class="w-100 mb-2 mb-md-4 shadow-1-strong rounded"
			/></div>
				';
		}
		echo '
		
		</div>
	</div>
		';
	}

}

?>
