<h1>ACTUALIZAR PRODUCTOS</h1>

<?php
    // for ($i=1; $i < 250 ; $i++) { 
    //     # code...
    // }
    // $woocommerce->get('products',['sku' => 5646]);


/* $productos=$woocommerce->get('products',['sku' => 5646]);
print_r($productos[0]->id);  */

$tabla= "listado_nuevo";
$item = null;
$valor = null;

$listadoNuevo = ControladorProductos::ctrMostrarProductos($tabla,$item,$valor);
               

foreach ($listadoNuevo as $key => $value) {
   
    // busco el producto de la tabla si existe lo copio a wc_actualizado y luego lo borro del listado_nuevo
    $tabla= "productos_wc";
    
    $item = "sku";
    $valor = $value["sku"];
    $productoDeWc = ControladorProductos::ctrMostrarProductos($tabla,$item,$valor);
    if(!empty($productoDeWc)){
        // Agrego con precio actualizado
        $datos = array(
            "id_wc" => $productoDeWc['id_wc'], "tipo" => $productoDeWc['tipo'], "sku" => $value["sku"], "nombre" => $value["nombre"],
            "publicado" => $productoDeWc['publicado'], "destacado" => $productoDeWc['destacado'], "visibilidad_catalogo" => $productoDeWc['visibilidad_catalogo'],
            "descripcion_corta" => $productoDeWc['descripcion_corta'],"descripcion" => $productoDeWc['descripcion'], 
            "dia_inicio_precio_rebajado" => $productoDeWc['dia_inicio_precio_rebajado'], "dia_fin_precio_rebajado" => $productoDeWc['dia_fin_precio_rebajado'], 
            "estado_impuesto" => $productoDeWc['estado_impuesto'], "clase_impuesto" => $productoDeWc['clase_impuesto'],
            "en_inventario" => $productoDeWc['en_inventario'],"inventario" => $productoDeWc['inventario'], "cant_inventario_bajo" => $productoDeWc['cant_inventario_bajo'],
            "permitir_reservas" => $productoDeWc['permitir_reservas'], "vendido_individualmente" => $productoDeWc['vendido_individualmente'],
            "peso" => $productoDeWc['peso'],"longitud" => $productoDeWc['longitud'], "anchura" => $productoDeWc['anchura'], "altura" => $productoDeWc['altura'],
            "valoracion_permitir" => $productoDeWc['valoracion_permitir'], "nota_compra" => $productoDeWc['nota_compra'], 
            "precio_rebajado" => $productoDeWc['precio_rebajado'], "precio_normal" => $productoDeWc['precio_normal'],"longitud" => $productoDeWc['longitud'],
            "anchura" => $productoDeWc['anchura'], "altura" => $productoDeWc['altura'], "valoracion_permitir" => $productoDeWc['valoracion_permitir'],
            "nota_compra" => $productoDeWc['nota_compra'], "precio_rebajado" => $productoDeWc['precio_rebajado'], "precio_normal" => $productoDeWc['precio_normal'],
            "longitud" => $productoDeWc['longitud'], "anchura" => $productoDeWc['anchura'], "altura" => $productoDeWc['altura'],
            "valoracion_permitir" => $productoDeWc['valoracion_permitir'], "nota_compra" => $productoDeWc['nota_compra'],
            "precio_rebajado" => $productoDeWc['precio_rebajado'], "precio_normal" => $value["importe"], 
            "categoria" => $productoDeWc['categoria'], "etiqueta" => $productoDeWc['etiqueta'], "clase_de_envio" => $productoDeWc['clase_de_envio'],
            "imagenes" => $productoDeWc['imagenes'], "limite_descargas" => $productoDeWc['limite_descargas'],
            "dias_caducidad_descarga" => $productoDeWc['dias_caducidad_descarga'], "superior" => $productoDeWc['superior'],
            "productos_agrupados" => $productoDeWc['productos_agrupados'], "ventas_dirigidas" => $productoDeWc['ventas_dirigidas'],
            "ventas_cruzadas" => $productoDeWc['ventas_cruzadas'], "url_externa" => $productoDeWc['url_externa'], "texto_boton" => $productoDeWc['texto_boton'],
            "posicion" => $productoDeWc['posicion'], "editor" => $productoDeWc['editor']);
        // LO AGREGO A LA TABLA ACTUALIZADO
        $tabla = "productos_wc_actualizado";
        $agregarProducto = ControladorProductos::ctrAgregarProductoWc_Actualizado($tabla,$datos);
        echo '<pre>'; print_r($agregarProducto); echo '</pre>';
        //LO SACO DEL LISTADO NUEVO DE LA DISTRIBUIDORA
        $tabla = "listado_nuevo";
        $eliminarProducto = ControladorProductos::ctrEliminoProducto($tabla,$value["sku"]);
        // LO ELIMINO DE LA TABLA DE PRODUCTOS QUE IMPORTE PREVIO A BAJARLO DEL SITIO
        $tabla= "productos_wc";
        $eliminarProducto = ControladorProductos::ctrEliminoProducto($tabla,$value["sku"]);
        echo '<pre> BORRAR:: '.$value["sku"].' '; print_r($eliminarProducto); echo '</pre>';
    
        

    }else{
        //LO AGREGO A OTRA TABLA PRODUCTOS NUEVOS
        $tabla= "productos_nuevos";
        $datos = array( "sku" => $value["sku"],
                        "nombre" => $value["nombre"],
                        "categoria" => $value["categoria"],
                        "importe" => $value["importe"]);
        $agregarProductoNuevo = ControladorProductos::ctrAgregarProductoNuevo($tabla,$datos);
        echo '<pre>NUEVO::::->'; print_r($agregarProductoNuevo); echo '</pre>';
        
        // elimino
        $tabla= "listado_nuevo";
        $eliminarProducto = ControladorProductos::ctrEliminoProducto($tabla,$value["sku"]);
        echo '<pre> BORRAR:: '.$value["sku"].' '; print_r($eliminarProducto); echo '</pre>';

    }
    

    
}


?>