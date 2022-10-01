<?php
/**
 * Load parts from  "includes/"
 */

class Load
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
