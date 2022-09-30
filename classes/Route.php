<?php
// The state of the file at Stage-4-2-Databases
class Route
{
    public static $valid_routes = [];

    public static function set($route, $function)
    {
        self::$valid_routes[] = $route;

        if ($_GET['url'] == $route) {
            $function->__invoke();
            die("Unable to connect to given site.");
        }
    }

    public static function list()
    {
        return self::$valid_routes;
    }
}
