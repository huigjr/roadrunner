<?php
class Router{

  private $di;
  private $db;
  
  public $controller;
  public $path;
  
  public function __construct($di){
    $this->di = $di;
    $this->di->get('Session');
    $this->db = $this->di->get('Database', [DB_HOST, DB_NAME, DB_USER, DB_PASS]);
    $this->path = $this->parseUrlPath();
    $this->controller = $this->getController();
  }

  // Check is URL structure meets requirements and return path parts
  private function parseUrlPath(){
    if(isset($_GET['path'])){
      if(substr($_GET['path'],-1) === '/') $this->return404();
      return explode('/', $_GET['path']);
    }
  }
  
  private function getController(){
    if($this->path){
      if(count($this->path) === 1){
        return $this->startController($this->path[0]) ?? $this->startController('page', [$this->path]) ?? null;
      } else {
        $path = array_shift($this->path);
        return $this->startController($path, $this->path[0]) ?? null;
      }
    } else return $this->startController('page', '/');
  }
  
  private function startController($path, $array = null){
    try{
      $class = ucfirst($path).'Controller';
      return new $class($array);
    } catch(Exception $e) {
      return null;
    }
  }

  private function findController(){
    return array_diff(scandir(ROOT.'/controllers/'), array('.', '..'));
  }

  // Return 404 page in case routing cannot be resolved
  private function return404(){
    header("HTTP/1.0 404 Not Found");
    echo '404 Page Not Found';
    exit;
  }
}