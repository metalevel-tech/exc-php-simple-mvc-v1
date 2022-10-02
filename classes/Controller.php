<?php
/**
 * This is the base controller,
 * all controllers/*.php inherit this class.
 */

class Controller extends Database
{
    public static function createView($view)
    {
        Req::resource('Header');

        if (file_exists("views/$view.php")) {
            require_once("views/$view.php");
        } else {
            require_once("views/HTTP404.php");
        }

        Req::resource('Footer');
    }
}