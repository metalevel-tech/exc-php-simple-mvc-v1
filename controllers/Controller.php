<?php
// The state of the file at Stage-4-1-Databases
/**
 * This is the base controller.
 */

 class Controller {
    public static function CreateView($view) {
        if (file_exists("views/$view.php")) {
            require_once("views/$view.php");
        } else {
            require_once("views/HTTP404.php");
        }
    }
 }

 ?>