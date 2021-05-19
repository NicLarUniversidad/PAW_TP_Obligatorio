<?php

namespace src\clinical\database\models;

use Monolog\Logger;
use PDO;
use src\clinical\database\QueryBuilder;
use src\clinical\exceptions\IndexNotFoundException;
use src\clinical\traits\TConnection;
use src\clinical\traits\TLogger;

class Model
{
    use TLogger;
    use TConnection;

    public static Logger $log;
    public static PDO $pdo;

    public static function init(Logger $log, PDO $connection) {
        Model::$log = $log;
        Model::$pdo = $connection;
    }

    public static function factory(String $className) {
        $path = "src\\clinical\\database\\models\\{$className}";
        $model = new $path();
        $model->setLogger(Model::$log);
        $model->setConnection(Model::$pdo);
        $model->loadQueryBuilder();
        return $model;
    }

    public static function createQueryBuilder() : QueryBuilder {
        return new QueryBuilder(Model::$pdo, Model::$log);
    }

    protected array $tableFields = array();
    protected QueryBuilder $queryBuilder;

    public function getTableFields() : array {
        return $this->tableFields;
    }

    public function setFields(array $fields) : void {
        $this->tableFields = $fields;
    }

    protected function setField(String $field, String $value) : void {
        $this->tableFields[$field] = $value;
    }

    /**
     * @throws IndexNotFoundException
     */
    public function getField(String $field) : String {
        if (array_key_exists($field, $this->tableFields)){
            return $this->tableFields[$field];
        }
        throw new IndexNotFoundException("No halló el indice \"$field\": $this->tableFields");
    }

    public function loadQueryBuilder() : void {
        if (! isset($this->queryBuilder)) {
            if (!is_null($this->logger) && !is_null($this->connection)) {
                $this->queryBuilder = new QueryBuilder($this->connection, $this->logger);
            }
        }
    }
}