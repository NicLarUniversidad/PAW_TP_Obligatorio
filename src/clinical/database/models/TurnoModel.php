<?php

namespace src\clinical\database\models;

class TurnoModel extends Model
{
    /*public static function findAll() : array {
        $queryBuilder = Model::createQueryBuilder();
        $turno = new TurnoModel();
        return $queryBuilder->select($turno->tableFields)
                    ->from("turnos")
                    ->execute();
    }

    public static function find($id) : TurnoModel {
        $queryBuilder = Model::createQueryBuilder();
        $turno = new TurnoModel();
        return $queryBuilder->select($turno->tableFields)
            ->from("turnos")
            ->where(["id"=>$id])
            ->execute()[0];
    }*/

    public function __construct()
    {
        $this->setField("id_medico", "");
        $this->setField("nombre_paciente", "");
        $this->setField("apellido_paciente", "");
        $this->setField("tel_paciente", "");
        $this->setField("edad_paciente", "");
        $this->setField("horario_turno", "");
    }

    public function setMedico(string $value) : TurnoModel {
        $this->setField("id_medico", $value);
        return $this;
    }

    public function setNombre(string $value) : TurnoModel {
        $this->setField("nombre_paciente", $value);
        return $this;
    }

    public function setApellido(string $value) : TurnoModel {
        $this->setField("apellido_paciente", $value);
        return $this;
    }

    public function setTel(string $value) : TurnoModel {
        $this->setField("tel_paciente", $value);
        return $this;
    }

    public function setFechaNacimiento(string $value) : TurnoModel {
        $this->setField("edad_paciente", $value);
        return $this;
    }

    public function setHorario($day, $hour) : TurnoModel {
        $value = date($day . " " . $hour);
        $this->setField("horario_turno", $value);
        return $this;
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