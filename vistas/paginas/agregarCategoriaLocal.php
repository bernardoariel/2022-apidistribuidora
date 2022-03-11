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

?>


<?php
    // for ($i=1; $i < 250 ; $i++) { 
    //     # code...
    // }
    //$woocommerce->get('products',['id' => 3658]);


// $productos=$woocommerce->get('products',['id' => 3658]);
// echo '<pre>'; print_r($productos); echo '</pre>';

// echo '<pre>'; print_r($productos[0]->categories[0]->id); echo '</pre>';
// echo '<pre>'; print_r($productos[0]->categories[0]->name); echo '</pre>';

// $woocommerce->get('products/categories', array( 'per_page' => 99 ) );
               
// echo '<pre>'; print_r($woocommerce->get('products/categories',array( 'per_page' => 99 ))); echo '</pre>';


$categorias = $woocommerce->get('products/categories',array( 'per_page' => 99 ));
// echo '<pre>'; print_r($categorias); echo '</pre>';


foreach ($categorias as $key => $value) {
 
    // echo '<pre>'; print_r($value['id'].'-'.$value['name']); echo '</pre>';
   $agregoCategoria= ControladorCategorias::ctrAgregarCategoria('categorias',$value->id,$value->name);
    
}
 

?>