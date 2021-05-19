<?php

namespace src\clinical\database\models;

class ObraSocialModel extends Model
{
    public function __construct()
    {
        $this->setField("id", "");
        $this->setField("nombre", "");
    }
}