<?php

namespace src\clinical\database\repositories;

use Monolog\Logger;
use PDO;

class ObraSocialRepository extends Repository
{
    public function __construct(Logger $logger, PDO $connection)
    {
        parent::__construct($logger, $connection, "obra_social", "ObraSocialModel");
    }
}