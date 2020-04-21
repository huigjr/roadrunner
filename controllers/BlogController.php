<?php
class BlogController extends BaseController{

  public function init(){
    $this->model = new BlogModel($this->di, $this->slug);
  }
}