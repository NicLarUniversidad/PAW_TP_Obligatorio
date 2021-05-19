<?php


namespace src\clinical\controllers;


use src\clinical\services\PageFinderService;
use src\clinical\traits\TConnection;
use src\clinical\traits\TLogger;
use src\clinical\traits\tRequest;
use src\clinical\traits\tSession;

class Controller
{
    use TSession;
    use TRequest;
    use TLogger;
    use TConnection;

    public PageFinderService $pageFinderService;

    public function __construct()
    {
        $this->pageFinderService = new PageFinderService();
    }

    public function init() {
        $this->pageFinderService->setSession($this->session);
    }
}