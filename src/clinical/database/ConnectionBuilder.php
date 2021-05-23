<?php

namespace src\clinical\database;

use PDO;
use PDOException;
use src\clinical\config\Config;
use src\clinical\traits\TLogger;

class ConnectionBuilder
{
    use TLogger;

    public  function make(Config $config):PDO
    {
        try {
            $adapter = $config->get('DB_ADAPTER');
            $hostname = $config->get('DB_HOSTNAME');
            $dbname = $config->get('DB_DBNAME');
            $port = $config->get('DB_PORT');
            $charset = $config->get('DB_CHARSET');
            return new PDO(
                "{$adapter}:host={$hostname};dbname={$dbname};port={$port};charset={$charset}",
                $config->get('DB_USERNAME'),
                $config->get('DB_PASSWORD'),
                [
                    'options'=>[
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                    ]
                ]
            );
        }catch (PDOException $e){
            $this->logger->error('Internal Server Error', ["Error"=>$e]);
            die("ERROR INTERNO - BASE DE DATOS - CONSULTE AL ADMINISTRADOR");
        }
    }
}