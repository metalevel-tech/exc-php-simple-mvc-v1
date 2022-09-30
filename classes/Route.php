<?php
// The state of the file at Stage-2-1-Controllers
class Route {
    public static $valid_routes = [];

    public static function set($route, $function) {
        self::$valid_routes[] = $route;

        if ($_GET['url'] == $route) {
            $function->__invoke();
        }
    }
}
?>