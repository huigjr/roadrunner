<?php
class PageController{

  private $page;
  
  public function __construct($slug){
    $this->page = new PageModel($slug);
  }

  public function getData(){
    return $this->page->getPage();
  }
  
  public function getTemplate(){
    return new Template(ROOT.'/views/'.TEMPLATE.'/default.html', $this->getData());
  }
}