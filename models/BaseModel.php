<?php
class BaseModel{

  protected $db;
  protected $di;
  protected $slug;

  public function __construct($di, $slug){
    $this->di   = $di;
    $this->slug = $slug;
    $this->db   = $this->di->get('Database', [DB_HOST, DB_NAME, DB_USER, DB_PASS]);
    $this->init();
  }

  public function init(){
    // Base function
  }

  protected function map($query){
    $this->extractToObject($this->db->getRow($query, array('url' => $this->slug)));
  }

  protected function extractToObject($array){
    foreach($array as $key => $value) $this->$key = $value;
  }
}