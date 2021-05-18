<?php
namespace src\clinical\services;

use Exception;
use src\clinical\exceptions\PageNotFoundException;
use src\clinical\traits\TSession;
use src\clinical\traits\TRequest;
use src\clinical\traits\TLogger;
use src\clinical\traits\TConnection;

class RouterService{

    use TSession;
    use TRequest;
    use TLogger;
    use TConnection;

    public array $routes = [
        "GET" =>[],
        "POST"=>[],
        "PUT"=>[],
    ];

    public function loadRoutes($path, $action, $method = "GET") {
        $this->routes[$method][$path]= $action;
    }

    public function get($path,$action) {
        $this->loadRoutes($path,$action,"GET");
    }

    public function post($path,$action) {
        $this->loadRoutes($path,$action,"POST");
    }

    public function put($path,$action) {
        $this->loadRoutes($path,$action,"PUT");
    }

    public function exist ($path,$method) {
        return array_key_exists($path,$this->routes[$method]);

    }

    /**
     * @throws PageNotFoundException
     */
    public function getController($path, $http_method) {
        $this->logger->info("getController($path, $http_method)");
        if (!$this->exist($path,$http_method)){
            $this->logger->warning("Se quiso acceder a un path que no existe: ". $path);
            throw new PageNotFoundException("la ruta no existe para este path");
        }
        return explode('@',$this->routes[$http_method][$path]);
    }

    public function call($controller, $method) {
        $controller_name = "src\\clinical\\controllers\\{$controller}";
        $objController = new $controller_name;
        $objController->setSession($this->session);
        $objController->setConnection($this->connection);
        $objController->setRequest($this->request);
        $objController->setLogger($this->logger);
        $objController->$method();
    }

    public function  direct() {
        list($path, $http_method) = $this->request->route();
        list($controller, $method) = $this->getController($path,$http_method);
        $this->logger
            ->info(
                "Status Code: 200",
                [
                    "Path"=>$path,
                    "Method" =>$http_method,
                ]
            );
        $this->call($controller,$method);
    }
}