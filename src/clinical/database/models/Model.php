<?php

namespace src\clinical\database\models;

use Monolog\Logger;
use src\clinical\exceptions\IndexNotFoundException;

class Model
{
    public static Logger $logger;
    public static \PDO $pdo;

    public static function init(Logger $log, \PDO $connection) {
        Model::$logger = $log;
        Model::$pdo = $connection;
    }

    public static function factory(String $className) {
        $path = "src\\clinical\\database\\models\\{$className}";
        $model = new $path();
        $model->setLogger(Model::$logger);
        $model->setConnection(Model::$pdo);
        return $model;
    }

    private array $atributos = Array();

    public function save() {

    }

    public function setField(String $field, String $value) : void {
        $this->atributos[$field] = $value;
    }

    /**
     * @throws IndexNotFoundException
     */
    public function getField(String $field) : String {
        if (array_key_exists($field, $this->atributos)){
            return $this->atributos[$field];
        }
        throw new IndexNotFoundException("No halló el indice \"$field\": $this->atributos");
    }
}