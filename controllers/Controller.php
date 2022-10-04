<?php

/**
 * This is the base controller,
 * all controllers/*.php inherit this class.
 */

class Controller extends Database
{
    public static function createView(
        $view = "Home",
        $header = "Header",
        $footer = "Footer"
    ) {
        if (isset($_GET["content"])) {
            Req::resource($view);
        } else {
            Req::resource($header);
            Req::resource($view);
            Req::resource($footer);
        }
    }
}