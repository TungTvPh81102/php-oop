<?php

namespace Hi\PhpOop\Commons;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;

class Model
{
    protected Connection|null $conn;

    protected $queryBuilder;

    protected string $tableName;

    // Connect DB
    public function __construct()
    {
        $connectionParams = [
            'dbname'    => $_ENV['DB_NAME'],
            'user'      => $_ENV['DB_USERNAME'],
            'password'  => $_ENV['DB_PASSWORD'],
            'host'      => $_ENV['DB_HOST'],
            'port'      => $_ENV['DB_PORT'],
            'driver'    => $_ENV['DB_DRIVER'],
        ];

        $this->conn = DriverManager::getConnection($connectionParams);

        $this->queryBuilder =  $this->conn->createQueryBuilder();
    }

    // DB GET ALL TABLE
    public function getAll(...$colums)
    {
        // echo $this->tableName;
        return $this->queryBuilder
            ->select(...$colums)
            ->from($this->tableName)
            ->fetchAllAssociative();
    }

    // DB FIND BY ID
    public function findById()
    {
    }

    // DB PAGINATE
    public function paginate($page, $perPage = 10)
    {
    }

    // DB INSERT 
    public function insert()
    {
    }

    // DB UPDATE
    public function update()
    {
    }

    // DB DELETE
    public function delete()
    {
    }

    // Disconnect DB
    public function __destruct()
    {
        $this->conn = null;
    }
}
