<?php

class BaseModel
{

    protected $db;
    protected $di;
    protected $slug;

    public function __construct($di, $slug, $vars = null)
    {
        $this->di = $di;
        $this->slug = $slug;
        $this->db = $this->di->get('Database', [DB_HOST, DB_NAME, DB_USER, DB_PASS]);
        $this->init();
    }

    public function init()
    {
        // Base function
    }

    public function hydrateModel($column = null)
    {
        if (empty($this->slug)) {
            $data = $this->getAll();
            if ($data) $this->list = $data;
            else return false;
        } elseif (!is_array($this->slug) || count($this->slug) === 1) {
            $data = $this->getOneBy($column, $this->slug);
            if ($data) $this->extractToObject($data);
            else return false;
        } else return false;
    }

    protected function getAll()
    {
        return $this->db->getAll("SELECT * FROM `$this->table`");
    }

    protected function getOneBy($column, $id)
    {
        return $this->db->getRow("SELECT * FROM `$this->table` WHERE `$column` = :id", array('id' => $id));
    }

    protected function map($column, $id)
    {
        $this->extractToObject($this->getOneBy($column, $id));
    }

    protected function extractToObject($array)
    {
        foreach ($array as $key => $value) $this->$key = $value;
    }

    protected function return404()
    {
        header("HTTP/1.0 404 Not Found");
        echo '404 Page Not Found';
        exit;
    }
}