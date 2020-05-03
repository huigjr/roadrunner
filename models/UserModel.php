<?php

class UserModel extends BaseModel
{

    protected $table = 'users';
    protected $returnurl = '/dashboard';
    
    public function authenticate()
    {
        $this->db->getRow("SELECT * FROM `$this->table` WHERE `username` = :username AND `password` = :password", array('username' => $username, 'password' => $password))
    }
}