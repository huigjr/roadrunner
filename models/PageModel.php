<?php
class PageModel extends BaseModel{

  protected $table = 'pages';
  
  public function init(){
    if(isset($_POST['page'])) $this->updatePage($this->slug);
    $result = $this->slug && !is_numeric($this->slug) ? $this->hydrateModel('url') : $this->hydrateModel('pageid');
    if(!empty($this->list)) $this->title = 'CMS';
    if($result === false) $this->return404();
  }
  
  private function updatePage($id){
    $this->db->dbWrite("UPDATE `pages` SET `title` = :title, `content` = :content WHERE `pages`.`pageid` = :id", array('title' => $_POST['title'],'content' => $_POST['content'],'id' => $id));
    header("Location: /dashboard/cms");
    exit;
  }
}