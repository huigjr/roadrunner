<?php

class RedirectHelper
{

    public static function pageNotFound()
    {
        header("HTTP/1.0 404 Not Found");
        echo '404 Page Not Found';
        exit;
    }
}