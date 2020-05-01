<?php

class BaseController
{

    protected $di;
    protected $slug;
    protected $model;
    protected $template;
    protected $view = 'default.html';

    public function __construct($di, $slug)
    {
        $this->di = $di;
        $this->slug = $slug;
        $this->template = TEMPLATE;
        $this->init();
    }

    public function init()
    {
        // Base function
    }

    public function getTemplate()
    {
        return new Template(ROOT . '/views/' . $this->template . '/' . $this->view, (array)$this->model);
    }
}