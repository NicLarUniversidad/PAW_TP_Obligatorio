<?php


namespace src\clinical\services;

class PageFinderService
{
    /** @noinspection PhpIncludeInspection */
    public function findFileRute(string $name, string $folder = "html", string $type = "html", Array $cssImports = []) : void {
        require __DIR__ . "\\..\\views\\" . $folder . "\\" . $name . "." . $type;
    }
}