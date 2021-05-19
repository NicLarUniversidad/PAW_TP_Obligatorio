<?php

namespace src\clinical\controllers;

use src\clinical\database\repositories\MedicoRepository;
use src\clinical\services\MedicoService;

class MedicosController extends Controller
{
    public function get(string $notification = null) : void {
        $service = new MedicoRepository($this->logger, $this->connection);
        $medicos = $service->findAll();
        $this->pageFinderService->findFileRute("gestion_medicos","php","php",["abm"],
            ["medicos"=>$medicos, "notification" => $notification], "Gestión médicos");
    }

    public function post() : void {
        $notification = "";
        $nombre = $this->request->get("nombre");
        $apellido = $this->request->get("apellido");
        $cuil = $this->request->get("cuil");
        if (is_null($nombre) || is_null($apellido)) {
            $notification = "Debe ingresar nombre y apellido para registrar un médico";
        } else {
            $service = new MedicoService($this->connection, $this->logger);
            if ($service->create($nombre, $apellido, $cuil)) {
                $notification = "Se ha registrado al médico";
            } else {
                $notification = "No se pudo registrar el médico, contacte con un administrador";
            }
        }
        $this->get($notification);
    }
}