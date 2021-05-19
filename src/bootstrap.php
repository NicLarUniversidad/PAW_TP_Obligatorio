<?php

require __DIR__. "/../vendor/autoload.php";

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Dotenv\Dotenv;
use src\clinical\database\ConnectionBuilder;
use src\clinical\database\QueryBuilder;
use src\clinical\services\ConfigService;
use src\clinical\services\RequestService;
use src\clinical\services\RouterService;
use src\clinical\services\SessionService;
use src\clinical\database\models\Model;
use \Whoops\Run;
use Whoops\Handler\PrettyPageHandler;

if(session_id() == ''){
    //session has not started
    session_start();
}
$whoops = new Run;
$whoops ->pushHandler(new PrettyPageHandler);
$whoops->register();

$dotenv = Dotenv::createUnsafeImmutable(__DIR__.'/../');
$dotenv->load();

$config = new ConfigService();

$log = new Logger('Clinical');
try {
    $handler = new StreamHandler($config->get("LOG_PATH"));
    $handler->setLevel($config->get("LOG_LEVEL"));
    $log->pushHandler($handler);
} catch (Exception $e) {
    //ignore
}


$connectionBuilder = new ConnectionBuilder();
$connectionBuilder->setLogger($log);
$pdo = $connectionBuilder->make($config);
QueryBuilder::$DATABASE_NAME = $config->get("DB_DBNAME")?? "";
Model::init($log, $pdo);

$whoops = new Run;
$whoops ->pushHandler(new PrettyPageHandler);
$whoops->register();

$request = new RequestService();
$routerService = new RouterService();
$session = new SessionService();
$routerService->setLogger($log);
$routerService->setConnection($pdo);
$routerService->setRequest($request);
$routerService->setSession($session);
$routerService->get('/','IndexController@get');
$routerService->get('/institucional','InstitucionalController@get');
$routerService->get('/noticias','NoticiasController@get');
$routerService->get('/obrasSociales','ObrasSocialesController@get');
$routerService->get('/profesionales','ProfesionalesController@get');
$routerService->get('/nuevoTurno','NuevoTurnoController@get');
$routerService->post('/nuevoTurno','NuevoTurnoController@post');
$routerService->get('/listaTurnos','ListaTurnosController@get');
$routerService->get('/login','LoginController@get');
$routerService->post('/login','LoginController@post');
$routerService->get('/registrarse','LoginController@getRegistrarse');
$routerService->post('/registrarse','LoginController@postRegistrarse');
