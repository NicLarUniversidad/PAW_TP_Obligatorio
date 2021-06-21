<?php

namespace src\clinical\database\models;

class MedicoModel extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->setField("nombre", "");
        $this->setField("apellido", "");
        $this->setField("cuit", "");
        $this->setField("estado", "");
    }
}