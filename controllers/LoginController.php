<?php

class LoginController extends BaseController
{

    public function init()
    {
        $this->model = new PageModel($this->di);
        if(count($this->slug) === 1){
            is_numeric($this->slug[0]) ? $this->model->getOneBy('pageid', $this->slug[0]) : $this->model->getOneBy('url', $this->slug[0]);
        }
    }

}