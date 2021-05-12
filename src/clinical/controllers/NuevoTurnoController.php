<?php

namespace src\clinical\controllers;

use src\clinical\database\models\Model;

class NuevoTurnoController extends Controller
{
    public function get() : void {
        $cssImports = Array();
        $cssImports[] = "nuevo-turno";
        $this->pageFinderService->findFileRute("nuevoTurno","php","php", $cssImports);
    }

    public function put() : void {
        $mensajeError = "";
        if (is_null($this->request->get("apellido"))) {
            $mensajeError .= "Campo apellido está vacío\n";
        }
        if (is_null($this->request->get("nombre"))) {
            $mensajeError .= "Campo nombre está vacío\n";
        }
        if (is_null($this->request->get("turno-medico"))) {
            $mensajeError .= "Campo médico está vacío\n";
        }
        if (is_null($this->request->get("fecha-turno"))) {
            $mensajeError .= "Campo fecha de turno está vacío\n";
        }
        if (is_null($this->request->get("horario-turno"))) {
            $mensajeError .= "Campo horario de turno está vacío\n";
        }
        if ($mensajeError != "") {
            $turno = Model::factory("Turno");
            $turno->setField("apellido", $this->request->get("apellido"));
            $turno->setField("nombre", $this->request->get("nombre"));
            $turno->setField("tel", $this->request->get("tel"));
            $turno->setField("fecha-nac", $this->request->get("fecha-nac"));
            $turno->setField("turno-medico", $this->request->get("turno-medico"));
            $turno->setField("fecha-turno", $this->request->get("fecha-turno"));
            $turno->setField("horario-turno", $this->request->get("horario-turno"));
            $turno->save();
            echo "Guardado";
        }
        else {
            http_response_code(400);
            echo $mensajeError;
        }
    }
}