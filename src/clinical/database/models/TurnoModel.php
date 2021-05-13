<?php

namespace src\clinical\database\models;

use src\clinical\database\QueryBuilder;

class TurnoModel extends Model
{
    public static function findAll() : array {
        $queryBuilder = new QueryBuilder(Model::$pdo, Model::$log);
        $turno = new TurnoModel();
        return $queryBuilder->select($turno->tableFields)
                    ->from("turnos")
                    ->execute();
    }

    public function __construct()
    {
        $this->setField("id-medico", "");
        $this->setField("nombre-paciente", "");
        $this->setField("apellido-paciente", "");
        $this->setField("tel-paciente", "");
        $this->setField("edad-paciente", "");
        $this->setField("horario-turno", "");
    }

    public function save() : void {
        $this->queryBuilder->insert("turno",$this->tableFields)
            ->execute();
    }

    public function update() : void {
        $this->queryBuilder->update("turnos", $this->tableFields)
            ->where(["id"=>$this->tableFields["id"]])
            ->execute();
    }

    public function delete() : void {
        $this->queryBuilder->delete("turnos")
            ->execute();
    }


}