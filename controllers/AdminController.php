<?php
class AdminController extends BaseController{

  public function init(){
    $this->template = 'admin';
    $this->model = new stdClass();
    $this->model->title = 'Admin';
    $this->model->content = '<p>ADMIN</p>';
  }
}