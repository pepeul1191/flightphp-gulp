<?php

class RegistroController extends Controller
{
    public static function validar_usuario_repetido()
    {
        $nombre = Flight::request()->data->nombre;
        parent::get_library('httparty');
        $httparty = new Httparty(Configuration::get('accesos') . 'usuario/validar_nombre_repetido?usuario=' . $nombre); 
        $httparty->post();

        echo $httparty->get_rpta();
    }

    public static function validar_correo_repetido()
    {
        $correo = Flight::request()->data->correo;
        parent::get_library('httparty');
        $httparty = new Httparty(Configuration::get('accesos') . 'usuario/validar_correo_repetido?correo=' . $correo); 
        $httparty->post();

        echo $httparty->get_rpta();
    }
}

?>