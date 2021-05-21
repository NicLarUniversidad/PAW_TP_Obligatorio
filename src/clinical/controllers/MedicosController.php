<?php

namespace src\clinical\controllers;

use src\clinical\services\MedicoService;

class MedicosController extends Controller
{
    protected MedicoService $service;

    public function init()
    {
        parent::init();
        $this->service = new MedicoService($this->connection, $this->logger);
    }

    public function get(string $notification = null) : void {
        $tuples = $this->service->findAll();
        $fields = [
            "nombre" => [
                "name"=>"nombre",
                "type"=>"input",
                "required"=>"true"
            ],
            "apellido" => [
                "name"=>"apellido",
                "type"=>"input",
                "required"=>"true"
            ],
            "cuit" => [
                "name"=>"cuit",
                "type"=>"input",
                "required"=>"false"
            ],
        ];
        $this->pageFinderService->findFileRute("abm","php","php",["abm"],
            [
                "notification" => $notification,
                "fields" => $fields,
                "tuples" => $tuples,
                "register-url"=>"/gestion_medicos",
                "register-title"=>"Registrar nuevo médico",
                "table-title"=>"Gestión médicos"
            ],
            "Gestión médicos");
    }

    public function post() : void {
        $nombre = $this->request->get("nombre");
        $apellido = $this->request->get("apellido");
        $cuil = $this->request->get("cuil");
        if (is_null($nombre) || is_null($apellido)) {
            $notification = "Debe ingresar nombre y apellido para registrar un médico";
        } else {
            if ($this->service->create($nombre, $apellido, $cuil)) {
                $notification = "Se ha registrado al médico";
            } else {
                $notification = "No se pudo registrar el médico, contacte con un administrador";
            }
        }
        $this->get($notification);
    }

    public function delete() {
        //TODO: implementar
    }
}