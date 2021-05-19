<?php


namespace src\clinical\services;


use Monolog\Logger;
use PDO;
use src\clinical\database\models\UserModel;
use src\clinical\database\repositories\UserRepository;
use src\clinical\exceptions\IndexNotFoundException;
use src\clinical\traits\TSession;

class UserService
{
    use TSession;
    public static string $USER_SESSION_NAME = "logged_user";
    protected UserRepository $userRepository;

    public function __construct(PDO $pdo, Logger $logger)
    {
        $this->userRepository = new UserRepository($logger, $pdo);
        $this->setSession(new SessionService());
    }

    public function createUser(string $username, string $password, string $email = "", string $nombre = "",
                               string $apellido = "", string $cuil = "") : UserModel {
        $newUser = new UserModel();
        $newUser->setUsername($username);
        $newUser->setPassword($password);
        $newUser->setEmail($email);
        $newUser->setNombre($nombre);
        $newUser->setApellido($apellido);
        $newUser->setCuil($cuil);
        $this->userRepository->save($newUser);
        return $newUser;
    }

    /**
     * @throws IndexNotFoundException
     */
    public function login(string $username, string $password) : bool {
        $user = $this->userRepository->findByUsernameAndPassword($username, $password);
        if (isset($user)) {
            $this->session->put(UserService::$USER_SESSION_NAME, $user->getTableFields());
            return true;
        }
        return false;
    }

    public function getLoggedUser() : ?UserModel {
        $userData = $this->session->get(UserService::$USER_SESSION_NAME);
        if (isset($userData)) {
            $user = new UserModel();
            $user->setFields($userData);
            return $user;
        }
        return null;
    }
}