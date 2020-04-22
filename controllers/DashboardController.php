<?php
class DashboardController extends BaseController{

  public function init(){
    $this->template = 'admin';
    $this->getModel();
  }
  
  private function getModel(){
    if(empty($this->slug)) $this->makeHome();
    else{
      $model = array_shift($this->slug);
      $model = str_replace('cms','page',$model);
      $this->view = $this->slug ? $model.'edit.html' : $model.'list.html';
      $model = ucfirst($model).'Model';
      $this->model = new $model($this->di, $this->slug);
    }
  }
  
  private function makeHome(){
    $this->model = new stdClass();
    $this->model->title = 'Dashboard';
    $this->model->content = '<h2>Dashboard</h2>';
  }
}