<?php
class BlogModel extends BaseModel{

  public $title   = 'Blog';
  public $content = '<a href="blog/youre-not-that-busy">You’re not that busy. Make time for what you love</a>';
  
  public function init(){
    if($this->slug) $this->map("SELECT * FROM `blog` WHERE `url` = :url");
  }
}