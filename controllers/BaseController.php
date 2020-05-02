<?php

class BaseController
{

    protected $di;
    protected $slug;
    protected $model;
    protected $template;
    protected $accesslevel = 0;
    protected $view = 'default.html';

    public function __construct($di, $slug)
    {
        $this->di = $di;
        $this->authorize();
        $this->slug = $slug;
        $this->template = TEMPLATE;
        $this->init();
    }

    public function init()
    {
        // Base function
    }

    public function getResponse()
    {
        return new Template(ROOT . '/views/' . $this->template . '/' . $this->view, (array)$this->model);
    }
    
    protected function authorize()
    {
        return $this->di->get('Security', [$this->di])->authorize($this->accesslevel);
    }
}