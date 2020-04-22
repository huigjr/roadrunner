<?php
class PageController extends BaseController{

  public function init(){
    $this->model = new PageModel($this->di, $this->slug);
  }

}