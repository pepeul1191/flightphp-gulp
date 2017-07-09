<?php

class HomeController extends Controller
{
    public static function index()
    {
        $layout_data = array(
            'title' => 'Bienvenido',
            'css' => 'dist/assets/styles.min.css',
            'js' => 'dist/home/app.min.js');
        $partial_data = array('mensaje' => 'Hola mundo');
        Flight::render('home/index', $partial_data, 'partial');
        Flight::render('layouts/blank', $layout_data);
    }
}

?>