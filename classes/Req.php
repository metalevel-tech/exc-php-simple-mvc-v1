<?php

/**
 * Req - require/load parts from includes/*.php and views/*.php
 */

class Req
{
    public static function resource($resource, $paths = ["includes", "views"])
    {
        $file = self::findRecursive($resource, $paths);

        if (file_exists($file)) {
            require($file);
        } else {
            echo "Error: File not found: $resource";
        }
    }

    // The current method in use
    private static function findRecursive($resource, $paths = ["includes", "views"])
    {
        foreach ($paths as $path) {
            $iterator = new RecursiveDirectoryIterator("$path");

            foreach (new RecursiveIteratorIterator($iterator) as $file) {
                if (strpos($file, $resource) !== false) {
                    return $file; // break; the foreach loop and exit the function
                }
            }
        }
    }

    // A method that works for exact matches, but is not in use
    private static function findExact($resource, $paths = ["includes", "views"])
    {
        foreach ($paths as $path) {
            $file = "$path/$resource";

            if (file_exists($file)) {
                return $file; // break; the foreach loop and exit the function
            }
        }
    }
}
