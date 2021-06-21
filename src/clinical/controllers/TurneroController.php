<?php


namespace src\clinical\controllers;


use src\clinical\services\MedicoService;
use src\clinical\services\TurnoService;

class TurneroController extends Controller
{

    protected TurnoService $turnoService;
    protected MedicoService $medicoService;

    protected String $medicoSelectSessionKey = "medico.select";

    public function init()
    {
        parent::init();
        $this->turnoService = new TurnoService($this->connection,$this->logger);
        $this->medicoService = new MedicoService($this->connection,$this->logger);
    }
    public function getTurneroMedico() {
        $this->saveMedicoSelected();
        if ($this->session->get($this->medicoSelectSessionKey)) {
            $this->gotoTurnero("turnero.medico");
        } else {
            $this->gotoSelect("/turnero_medico");
        }
    }
    public function getTurneroPacientes() {
        $this->saveMedicoSelected();
        if ($this->session->get($this->medicoSelectSessionKey)) {
            $this->gotoTurnero("turnero.paciente");
        } else {
            $this->gotoSelect("/turnero_pacientes");
        }
    }

    protected function gotoSelect(String $url) : void {
        $medicos = $this->medicoService->findAll();
        $this->pageFinderService->findFileRute("turnero.select", "php", "php", [],
            [
                "url" => $url,
                "medicos" => $medicos
            ], "Turnero");
    }

    protected function gotoTurnero(String $url) {
        $medicoSeleccionado = $this->session->get($this->medicoSelectSessionKey);
        $medico = $this->medicoService->find($medicoSeleccionado);
        $turnoActual = $this->turnoService->findActual();
        $this->session->put($this->medicoSelectSessionKey, null);
        $this->pageFinderService->findFileRute($url, "php", "php",[],
            [
                "medico" => $medico,
                "turnoActual" => $turnoActual
            ]);
    }

    protected function saveMedicoSelected() {
        if (! is_null($this->request->get("medico_selected"))) {
            $this->session->put($this->medicoSelectSessionKey, $this->request->get("medico_selected"));
        }
    }
}