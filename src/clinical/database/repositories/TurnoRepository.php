<?php

namespace src\clinical\database\repositories;

use Monolog\Logger;
use PDO;
use src\clinical\database\models\Model;
use src\clinical\database\models\TurnoModel;
use src\clinical\database\QueryBuilder;
use src\clinical\traits\TConnection;
use src\clinical\traits\TLogger;

class TurnoRepository
{
    use TLogger;
    use TConnection;
    protected QueryBuilder $queryBuilder;

    public function __construct(Logger $logger, PDO $connection)
    {
        $this->setLogger($logger);
        $this->setConnection($connection);
        $this->queryBuilder = new QueryBuilder($connection, $logger);
    }
    public function findAll() : array {
        $queryBuilder = Model::createQueryBuilder();
        $turno = new TurnoModel();
        return $queryBuilder->select($turno->getTableFields())
            ->from("turnos")
            ->execute();
    }

    public function find($id) : TurnoModel {
        $queryBuilder = Model::createQueryBuilder();
        $turno = new TurnoModel();
        return $queryBuilder->select($turno->getTableFields())
            ->from("turnos")
            ->where(["id"=>$id])
            ->execute()[0];
    }

    public function save(TurnoModel $turno) : void {
        $this->queryBuilder->insert("turno",$turno->getTableFields())
            ->execute();
    }

    public function update(TurnoModel $turno) : void {
        $this->queryBuilder->update("turnos", $turno->getTableFields())
            ->where(["id"=>$turno->getTableFields()["id"]])
            ->execute();
    }

    public function delete(TurnoModel $turno) : void {
        $this->queryBuilder->delete("turnos")
            ->where(["id"=>$turno->getTableFields()["id"]])
            ->execute();
    }
}