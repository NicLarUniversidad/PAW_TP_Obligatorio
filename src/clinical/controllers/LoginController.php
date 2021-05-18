<?php


namespace src\clinical\controllers;


class LoginController extends Controller
{
    public function get() {
        $cssImports = Array();
        $cssImports[] = "login";
        $this->pageFinderService->findFileRute("login","php","php", $cssImports);
    }
    public function post() {

    }
}