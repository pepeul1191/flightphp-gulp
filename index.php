<?php

require 'app/vendor/autoload.php';

header('x-powered-by: PHP');
header('Server: Ubuntu');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Content-type: text/html; charset=UTF-8');

Configuration::init( 
	realpath(dirname(__FILE__)) . '/app/', // path
	'http://localhost/animalitos/', // base_url
	'http://localhost/animalitos/public/' // static_url
);

Flight::set('flight.views.path', 'app/views');

Flight::route('GET /', array('HomeController','index'));
Flight::route('GET /registro', array('RegistroController','index'));
Flight::route('POST /registro/validar_usuario_repetido', array('RegistroController','validar_usuario_repetido'));
Flight::route('GET /error/404', array('ErrorController','error_404'));

#Flight::route('GET /demo', array('DemoController','hello'));
#Flight::route('POST /demo/params/@id', array('DemoController','parametros'));
Flight::route('GET /demo/db', array('DemoController','listar_usuarios'));
#Flight::route('GET /demo/vista', array('DemoController','vista'));
#Flight::route('GET /demo/partial/@valor', array('DemoController','partial'));
# +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

/*
Flight::map('notFound', function(){
	Flight::redirect('/error/404');
});
*/
Flight::start();

?>