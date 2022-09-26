<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);



/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// 1ro:LO QUE SE VE EN LA RUTA, 2do:EL CONTROLADOR, 3ro:FUNCION DEL CONTROLADOR

//Nav principal de visitante y usuario
$routes->get('index', 'Home::index');
$routes->get('somos', 'Home::quienes');
$routes->get('comercializacion', 'Home::comerc');
$routes->get('terminos_usos', 'Home::term_us');
$routes->get('tips', 'Home::tips');

//Vistas estáticas
//$routes->get('mates', 'Home::f_mates');
//$routes->get('bombillas', 'Home::f_bombillas');
//$routes->get('termos', 'Home::f_termos');

//CONSULTA
$routes->get('contacto', 'ConsultaController::contacto');
$routes->post('registro_consulta', 'ConsultaController::f_registrar_consulta');
$routes->get('listado_consultas', 'ConsultaController::f_listar_consulta');

//REGISTRAR USUARIO
$routes->get('registrarse', 'ClienteController::f_registrarse');
$routes->post('registro_cliente', 'ClienteController::f_registrar_cliente');

//SESION USUARIO
$routes->get('iniciar_sesion', 'ClienteController::f_iniciar');
$routes->post('inicio_cliente', 'ClienteController::f_iniciar_cliente');
$routes->get('logout', 'ClienteController::cerrar_sesion');
$routes->get('user_admin', 'AdminController::admin');

//PRODUCTO
$routes->get('agregar_producto', 'ProductoController::f_agregar');
$routes->post('agrego_producto', 'ProductoController::f_agregar_producto');

$routes->get('listar_producto', 'ProductoController::gestionar_producto');

$routes->post('editar', 'ProductoController::editar_producto');
$routes->get('editar/(:num)', 'ProductoController::editar_producto/$1');
$routes->get('actualizar/(:num)', 'ProductoController::actualizar_producto/$1');
$routes->get('actualizar_producto', 'ProductoController::actualizar_producto');


$routes->get('listar_productos', 'Home::f_listar_productos');
$routes->get('listar_productos_admi', 'Home::f_listar_productos_admi');

$routes->get('carrito', 'CarritoController::agregar_carrito');

$routes->get('ver_carrito', 'CarritoController::index');

$routes->post('mostrar_por_categoria', 'ProductoController::categoria_productos');


$routes->get('listar_ventas', 'VentaController::f_listar_ventas');
$routes->get('ver_detalle_venta/(:num)', 'VentaController::f_venta_detalle/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
