<?php

class DashboardController extends BaseController
{

    protected $accesslevel = 0;

    public function init()
    {
        $this->template = 'admin';
        if (empty($this->slug)) $this->model = $this->getModel();
        elseif(count($this->slug) === 1){
            $this->model = $this->getModel($this->slug[0]);
            $this->model->getlist();
            $this->view = $this->slug[0] . 'list.html';
        } elseif(count($this->slug) === 2){
            $this->model = $this->getModel($this->slug[0]);
            $this->view = $this->slug[0] . 'edit.html';
            if(is_numeric($this->slug[1])){
                if($_POST) $this->model->update($this->slug[1]);
                $this->model->getOneBy($this->slug[0] . 'id', $this->slug[1]);
            } elseif($this->slug[1] === 'new'){
                if($_POST) $this->model->create();
                $this->model->title = 'New ' . $this->slug[0];
                $this->model->content = '';
            }
        }
    }

    private function getModel($model = null, $array = null)
    {
        if(!$model){
            $model = new stdClass();
            $model->title = 'Dashboard';
            $model->content = '<h2>Dashboard</h2>';
        } else {
            $this->authorizeModels($model);
            $model = $model === 'cms' ? $this->slug[0] = 'page' : $model;
            $model = ucfirst($model) . 'Model';
            $model = new $model($this->di);
        }
        return $model;
    }
    
    private function authorizeModels($model)
    {
        $array = [
            ['model' => 'page', 'access' => 0],
            ['model' => 'blog', 'access' => 2],
        ];
        foreach($array as $item) if($item['model'] == $model) $this->accesslevel = $item['access'];
        return $this->di->get('Security', [$this->di])->authorize($this->accesslevel);
    }
}