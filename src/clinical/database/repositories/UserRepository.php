<?php


namespace src\clinical\database\repositories;


use Monolog\Logger;
use PDO;
use src\clinical\database\models\Model;
use src\clinical\database\models\UserModel;
use src\clinical\exceptions\IndexNotFoundException;

class UserRepository extends Repository
{
    public function __construct(Logger $logger, PDO $connection)
    {
        parent::__construct($logger, $connection, "usuario", "TurnoModel");
    }

    /**
     * @throws IndexNotFoundException
     */
    public function findByUsernameAndPassword(string $username, string $password) : ?UserModel
    {
        $user = new UserModel();
        $user->setUsername($username);
        $queryBuilder = Model::createQueryBuilder();
        $results = $queryBuilder->select($user->getTableFields())
            ->from($this->tabla)
            ->where(["username"=>$user->getField("username")])
            ->execute();
        if (count($results) > 0) {
            if (password_verify($password, $results[0]["password"])) {
                $user->setFields($results[0]);
                return $user;
            }
        }
        return null;
    }
}