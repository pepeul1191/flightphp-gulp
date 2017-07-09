<?php

class Controller_Index extends Controller
{
    public static function index()
    {
    	$data = array('title' => 'Bienvenido');
        Flight::render('index/index', $data, 'partial');
        Flight::render('layouts/blank', $data);
    }
}

?>