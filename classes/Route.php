<?php
// The state of the file at Stage-1-Routing
class Route {
    public static $valid_routes = [];

    public static function set($route, $function) {
        self::$valid_routes[] = $route;

        // Just output the valid routes for a test
        print_r(self::$valid_routes);
    }
}
?>