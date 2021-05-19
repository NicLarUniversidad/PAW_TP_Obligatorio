<?php


namespace src\clinical\controllers;


use src\clinical\exceptions\IndexNotFoundException;
use src\clinical\services\UserService;

class LoginController extends Controller
{
    public function get() {
        $cssImports = Array();
        $cssImports[] = "login";
        $this->pageFinderService->findFileRute("login","php","php", $cssImports);
    }

    /**
     * @throws IndexNotFoundException
     */
    public function post() {
        $username = $this->request->get("username");
        $password = $this->request->get("password");
        $service = new UserService($this->connection, $this->logger);
        if ($service->login($username, $password)) {
            header("Location: /");
        } else {
            //TODO: hacer página...
            echo "usuario o contraseña inválida";
        }
    }

    public function getRegistrarse() : void {
        $cssImports = Array();
        $cssImports[] = "login";
        $this->pageFinderService->findFileRute("registrarse","php","php", $cssImports);
    }

    public function postRegistrarse() : void {
        $username = $this->request->get("username");
        $password = $this->request->get("password");
        $mail = $this->request->get("email")??"";
        $nombre = $this->request->get("nombre")??"";
        $apellido = $this->request->get("apellido")??"";
        $cuil = $this->request->get("cuil")??"";
        if (isset($username) and isset($password)) {
            $service = new UserService($this->connection, $this->logger);
            $service->createUser($username, $password, $mail, $nombre, $apellido, $cuil);
            echo "OK";
        } else {
            echo "No se ingresó usuario o contraseña";
        }
    }
}