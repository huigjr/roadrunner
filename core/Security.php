<?php

class Security
{

    private $di;
    private $session;

    public function __construct($di)
    {
        $this->di = $di;
        $this->session = $this->di->get('Session');
    }

    public function authorize($accesslevel)
    {
        If($accesslevel <= $this->session->getUserlevel()){
            return true;
        } else {
            RedirectHelper::redirect('login');
            echo 'Not Authorized';
            exit;
        }
    }
}