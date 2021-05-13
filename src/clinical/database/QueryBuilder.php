<?php

namespace src\clinical\database;

use Monolog\Logger;
use PDO;

class QueryBuilder
{
    private PDO $pdo;
    private Logger $logger;
    private string $query;
    private array $values;

    public function __construct(PDO $pdo, Logger $logger)
    {
        $this->pdo = $pdo;
        $this->logger = $logger;
        $this->query = "";
    }

    public function select(Array $fields = []) : QueryBuilder {
        $this->query = "SELECT ";
        $primero = true;
        foreach ($fields as $field) {
            if (! $primero) {
                $this->query .= ",";
            } else {
                $primero = false;
            }
            $this->query .= " $field";
        }
        return $this;
    }

    public function from(string $table) : QueryBuilder {
        $this->query = " FROM $table";
        return $this;
    }

    public function where(array $values = []) : QueryBuilder {
        $this->query = " WHERE ";
        $this->values = $values;
        $primero = true;
        foreach ($this->values as $field => $value) {
            if (! $primero) {
                $this->query .= ",";
            } else {
                $primero = false;
            }
            $this->query = " :$field";
        }
        return $this;
    }

    public function insert(string $table, array $values) : QueryBuilder {
        $this->query = "INSERT INTO $table (";
        $this->values = $values;
        $postQuery = "(";
        $primero = true;
        foreach ($this->values as $field => $value) {
            if (! $primero) {
                $this->query .= ",";
                $postQuery .= ",";
            } else {
                $primero = false;
            }
            $this->query .= " $field";
            $postQuery .= " :$field";
        }
        $this->query .= ") VALUES " . $postQuery . ")";
        return $this;
    }

    public function update(string $table, array $values) : QueryBuilder {
        $this->query = "UPDATE $table SET ";
        $this->values = $values;
        $primero = true;
        foreach ($this->values as $field => $value) {
            if (! $primero) {
                $this->query .= ",";
            } else {
                $primero = false;
            }
            $this->query = " $field=:$field";
        }
        return $this;
    }

    public function delete(string $table) : QueryBuilder {
        $this->query = "DELETE $table";
        return $this;
    }

    public function execute(): array
    {
        $this->logger->info("Query: ".  $this->query);
        $sentencia = $this->pdo->prepare($this->query);
        foreach ($this->values as $field => $value) {
            $sentencia->bindValue(":$field",$value);
        }
        $sentencia->setFetchMode(PDO::FETCH_ASSOC);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }
}