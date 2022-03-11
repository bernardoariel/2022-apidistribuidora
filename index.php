<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
#CONTROLADORES QUE SE USAN:::::::::::::::::::::::::::::
require_once "controladores/plantilla.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/categorias.controlador.php";

#MODELOS QUE SE USAN::::::::::::::::::::::::::::::::::::
require_once "modelos/productos.modelo.php";
require_once "modelos/categorias.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
