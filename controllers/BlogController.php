<?php

class BlogController extends BaseController
{

    public function init()
    {
        $this->model = new BlogModel($this->di);
        if(empty($this->slug)){
            $this->model->getList();
            $this->view = 'bloglist.html';
        }
        elseif(count($this->slug) === 1){
            is_numeric($this->slug[0]) ? $this->model->getOneBy('blogid', $this->slug[0]) : $this->model->getOneBy('url', $this->slug[0]);
        }
    }
}
