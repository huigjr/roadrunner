<?php

class RedirectHelper
{

    public static function pageNotFound()
    {
        header("HTTP/1.0 404 Not Found");
        echo '404 Page Not Found';
        exit;
    }

    public static function redirect($url)
    {
        header("Location: $url");
        exit;
    }

    public static function maintenance()
    {
        header("HTTP/1.1 503 Service Unavailable");
        header("Status: 503 Service Unavailable");
        header("Retry-After: 3600");
        echo 'At this moment schuduled mainenance is taking place. The website will be back online shortly.';
        exit;
    }
}