<?php

class ControladorCategorias{

    /*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/
	
	static public function ctrMostrarCategorias($tabla,$item, $valor){

        $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);

		return $respuesta;
        
    }
    /*=============================================
	Agregar CATEGORIAS
	=============================================*/
	
	static public function ctrAgregarCategoria($tabla,$id, $nombre){

        $respuesta = ModeloCategorias::mdlAgregarCategoria($tabla, $id, $nombre);

		return $respuesta;
        
    }
    
}