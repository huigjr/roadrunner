<?php
class PageModel extends BaseModel{

  protected $table = 'pages';
  
  public function init(){
    $result = $this->slug && is_string($this->slug) ? $this->hydrateModel('url') : $this->hydrateModel('pageid');
    if(!empty($this->list)) $this->title = 'CMS';
    if($result === false) $this->return404();
  }
}