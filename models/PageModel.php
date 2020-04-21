<?php
class PageModel extends BaseModel{

  public function init(){
    if($this->slug) $this->map("SELECT * FROM `pages` WHERE `url` = :url");
  }
}