<?php

class LoginController extends BaseController
{

    protected $view     = 'login.html';

    public function init()
    {
        $this->template = 'admin';
        if(empty($this->slug)){
            $this->model = new stdClass();
            $this->model->title = 'Login';
            $this->model->content = '<h2>Login</h2>';
        }
    }
}