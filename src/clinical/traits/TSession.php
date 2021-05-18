<?php

namespace src\clinical\traits;

trait TSession {

    public $session;

    public  function  setSession($session){
        $this->session = $session;
    }

}