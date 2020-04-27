<?php

class Router
{

    private $di;
    public $controller;

    public function __construct()
    {
        $this->di = new DI();
        $this->di->get('Session');
        $this->controller = $this->getController($this->parseUrlPath());
    }

    // Check is URL structure meets requirements and return path parts
    private function parseUrlPath()
    {
        if (isset($_GET['path'])) {
            if (substr($_GET['path'], -1) === '/') $this->return404();
            return explode('/', $_GET['path']);
        } else return null;
    }

    private function getController($path)
    {
        if ($path) {
            if (count($path) === 1) {
                return $this->startController($path[0]) ?? $this->startController('page', [$path]) ?? null;
            } else {
                $firstpath = array_shift($path);
                return $this->startController($firstpath, $path) ?? null;
            }
        } else return $this->startController('page', '/');
    }

    private function startController($path, $array = null)
    {
        try {
            $class = ucfirst($path) . 'Controller';
            return new $class($this->di, $array);
        } catch (Exception $e) {
            return null;
        }
    }

    // Return 404 page in case routing cannot be resolved
    private function return404()
    {
        header("HTTP/1.0 404 Not Found");
        echo '404 Page Not Found';
        exit;
    }
}