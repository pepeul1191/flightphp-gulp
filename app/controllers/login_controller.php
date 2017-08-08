<?php

class LoginController extends Controller
{
    public static function index()
    {
        $layout_data = array(
            'modal_title' => 'Login',
            'modal_css' => 'assets/login/index.css',
            'modal_js' => 'dist/app.min.js',
            'modal_data' => ''
        );
        $partial_data = array('mensaje' => 'Hola mundo');
        Flight::render('login/index', $partial_data, 'partial');
        Flight::render('layouts/login', $layout_data);
    }
}

?>