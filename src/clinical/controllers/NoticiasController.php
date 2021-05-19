<?php


namespace src\clinical\controllers;


class NoticiasController extends Controller
{
    public function get() : void {
        $this->pageFinderService->findFileRute("noticias");
    }
}