<?php
class BlogModel{

  private $db;
  private $slug;
  
  public function __construct($slug){
    $this->slug = $slug;
    $this->db = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASS);
  }

  public function getPage(){
    if($this->slug){
      return $this->db->getRow("SELECT * FROM `blog` WHERE `url` = :url", array('url' => $this->slug));
    } else {
      return ['title' => 'Blog', 'content' => '<a href="blog/youre-not-that-busy">You’re not that busy. Make time for what you love</a>'];
    }
  }
}