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
        $id = $this->request->get('id');
        if (isset($id)){
            $medico= $this->service->find($id);
            $this->pageFinderService->findFileRute("profesional","php","php",["profesional"],
            ["medico"=>$medico],
            "Profesional");
        }else{
            $medicos = $this->service->findAll();
            $this->pageFinderService->findFileRute("profesionales","php","php",["profesionales"],
            ["medicos"=>$medicos],
            "Profesionales");
        }    
    }
}