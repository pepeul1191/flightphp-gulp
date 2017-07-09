<?php

require 'app/vendor/autoload.php';

header('x-powered-by: PHP');
header('Server: Ubuntu');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Content-type: text/html; charset=UTF-8');

Configuration::init( 
	realpath(dirname(__FILE__)) . '/app/', // path|
	'http://localhost:5001/' // base_url
);

Flight::set('flight.views.path', 'app/views');

Flight::route('GET /', array('Controller_Index','index'));
Flight::route('GET /error/404', array('Controller_Error','error_404'));

#Flight::route('GET /demo', array('Controller_Demo','hello'));
#Flight::route('POST /demo/params/@id', array('Controller_Demo','parametros'));
Flight::route('GET /demo/db', array('Controller_Demo','listar_usuarios'));
#Flight::route('GET /demo/vista', array('Controller_Demo','vista'));
#Flight::route('GET /demo/partial/@valor', array('Controller_Demo','partial'));
# +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

/*
Flight::map('notFound', function(){
	Flight::redirect('/error/404');
});
*/
Flight::start();

?>