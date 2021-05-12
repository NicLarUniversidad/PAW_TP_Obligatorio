<?php


namespace src\clinical\controllers;


class ProfesionalesController extends Controller
{
    public function get() : void {
        $this->pageFinderService->findFileRute("profesionales");
    }
}