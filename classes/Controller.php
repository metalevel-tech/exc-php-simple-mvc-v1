<?php
/**
 * This is the base controller
 */

class Controller extends Database
{
    public static function createView($view)
    {
        Load::resource('Header');

        if (file_exists("views/$view.php")) {
            require_once("views/$view.php");
        } else {
            require_once("views/HTTP404.php");
        }

        Load::resource('Footer');
    }
}
