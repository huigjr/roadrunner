<?php

class BlogModel extends BaseModel
{

    public $title = 'Blog';
    public $content = '<a href="blog/youre-not-that-busy">You’re not that busy. Make time for what you love</a>';

    protected $table = 'blog';

    public function init()
    {
        if (isset($_POST['blog'])) $this->updateBlog($this->slug);
        if ($this->slug && is_array($this->slug)) {
            $this->slug = $this->slug[0];
            $result = $this->hydrateModel('url');
        } else {
            $result = $this->hydrateModel('blogid');
        }
        if ($result === false) $this->return404();
    }

    private function updateBlog($id)
    {
        $this->db->dbWrite("UPDATE `blog` SET `title` = :title, `content` = :content WHERE `blogid` = :id", array('title' => $_POST['title'], 'content' => $_POST['content'], 'id' => $id));
        header("Location: /dashboard/blog");
        exit;
    }
}