<?php

namespace src\clinical\controllers;

use src\clinical\services\PageFinderService;
use src\clinical\traits\TConnection;
use src\clinical\traits\TLogger;
use src\clinical\traits\tRequest;
use src\clinical\traits\tSession;

class IndexController extends Controller
{
    /** @noinspection PhpIncludeInspection */
    public function get() {
        $this->pageFinderService->findFileRute("index");
    }
}