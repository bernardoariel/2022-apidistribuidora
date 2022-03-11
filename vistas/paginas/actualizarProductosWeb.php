<?php 

require __DIR__ . '\vendor\autoload.php';
use Automattic\WooCommerce\Client;
$woocommerce = new Client(
    'http://c2390850.ferozo.com/', 
    'ck_e991d3ea6512ee9b052bf6688dc9971722b7563a', 
    'cs_2313933501c2853efc9a8c8448e260bca83b2789',
    [
        'wp_api' => true,
        'version' => 'wc/v3'
    ]
);
$tabla= "productos_wc_actualizado";
    
$item = "id";
$valor = 'desc'; // asc

[ ,$ultimoValor ] = ControladorProductos::ctrMostrarProducto($tabla,$item,$valor);


$ultimo = $primerValor + 20;

if($_GET['ultimo']<=$ultimoValor){
    echo '<pre>11->'; print_r($ultimoValor); echo '</pre>';   

        //recorro los productos de la tabla actualizada
        $tabla= "productos_wc_actualizado"; // SIN LOS NUEVOS
        $evaluarPor = 'id_wc'; //LOS SELECCIONO POR EL ID
        $cargarProductos = ControladorProductos::ctrTraerPorductos($tabla,$_GET['primero'],$_GET['ultimo'],$evaluarPor);

        
        foreach ($cargarProductos as $key => $productos) {
            $nameWc = $productos['nombre'];
            $descripcion_cortaWc = $productos['descripcion_corta'];
    
            //SI LA DESCRIPCION CORTA ES IGUAL AL NOMBRE, AGREGAR ESE VALOR
            ($nameWc == $descripcion_cortaWc) ? $productoDescripcion = $nameWc : $productoDescripcion = $productos['descripcion_corta'];
            # code...
            $data = [
                'name' => $nameWc,//$productos['nombre'].' '.$productos['detalle1'].' '.$productos['detalle2'].' '.$productos['marca'],
                'type' => $productos['tipo'],
                'sku' => $productos['sku'],
                'regular_price' => $productos['precio_normal'],
                'manage_stock' => 'true',
                'description' => '',
                'short_description' => $productoDescripcion,
                'stock_quantity' => 1,//$productos['cantidad'],
                /* 'categories' => [
                    [
                        'id' => $productos['id_rubro']
                    ]
                ] */
            ];


        echo '<pre>'; print_r($woocommerce->put("products/".$productos['id_wc'],$data)); echo '</pre>';
        ;
        echo "id:".$productos['id']."; id_wc:".$productos['id_wc']."<br>";
        echo "sku:".$productos['sku']."<br>";

        } //FOREACH


        if(substr($_GET['primero'],-1)==0){
            
            $primero = $_GET['primero']+ 20+1;

        }else{

            $primero = $_GET['primero']+ 20;
            
        }
  
        $ultimo = $_GET['ultimo']+20;
        //  index.php?ruta=subirProductos&primero=0&ultimo=20
        $url= "index.php?ruta=actualizarProductosWeb&primero=$primero&ultimo=$ultimo";
   
        echo "
                <script>

                setInterval(() => {
                    //cantidad 0
                    url= `".$url."`
                    window.location= url
                    
                    
                    
                }, 50000);
                
                </script>";

}else{
    echo '<h1>TERMINOSKYYYY</h1>';
}
?>

