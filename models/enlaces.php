<?php

class Paginas{

	static public function enlacesPaginasModel($enlaces){


		switch ($enlaces) {
			case "ingresar":
			$module =  "views/modules/".$enlaces.".php";
			break;

			case "usuarios":
			$module =  "views/modules/".$enlaces.".php";
			break;

			case "editar":
			$module =  "views/modules/".$enlaces.".php";
			break;

			case "salir":
			$module =  "views/modules/".$enlaces.".php";
			break;

			case "registro":
			$module = "views/modules/registro.php";
			break;

			case "registro_ok":
			$module = "views/modules/ingresar.php";
			break;

			case "registro_error":
			$module = "views/modules/registro.php";
			break;

			case "eliminado_ok":
			$module = "views/modules/usuarios.php";
			break;

			case "eliminado_error":
			$module = "views/modules/usuarios.php";
			break;

			case "actualizado_ok":
			$module = "views/modules/usuarios.php";
			break;

			case "actualizado_error":
			$module = "views/modules/usuarios.php";
			break;

			case "ingresar_ok":
			$module = "views/modules/usuarios.php";
			break;

			case "ingresar_error":
			$module = "views/modules/ingresar.php";
			break;

			case "ingresar_error_invalido":
			$module = "views/modules/ingresar.php";
			break;

			case "ingresar_error_vacio":
			$module = "views/modules/ingresar.php";
			break;

			case "subir_foto":
			$module = "views/modules/subir_foto.php";
			break;

			case "foto_subida_ok":
			$module = "views/modules/subir_foto.php";
			break;

			case "foto_subida_error":
			$module = "views/modules/subir_foto.php";
			break;

			default:
			$module =  "views/modules/registro.php";
			break;
		}

		return $module;

	}

}

?>
