<?php


namespace src\clinical\traits;

use src\clinical\services\SessionService;

trait TSession
{
    public SessionService $session;

    public function setSession(SessionService $sessionService) {
        $this->session = $sessionService;
    }
}