<?php
class BlogModel extends BaseModel{

  public $title   = 'Blog';
  public $content = '<a href="blog/youre-not-that-busy">You’re not that busy. Make time for what you love</a>';
  
  protected $table = 'blog';

  public function init(){
    if($this->slug && is_array($this->slug)){
      $this->slug = $this->slug[0];
      $result = $this->hydrateModel('url');
    } else {
      $result = $this->hydrateModel('blogid');
    }
    if($result === false) $this->return404();
  }
}