<?php

class ErrorController extends Controller
{
    public static function error_404()
    {
        Flight::view()->assign('partial', 'error/404.tpl');
        Flight::view()->display('layouts/blank.tpl');
    }
}

?>