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

    public function abmGet() : void {
        $tuples = $this->service->findAll();
        $fields = [
            [
                "name"=>"nombre",
                "type"=>"input",
                "required"=>"true"
            ],
        ];
        $this->pageFinderService->findFileRute("abm","php","php",["abm"],
            [
                "fields" => $fields,
                "tuples" => $tuples,
                "register-url"=>"/gestion_obras_sociales",
                "register-title"=>"Registrar nueva obra social",
                "table-title"=>"Gestión obras sociales"
            ],
            "Gestión obras sociales");
    }

    public function post() {
        $nombre = $this->request->get("nombre");
        if (!is_null($nombre)) {
            $this->service->create($nombre);
        }
        $this->abmGet();
    }
}