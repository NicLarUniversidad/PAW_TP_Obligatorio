<?php


namespace src\clinical\controllers;


class ObrasSocialesController extends Controller
{
    public function get() : void {
        $this->pageFinderService->findFileRute("obrasSociales");
    }
}