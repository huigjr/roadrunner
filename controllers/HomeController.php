<?php

class HomeController extends BaseController
{

    protected $view = 'home.html';
    
    public function init()
    {
        $this->model = new PageModel($this->di);
        if(empty($this->slug)){
            $this->model->getOneBy('pageid', 1);
        }
    }

}