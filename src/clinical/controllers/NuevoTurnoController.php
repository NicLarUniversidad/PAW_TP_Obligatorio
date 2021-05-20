<?php

namespace src\clinical\controllers;

use src\clinical\database\models\Model;
use src\clinical\database\repositories\TurnoRepository;
use src\clinical\services\FileService;
use src\clinical\services\MedicoService;

class NuevoTurnoController extends Controller
{
    protected TurnoRepository $turnoRepository;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->turnoRepository = new TurnoRepository($this->logger, $this->connection);
    }

    public function get() : void {
        $cssImports = Array();
        $cssImports[] = "nuevo-turno";
        $medicosService = new MedicoService($this->connection,$this->logger);
        $medicos = $medicosService->findAll();
        $this->pageFinderService->findFileRute("nuevoTurno","php","php", $cssImports,
            [
                "medicos"=>$medicos
            ],
            "Nuevo turno");
    }

    public function post() : void {
        $mensajeError = "";
        //var_dump($_FILES);
        //return;
        $archivo = $_FILES['archivo'];
        $tel = $this->request->get("tel");
        $mail = $this->request->get("email");
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
        //TODO: validar esto
        if (!is_null($mail)) {
            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $mensajeError .= "Mail con formato inválido\n";
            }
        }
        if (!is_null($tel)) {
            //$valid = true; //TODO: quitar comentario...
            if (is_numeric($tel)) {
                //TODO: validar formato de teléfono
                $valid = true; //TODO: quitar esto, lo pongo para que no chille el IDE...
            }
            else {
                $valid = false;
            }
            if (!$valid) {
                $mensajeError .= "Campo horario de turno está vacío\n";
            }
        }
        if ($archivo) {
            if (!(($archivo['type'] == "image/png") || ($archivo['type'] != "image/jpg"))) {
                $mensajeError .= "la imagen de no tiene formato correctos.\n";
            }
        }
        if ($mensajeError == "") {
            //TODO: Validar disponibilidad de turno
            $medico = $this->request->get("turno-medico");
            $dia = $this->request->get("fecha-turno");
            $horario = $this->request->get("horario-turno");
            $horarioFolder = str_replace(":", "", $horario);
            $extension = pathinfo($archivo["name"], PATHINFO_EXTENSION);
            $file = "documentos/$medico/$dia/$horarioFolder.$extension";
            $path = "documentos/$medico/$dia";
            $fileService = new FileService();
            $saved = $fileService->save($medico, $path, $file, $archivo, file_get_contents($archivo['tmp_name']));
            if(!$saved){
                echo "Archivo ya existe";
                return;
            }
            $turno = Model::factory("TurnoModel");
            $turno->setApellido($this->request->get("apellido"));
            $turno->setNombre($this->request->get("nombre"));
            $turno->setTel($this->request->get("tel"));
            $turno->setFechaNacimiento($this->request->get("fecha-nac"));
            $turno->setMedico($medico);
            $turno->setHorario($dia, $horario);
            $turno->save();
            echo "Guardado";
        }
        else {
            http_response_code(400);
            echo $mensajeError;
        }
    }
}