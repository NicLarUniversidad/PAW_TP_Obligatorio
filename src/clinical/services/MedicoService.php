<?php

namespace src\clinical\services;

use Exception;
use Monolog\Logger;
use PDO;
use src\clinical\database\DatabaseService;

class MedicoService extends DatabaseService
{
    public function __construct(PDO $PDO, Logger $logger)
    {
        parent::__construct($PDO, $logger, "MedicoRepository");
    }

    public function create($nombre, $apellido, $cuil) : bool
    {
        try {
            $medico = $this->repository->createInstance([
                "nombre"=>$nombre,
                "apellido"=>$apellido,
                "cuit"=>$cuil
            ]);
            $this->repository->save($medico);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}