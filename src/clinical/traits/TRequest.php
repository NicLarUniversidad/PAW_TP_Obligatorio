<?php

namespace src\clinical\traits;

use src\clinical\services\RequestService;

trait tRequest {

    public RequestService $request;

    public  function  setRequest(RequestService $request){
        $this->request = $request;
    }

}