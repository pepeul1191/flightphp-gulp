<?php

class RegistroController extends Controller
{
    public static function index()
    {
        $menu = array(
            array('url' => '#/', 'nombre' => 'Home'),
            array('url' => '#/buscar', 'nombre' => 'Buscar'),
            array('url' => '#/contacto', 'nombre' => 'Contacto')
        );
        $layout_data = array(
            'title' => 'Bienvenido',
            'css' => 'dist/assets/styles.min.css',
            'js' => 'dist/home/app.min.js',
            'menu' => json_encode($menu),
            'data' => ''
        );
        $partial_data = array('mensaje' => 'Hola mundo');
        Flight::render('registro/index', $partial_data, 'partial');
        Flight::render('layouts/blank', $layout_data);
    }

    public static function validar_usuario_repetido()
    {
        $nombre = Flight::request()->data->nombre;
        parent::get_library('httparty');
        $httparty = new Httparty(Configuration::get('accesos') . 'usuario/validar_nombre_repetido?usuario=' . $nombre); 
        $httparty->post();

        echo $httparty->get_rpta();
    }
}

?>