<?php


namespace src\clinical\controllers;


use src\clinical\services\MedicoService;

class ProfesionalesController extends Controller
{

    protected MedicoService $service;

    public function init()
    {
        parent::init();
        $this->service = new MedicoService($this->connection,$this->logger);
    }

    public function get() : void {
        $medicos = $this->service->findAll();
        $this->pageFinderService->findFileRute("profesionales","php","php",["profesionales"],
        ["medicos"=>$medicos],
        "Profesionales");
    }
}