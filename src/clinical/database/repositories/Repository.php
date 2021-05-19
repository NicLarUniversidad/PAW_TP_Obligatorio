<?php

namespace src\clinical\database\repositories;

use Monolog\Logger;
use PDO;
use src\clinical\database\models\Model;
use src\clinical\database\QueryBuilder;
use src\clinical\traits\TConnection;
use src\clinical\traits\TLogger;

class Repository
{
    use TLogger;
    use TConnection;
    protected QueryBuilder $queryBuilder;
    protected string $tabla;
    protected string $modelo;

    public function __construct(Logger $logger, PDO $connection, $tabla = "", $modelo = "")
    {
        $this->setLogger($logger);
        $this->setConnection($connection);
        $this->queryBuilder = new QueryBuilder($connection, $logger);
        $this->tabla = $tabla;
        $this->modelo = "src\\clinical\\database\\models\\" . $modelo;
    }
    public function findAll() : array {
        $queryBuilder = Model::createQueryBuilder();
        $turno = new $this->modelo();
        return $queryBuilder->select($turno->getTableFields())
            ->from($this->tabla)
            ->execute($turno->getTableFields());
    }

    public function find($id): array {
        $queryBuilder = Model::createQueryBuilder();
        $turno = new $this->modelo();
        return $queryBuilder->select($turno->getTableFields())
            ->from($this->tabla)
            ->where(["id"=>$id])
            ->execute();
    }

    public function save(Model $model) : void {
        $this->queryBuilder->insert($this->tabla,$model->getTableFields())
            ->execute();
    }

    public function update(Model $model) : void {
        $this->queryBuilder->update($this->tabla, $model->getTableFields())
            ->where(["id"=>$model->getTableFields()["id"]])
            ->execute();
    }

    public function delete(Model $model) : void {
        $this->queryBuilder->delete($this->tabla)
            ->where(["id"=>$model->getTableFields()["id"]])
            ->execute();
    }

    public function getModelo() : ?string {
        return $this->modelo;
    }

    public function createInstance(array $fields = []) : Model {
        $className = $this->getModelo();
        $model = new $className();
        $model->setFields($fields);
        return $model;
    }
}