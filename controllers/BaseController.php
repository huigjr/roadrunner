<?php
class BaseController{

  protected $di;
  protected $slug;
  protected $args;
  protected $model;
  protected $template;
  protected $view = 'default.html';
  
  public function __construct($di, $slug, $args=null){
    $this->di = $di;
    $this->slug = $slug;
    $this->args = $args;
    $this->template = TEMPLATE;
    $this->init();
  }

  public function init(){
    // Base function
  }

  public function getTemplate(){
    return new Template(ROOT.'/views/'.$this->template.'/'.$this->view, (array)$this->model);
  }
}