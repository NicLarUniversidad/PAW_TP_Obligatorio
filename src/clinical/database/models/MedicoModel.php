<?php

namespace src\clinical\database\models;

class MedicoModel extends Model
{

    public function __construct()
    {
        $this->setField("id", "");
        $this->setField("nombre", "");
        $this->setField("apellido", "");
        $this->setField("cuit", "");
    }

    public function setNombre(string $nombre) : void {
        $this->setField("nombre", $nombre);
    }

    public function setApellido(string $apellido) : void {
        $this->setField("apellido", $apellido);
    }

    public function setCuil(string $cuil) : void {
        $this->setField("cuit", $cuil);
    }
}