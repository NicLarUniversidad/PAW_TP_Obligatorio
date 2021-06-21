<?php


namespace src\clinical\controllers;


class ProblemsController extends Controller
{
    public function pageNotFound() : void {
        $this->pageFinderService->findFileRute("pageNotFound", "php","php");
    }

    public function serverInternalError() : void {
        $this->pageFinderService->findFileRute("pageNotFound", "php","php");
    }
}