<?php


namespace src\clinical\controllers;


use src\clinical\services\ObraSocialService;

class ObrasSocialesController extends Controller
{

    protected ObraSocialService $service;

    public function init()
    {
        parent::init();
        $this->service = new ObraSocialService($this->connection,$this->logger);
    }

    public function get() : void {
        $obrasSociales = $this->service->findAll();
        $this->pageFinderService->findFileRute("obrasSociales", "php","php", ["obrasSociales"],
            ["obras_sociales"=>$obrasSociales], "Obras sociales");
    }
}