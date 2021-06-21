<?php


namespace src\clinical\services;

use Monolog\Logger;
use PDO;
use src\clinical\database\DatabaseService;

class TurnoService extends DatabaseService
{
    public function __construct(PDO $PDO, Logger $logger)
    {
        parent::__construct($PDO, $logger, "TurnoRepository");
    }

    public function getTurnoActual() : array {
        return $this->repository->getTurnoActual();
    }

    public function findActual() : array
    {
        return $this->repository->getTurnoActual();
    }

}