<?php

require_once "conexion.php";

class ModeloProductos{

	/*=============================================
	MOSTRAR Productos
	=============================================*/

	static public function mdlMostrarProductos($tabla, $item, $valor){

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
	AGREGAR NUEVO PRODUCTO EN PRODUCTOS_WC_ACTUALIZADO
	=============================================*/
	static public function mdlAgregarProductoWc_Actualizado($tabla,$data){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla( id_wc, tipo, sku, nombre, publicado, destacado, visibilidad_catalogo, descripcion_corta, descripcion, dia_inicio_precio_rebajado, dia_fin_precio_rebajado, estado_impuesto, clase_impuesto, en_inventario, inventario, cant_inventario_bajo, permitir_reservas, vendido_individualmente, peso, longitud, anchura, altura, valoracion_permitir, nota_compra, precio_rebajado, precio_normal, categoria, etiqueta, clase_de_envio, imagenes, limite_descargas, dias_caducidad_descarga, superior, productos_agrupados, ventas_dirigidas, ventas_cruzadas, url_externa, texto_boton, posicion, editor)VALUES(:id_wc, :tipo, :sku, :nombre, :publicado, :destacado, :visibilidad_catalogo, :descripcion_corta, :descripcion, :dia_inicio_precio_rebajado, :dia_fin_precio_rebajado, :estado_impuesto, :clase_impuesto, :en_inventario, :inventario, :cant_inventario_bajo, :permitir_reservas, :vendido_individualmente, :peso, :longitud, :anchura, :altura, :valoracion_permitir, :nota_compra, :precio_rebajado, :precio_normal, :categoria, :etiqueta, :clase_de_envio, :imagenes, :limite_descargas, :dias_caducidad_descarga, :superior, :productos_agrupados, :ventas_dirigidas, :ventas_cruzadas, :url_externa, :texto_boton, :posicion, :editor)");
		
		$stmt -> bindParam(":id_wc", $data['id_wc'], PDO::PARAM_INT);
		$stmt -> bindParam(":tipo", $data['tipo'], PDO::PARAM_STR);
		$stmt -> bindParam(":sku", $data['sku'], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
		$stmt -> bindParam(":publicado", $data['publicado'], PDO::PARAM_STR);
		$stmt -> bindParam(":destacado", $data['destacado'], PDO::PARAM_STR);
		$stmt -> bindParam(":visibilidad_catalogo", $data['visibilidad_catalogo'], PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion_corta", $data['descripcion_corta'], PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion", $data['descripcion'], PDO::PARAM_STR);
		$stmt -> bindParam(":dia_inicio_precio_rebajado", $data['dia_inicio_precio_rebajado'], PDO::PARAM_STR);
		$stmt -> bindParam(":dia_fin_precio_rebajado", $data['dia_fin_precio_rebajado'], PDO::PARAM_STR);
		$stmt -> bindParam(":estado_impuesto", $data['estado_impuesto'], PDO::PARAM_STR);
		$stmt -> bindParam(":clase_impuesto", $data['clase_impuesto'], PDO::PARAM_STR);
		$stmt -> bindParam(":en_inventario", $data['en_inventario'], PDO::PARAM_STR);
		$stmt -> bindParam(":inventario", $data['inventario'], PDO::PARAM_STR);
		$stmt -> bindParam(":cant_inventario_bajo", $data['cant_inventario_bajo'], PDO::PARAM_STR);
		$stmt -> bindParam(":permitir_reservas", $data['permitir_reservas'], PDO::PARAM_STR);
		$stmt -> bindParam(":vendido_individualmente", $data['vendido_individualmente'], PDO::PARAM_STR);
		$stmt -> bindParam(":peso", $data['peso'], PDO::PARAM_STR);
		$stmt -> bindParam(":longitud", $data['longitud'], PDO::PARAM_STR);
		$stmt -> bindParam(":anchura", $data['anchura'], PDO::PARAM_STR);
		$stmt -> bindParam(":altura", $data['altura'], PDO::PARAM_STR);
		$stmt -> bindParam(":valoracion_permitir", $data['valoracion_permitir'], PDO::PARAM_STR);
		$stmt -> bindParam(":nota_compra", $data['nota_compra'], PDO::PARAM_STR);
		$stmt -> bindParam(":precio_rebajado", $data['precio_rebajado'], PDO::PARAM_STR);
		$stmt -> bindParam(":precio_normal", $data['precio_normal'], PDO::PARAM_STR);
		$stmt -> bindParam(":categoria", $data['categoria'], PDO::PARAM_STR);
		$stmt -> bindParam(":etiqueta", $data['etiqueta'], PDO::PARAM_STR);
		$stmt -> bindParam(":clase_de_envio", $data['clase_de_envio'], PDO::PARAM_STR);
		$stmt -> bindParam(":imagenes", $data['imagenes'], PDO::PARAM_STR);
		$stmt -> bindParam(":limite_descargas", $data['limite_descargas'], PDO::PARAM_STR);
		$stmt -> bindParam(":dias_caducidad_descarga", $data['dias_caducidad_descarga'], PDO::PARAM_STR);
		$stmt -> bindParam(":superior", $data['superior'], PDO::PARAM_STR);
		$stmt -> bindParam(":productos_agrupados", $data['productos_agrupados'], PDO::PARAM_STR);
		$stmt -> bindParam(":ventas_dirigidas", $data['ventas_dirigidas'], PDO::PARAM_STR);
		$stmt -> bindParam(":ventas_cruzadas", $data['ventas_cruzadas'], PDO::PARAM_STR);
		$stmt -> bindParam(":url_externa", $data['url_externa'], PDO::PARAM_STR);
		$stmt -> bindParam(":texto_boton", $data['texto_boton'], PDO::PARAM_STR);
		$stmt -> bindParam(":posicion", $data['posicion'], PDO::PARAM_STR);
		$stmt -> bindParam(":editor", $data['editor'], PDO::PARAM_STR);

		
		if($stmt->execute()){

			return "ok";

		}else{

			return $stmt->errorInfo();
		
		}

	
		$stmt = null;
	}

	/*=============================================
	ELIMINAR PRODUCTO X SKU
	=============================================*/
	static public function mdlEliminoProducto($tabla,$sku){
		
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE sku = :sku");
		
		
		$stmt -> bindParam(":sku", $sku, PDO::PARAM_INT);

		
		if($stmt->execute()){

			return "ok";

		}else{

			return $stmt->errorInfo();
		
		}

		$stmt = null;
	}

	/*=============================================
	AGREGAR NUEVO PRODUCTO EN productos_nuevos
	=============================================*/
	static public function mdlAgregarProductoNuevo($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT $tabla (sku, nombre, categoria, importe) VALUES (:sku, :nombre, :categoria, :importe)");

		$stmt -> bindParam(":sku", $datos['sku'], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
		$stmt -> bindParam(":categoria", $datos['categoria'], PDO::PARAM_STR);
		$stmt -> bindParam(":importe", $datos['importe'], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return $stmt->errorInfo();
		
		}

			$stmt = null;

	}


/* 	static public function mdlMostrarProducto($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET sku=:sku, nombre=:nombre, precio_normal=:importe WHERE sku = :sku");

		$stmt -> bindParam(":sku", $datos['sku'], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
		$stmt -> bindParam(":importe", $datos['importe'], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return $stmt->errorInfo();
		
		}

			$stmt = null;

	} */

	/*=============================================
	ACTUALIZAR PRODUCTOS EN la WEB
	=============================================*/
	static public function mdlTraerPorductos($tabla,$primero,$ultimo,$evaluarPor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where $evaluarPor>=$primero and $evaluarPor <=$ultimo");

		$stmt -> execute();

		return $stmt -> fetchAll();

		

		$stmt = null;
    }
	/*=============================================
	MOSTRAR PRIMERO O ULTIMO PRODUCTO
	=============================================*/

	static public function mdlMostrarProducto($tabla, $item , $valor){


		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $item $valor limit 1");


		$stmt -> execute();

		return $stmt -> fetch();

		
		
	}

}

