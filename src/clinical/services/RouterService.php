<?php
namespace src\clinical\services;

use Exception;
use src\clinical\exceptions\PageNotFoundException;
use src\clinical\traits\tSession;
use src\clinical\traits\tRequest;
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

    public  string  $notFound = 'not_found';
    public string  $internalError = 'internal_error';

    public function __construct() {
        $this->get($this->notFound,'ErrorController@notFound');
        $this->get($this->internalError,'ErrorController@nInternalError');
    }


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
        try {
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
        }catch ( PageNotFoundException $e) {
            list($controller, $method) = $this->getController($this->notFound,"GET");//explode('@',$this->routes[$method][$path]);
            $this->logger->debug("Status Code : 404 - Route not found", ["ERROR"=>$e]);
        }catch ( Exception $e){
            list($controller, $method) = $this->getController($this->internalError,"GET");//explode('@',$this->routes[$method][$path]);
            $this->logger->error("Status Code : 500 - Internal Server Error", ["ERROR"=>$e]);
        } finally {
            $this->call($controller,$method);
        }
    }
}