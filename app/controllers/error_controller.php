<?php

class ErrorController extends Controller
{
    public static function error_404()
    {
       $layout_data = array(
            'title' => 'Página no econtrada',
            'css' => 'dist/assets/error.min.css',
            'js' => '',
            'data' => ''
        );

        Flight::render('error/404', array(), 'partial');
        Flight::render('layouts/blank', $layout_data);
    }
}

?>