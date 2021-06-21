<?php

namespace src\clinical\database\repositories;

use Monolog\Logger;
use PDO;

class TurnoRepository extends Repository
{
    public function __construct(Logger $logger, PDO $connection)
    {
        parent::__construct($logger, $connection, "turnos", "TurnoModel");
    }

    public function getTurnoActual(): array
    {
        $ahora = strtotime("Now");
        return $this->queryBuilder->select()->between("horario_turno", $ahora)->execute();
    }
}