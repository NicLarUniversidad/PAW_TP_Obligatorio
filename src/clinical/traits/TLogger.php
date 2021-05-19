<?php

namespace src\clinical\traits;

use Monolog\Logger;

trait TLogger {

    public Logger $logger;

    public  function  setLogger(Logger $logger){
        $this->logger = $logger;
    }

}
