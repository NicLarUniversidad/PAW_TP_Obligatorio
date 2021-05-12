<?php


namespace src\clinical\controllers;


class ListaTurnosController extends Controller
{
    public function get() : void {
        $this->pageFinderService->findFileRute("listaTurnos");
    }
}