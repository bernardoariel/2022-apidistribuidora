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
$tabla= "productos_nuevos";
    
$item = "id";
$valor = 'desc'; // asc

$productosNuevos = ControladorProductos::ctrMostrarProducto($tabla,$item,$valor);


$ultimo = $primerValor + 20;
echo $ultimoNuevo.'a';
if($_GET['ultimo']<=479){


    $evaluarPor = 'id';
    $cargarProductos = ControladorProductos::ctrTraerPorductos($tabla,$_GET['primero'],$_GET['ultimo'],$evaluarPor);
    foreach ($cargarProductos as $key => $productos) {
      
        $data = [
            'name' => $productos['nombre'],//$nameWc,//$productos['nombre'].' '.$productos['detalle1'].' '.$productos['detalle2'].' '.$productos['marca'],
            'type' => 'simple',//$productos['tipo'],
            'sku' => $productos['sku'],
            'regular_price' => $productos['importe'],
            'manage_stock' => 'true',
            'description' => '',
            'short_description' => $productos['nombre'],//$productoDescripcion,
            'stock_quantity' => 1,//$productos['cantidad'],
            'categories' => [
                [
                    'id' => $productos['categoria']
                ]
            ]
        ];

        echo 'nombre '. $productos['nombre'].'<br>';
        echo 'sku '. $productos['sku'].'<br>';
        echo 'importe :'. $productos['importe'].'<br>';
        echo 'categoria '. $productos['categoria'].'<br>';
        echo '<pre>'; print_r($woocommerce->post("products",$data)); echo '</pre>';
     
        echo "id:".$productos['id']."; id:".$productos['id']."<br>";
        echo "sku:".$productosNuevos['sku']."<br>";

  } //FOREACH


    if(substr($_GET['primero'],-1)==0){
        
        $primero = $_GET['primero']+ 20+1;

    }else{

        $primero = $_GET['primero']+ 20+1;
        
    }
  
    $ultimo = $_GET['ultimo']+20;
        //  index.php?ruta=subirProductos&primero=0&ultimo=20
        $url= "index.php?ruta=agregarProductosNuevos&primero=$primero&ultimo=$ultimo";
   
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

