<?php


namespace src\clinical\database\models;


class UserModel extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->setField("username", "");
        $this->setField("password", "");
        $this->setField("email", "");
        $this->setField("nombre", "");
        $this->setField("apellido", "");
        $this->setField("cuil", "");
    }

    public function setUsername(string $username) : void {
        $this->setField("username", $username);
    }

    public function setPassword(string $password) : void {
        $this->setField("password", password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]));
    }

    public function setEmail(string $email) : void {
        $this->setField("email", $email);
    }

    public function setNombre(string $nombre) : void {
        $this->setField("nombre", $nombre);
    }

    public function setApellido(string $apellido) : void {
        $this->setField("apellido", $apellido);
    }

    public function setCuil(string $cuil) : void {
        $this->setField("cuil", $cuil);
    }
}