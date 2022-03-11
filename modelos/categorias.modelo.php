<?php

require_once "conexion.php";

class ModeloCategorias{
    
    /*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function mdlMostrarCategorias($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		
	}

    /*=============================================
	AGREGAR CATEGORIAS
	=============================================*/
	static public function mdlAgregarCategoria($tabla, $id, $nombre){

		$stmt = Conexion::conectar()->prepare("INSERT $tabla (id, nombre) VALUES (:id, :nombre)");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> bindParam(":nombre", $nombre, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return $stmt->errorInfo();
		
		}

			$stmt = null;

	}
}
