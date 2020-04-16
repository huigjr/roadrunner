<?php
class PageModel{

  private $db;
  private $slug;
  
  public function __construct($slug){
    $this->slug = $slug;
    $this->db = new Connection(DB_HOST, DB_NAME, DB_USER, DB_PASS);
  }

  public function getPage(){
    return $this->db->getRow("SELECT * FROM `pages` WHERE `url` = :url", array('url' => $this->slug));
  }
}