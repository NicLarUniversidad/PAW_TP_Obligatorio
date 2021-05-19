<?php

namespace src\clinical\services;

use Monolog\Logger;
use PDO;
use src\clinical\database\DatabaseService;

class ObraSocialService extends DatabaseService
{
    public function __construct(PDO $PDO, Logger $logger)
    {
        parent::__construct($PDO, $logger, "ObraSocialRepository");
    }

    public function create(string $nombre) : void
    {
        $obraSocial = $this->repository->createInstance(["nombre"=>$nombre]);
        $this->repository->save($obraSocial);
    }
}