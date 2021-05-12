<?php

namespace src\clinical\controllers;

class InstitucionalController extends Controller
{
    public function get() : void {
        $this->pageFinderService->findFileRute("institucional");
    }
}