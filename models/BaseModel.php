<?php

class BaseModel
{

    protected $db;
    
    public function __construct($di)
    {
        $this->db = new SqlDatabase(DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }

    public function getList()
    {
        $this->title = ucfirst($this->table);
        $this->list = $this->db->getAll("SELECT * FROM `$this->table`");
    }

    public function getOneBy($column, $id)
    {
        $this->extractToObject( $this->db->getRow("SELECT * FROM `$this->table` WHERE `$column` = :id", array('id' => $id)) );
    }

    public function create()
    {
        $this->db->dbWrite(
            "INSERT INTO `$this->table` (`url`, `title`, `content`) VALUES (:url, :title, :content);",
            array('url' => $this->slugify($_POST['title']), 'title' => $_POST['title'], 'content' => $_POST['content'])
        );
        header("Location: $this->returnurl");exit;
    }

    public function update($id)
    {
        $this->db->dbWrite(
            "UPDATE `$this->table` SET `title` = :title, `content` = :content WHERE `pages`.`pageid` = :id", 
            array('title' => $_POST['title'], 'content' => $_POST['content'], 'id' => $id)
        );
        header("Location: $this->returnurl");exit;
    }
    
    protected function slugify($string)
    {
        $string = preg_replace("/[^a-z0-9 ]/", "", strtolower($string));
        return str_replace('-', '', trim($string));
    }
    
    protected function extractToObject($array)
    {
        foreach ($array as $key => $value) $this->$key = $value;
    }
}