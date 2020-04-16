<?php
class Router{

  private $controllerdir = ROOT.'/controllers/';
  
  public $path;
  
  public function __construct(){
    $this->path = $this->parseUrlPath();
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
        return $this->startController($this->path) ?? $this->startController('page', [$this->path]) ?? null;
      } else {
        $path = array_shift($this->path);
        return $this->startController($path, $this->path) ?? null;
      }
    }
  }
  
  private function startController($path, $array = null){
    try{
      return new ucfirst($path).'Controller'($array);
    } catch(Exception $e) {
      return null;
    }
  }

  private function findController(){
    return array_diff(scandir($this->controllerdir), array('.', '..'));
  }

  // Return 404 page in case routing cannot be resolved
  private function return404(){
    header("HTTP/1.0 404 Not Found");
    echo '404 Page Not Found';
    exit;
  }
}