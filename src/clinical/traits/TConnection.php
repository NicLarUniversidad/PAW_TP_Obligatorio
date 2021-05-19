<?php

namespace src\clinical\traits;

trait TConnection {

    public $connection;

    public  function  setConnection($connection){
        $this->connection = $connection;
    }

}