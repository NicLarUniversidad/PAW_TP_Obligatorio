<?php

namespace src\clinical\controllers;

use src\clinical\database\models\Model;
use src\clinical\traits\TLogger;

class NuevoTurnoController extends Controller
{
    use TLogger;

    public function get() : void {
        $cssImports = Array();
        $cssImports[] = "nuevo-turno";
        $this->pageFinderService->findFileRute("nuevoTurno","php","php", $cssImports);
    }

    public function post() : void {
        $mensajeError = "";
        
        if (empty($this->request->get("apellido"))) {
            $mensajeError .= "Campo apellido está vacío\n";
        }
        if (empty($this->request->get("nombre"))) {
            $mensajeError .= "Campo nombre está vacío\n";
        }
        if (empty($this->request->get("turno-medico"))) {
            $mensajeError .= "Campo médico está vacío\n";
        }
        if (empty($this->request->get("fecha-turno"))) {
            $mensajeError .= "Campo fecha de turno está vacío\n";
        }
        if (empty($this->request->get("horario-turno"))) {
            $mensajeError .= "Campo horario de turno está vacío\n";
        }
        if ($mensajeError == "") {
            $turno = Model::factory("TurnoModel");
            $turno->setApellido($this->request->get("apellido"));
            $turno->setNombre($this->request->get("nombre"));
            $turno->setTel($this->request->get("tel"));
            $turno->setFechaNacimiento($this->request->get("fecha-nac"));
            $turno->setMedico($this->request->get("turno-medico"));
            $turno->setHorario($this->request->get("fecha-turno"), $this->request->get("horario-turno"));
            $turno->save();
            echo "Guardado";
        }
        else {
            http_response_code(400);
            echo $mensajeError;
        }
    }
}