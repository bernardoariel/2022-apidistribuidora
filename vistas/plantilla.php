<?php 

    $tabla= "productos_wc_actualizado";
    
    $item = "id";
    $valor = 'asc'; // desc
    
    [ ,$primerValor ] = ControladorProductos::ctrMostrarProducto($tabla,$item,$valor);

    $ultimo = $primerValor + 20;

    $tabla= "productos_nuevos";
    
    $item = "id";
    $valor = 'asc'; // desc
    
    [$primerValorNuevo ] = ControladorProductos::ctrMostrarProducto($tabla,$item,$valor);

    $ultimoNuevo = $primerValorNuevo + 20;
?>
<ul>
    <li>
        <h2>Primer Paso</h2>
        <p>Exportar los productos de la tienda que estan cargados en el servidor del sitio</p>
        <p>Luego importar el archivo como cvs <strong>"productos_wc"</strong></p>
        <p>`id`, `id_wc`, `tipo`, `sku`, `nombre`, `publicado`, `destacado`, `visibilidad_catalogo`, `descripcion_corta`, `descripcion`, `dia_inicio_precio_rebajado`, `dia_fin_precio_rebajado`, `estado_impuesto`, `clase_impuesto`, `en_inventario`, `inventario`, `cant_inventario_bajo`, `permitir_reservas`, `vendido_individualmente`, `peso`, `longitud`, `anchura`, `altura`, `valoracion_permitir`, `nota_compra`, `precio_rebajado`, `precio_normal`, `categoria`, `etiqueta`, `clase_de_envio`, `imagenes`, `limite_descargas`, `dias_caducidad_descarga`, `superior`, `productos_agrupados`, `ventas_dirigidas`, `ventas_cruzadas`, `url_externa`, `texto_boton`, `posicion`, `editor`</p>
    </li>
    <li>
        <h2>Segundo Paso</h2>
        <p>Convertir los archivos excel con los precios nuevos en cvs</p>
        <p>Luego poder importar el archivo al localhost <strong>"listado_nuevo"</strong></p>
        <p>`id`, `sku`, `nombre`, `categoria`, `importe`</p>
    </li>
    <li>
        <h2>Tercer Paso</h2>
        <p>Recorrer el listado nuevo para actualizar los precios en "productos_wc"</p>
        <a href="index.php?ruta=actualizarProductos">Actualizar Productos</a>

    </li>
    <!-- <li><a href="index.php?ruta=recorrerProductos_wc">Traer los productos del WC</a></li> -->
    <li>
        <p>Actualizar productos en la web</p>   
        <a href="index.php?ruta=actualizarProductosWeb&primero=<?php echo $primerValor; ?>&ultimo=<?php echo $ultimo; ?>">Actualizar en el WooCommerce</a>
    </li>
    <li><p>SUBIR PRODUCTOS NUEVOS</p>   
        <a href="index.php?ruta=agregarProductosNuevos&primero=<?php echo $primerValorNuevo; ?>&ultimo=<?php echo $ultimoNuevo; ?>">Nuevos en el WooCommerce</a></li>
    <li></li>
    <li></li>
</ul>

<?php 


if(isset($_GET["ruta"])){
  
    if( $_GET["ruta"] == "actualizarProductos"||
        $_GET["ruta"] == "actualizarProductosWeb"||
        $_GET["ruta"] == "agregarProductosNuevos"||
        $_GET["ruta"] == "agregarCategoriaLocal" ){
  
        include "paginas/".$_GET["ruta"].".php";

    }
}


?>