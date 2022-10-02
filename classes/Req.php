<?php
/**
 * Req - require/load parts from includes/*.php
 */

class Req
{
    public static function resource($name)
    {
        $resource = "includes/$name.php";

        if (file_exists($resource)) {
            require($resource);
        } else {
            echo "The required resource '$resource' doesn't exist";
        }
    }
}
