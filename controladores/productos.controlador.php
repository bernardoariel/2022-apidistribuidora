<?php

class ControladorProductos{

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/
	
	static public function ctrMostrarProductos($tabla,$item, $valor){

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);

		return $respuesta;
	
	}
	/*=============================================
	AGREGAR PRODUCTOS A LA TABLA PRODUCTOS WC ACTUALIZADO
	=============================================*/
	
	static public function ctrAgregarProductoWc_Actualizado($tabla,$datos){

		$respuesta = ModeloProductos::mdlAgregarProductoWc_Actualizado($tabla, $datos);

		return $respuesta;
	
	}
	/*=============================================
	ELIMINAR PRODUCTO
	=============================================*/
	
	static public function ctrEliminoProducto($tabla,$sku){

		$respuesta = ModeloProductos::mdlEliminoProducto($tabla, $sku);

		return $respuesta;
	
	}
	/*=============================================
	AGREGAR PRODUCTOS
	=============================================*/
	
	static public function ctrAgregarProductoNuevo($tabla,$datos){

		$respuesta = ModeloProductos::mdlAgregarProductoNuevo($tabla, $datos);

		return $respuesta;
	
	}

	/*=============================================
	ACTUALIZAR PRODUCTOS EN la WEB
	=============================================*/
	static public function ctrTraerPorductos($tabla,$primero,$ultimo,$evaluarPor){

		$respuesta = ModeloProductos::mdlTraerPorductos($tabla,$primero,$ultimo,$evaluarPor);

		return $respuesta;

	}	
	/*=============================================
	MOSTRAR PRIMERO O ULTIMO PRODUCTO
	=============================================*/
	
	static public function ctrMostrarProducto($tabla,$item, $valor){

		$respuesta = ModeloProductos::mdlMostrarProducto($tabla, $item, $valor);

		return $respuesta;
	
	}

}

