<?php

namespace src\clinical\controllers;

class IndexController extends Controller
{
    public function get() {
        $this->pageFinderService->findFileRute("index");
    }
}