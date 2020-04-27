<?php

class Session
{

    private $userid = 0;
    private $userlevel = 0;
    private $currentpage;
    private $previouspage;

    public function __construct()
    {
        $this->startSession();
        $this->setPages();
    }

    public function setUserlevel($level)
    {
        $this->userlevel = $level;
        $_SESSION['userlevel'] = $level;
    }

    public function getUserlevel()
    {
        return $this->userlevel;
    }

    private function startSession()
    {
        foreach ($_SESSION as $key => $value) {
            $this->$key = $value;
        }
    }

    private function setPages()
    {
        $this->previouspage = $_SESSION['previouspage'] = $this->currentpage;
        $currentpage = $_SESSION['currentpage'] = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }
}