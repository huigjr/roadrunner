<?php
class AdminController extends BaseController{

  protected $template = 'admin';
  protected $view     = 'default.html';
  
  public function init(){
    //$this->model = new PageModel($this->di, $this->slug);
    $this->model = new \stdClass();
  }
}