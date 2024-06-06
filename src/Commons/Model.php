<?php

namespace Hi\PhpOop\Commons;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Query\QueryBuilder;

class Model
{
    protected Connection|null $conn;

    protected QueryBuilder $queryBuilder;

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
    // public function getCustome(...$colums)
    // {
    //     return $this->queryBuilder
    //         ->select(...$colums)
    //         ->from($this->tableName)
    //         ->fetchAllAssociative();
    // }

    public function getAll()
    {
        // $query = $this->queryBuilder
        //     ->select('*')
        //     ->from($this->tableName)
        //     ->where('deleted_at IS NULL')
        //     ->orderBy('id', 'DESC')->getSQL();


        //     Helper::dd($query);
        // echo $this->tableName;
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->orderBy('id', 'DESC')
            ->fetchAllAssociative();
    }

    // DB COUNT
    public function count()
    {
        return $this->queryBuilder
            ->select('COUNT(*)')
            ->from($this->tableName)
            ->fetchOne();
    }


    // DB FIND BY ID
    public function findById($id)
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('id = ?')
            ->setParameter(0, $id)
            ->fetchAssociative();
    }

    // DB PAGINATE
    public function paginate($page, $perPage = 10)
    {
        $page = $page ?: 1;
        $offSet = $perPage * ($page - 1);

        $data = $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->setFirstResult($offSet)
            ->setMaxResults($perPage)
            ->orderBy('id', 'DESC')
            ->fetchAllAssociative();

        $total = ceil($this->count() / $perPage);

        return [$data, $total];
    }

    // DB INSERT 
    public function insert(array $data)
    {
        if (!empty($data)) {
            $query = $this->queryBuilder->insert($this->tableName);

            $index = 0;

            foreach ($data as $key => $value) {
                $query->setValue($key, '?')
                    ->setParameter($index, $value);

                ++$index;
            }

            $query->executeQuery();

            return true;
        }

        return false;
    }

    public function insertGetLastId(array $data)
    {
        if (!empty($data)) {
            $query = $this->queryBuilder->insert($this->tableName);

            $index = 0;

            foreach ($data as $key => $value) {
                $query->setValue($key, '?')
                    ->setParameter($index, $value);

                ++$index;
            }

            $query->executeQuery();

            return $this->conn->lastInsertId();
        }

        return false;
    }

    // DB UPDATE
    public function update($id, array $data)
    {
        if (!empty($data)) {
            $query = $this->queryBuilder->update($this->tableName);

            $index = 0;

            foreach ($data as $key => $value) {
                $query->set($key, '?')
                    ->setParameter($index, $value);

                ++$index;
            }

            $query->where('id = ?')
                ->setParameter(count($data), $id)
                ->executeQuery();

            return true;
        }

        return false;
    }

    // DB DELETE
    public function destroy($id)
    {
        return $this->queryBuilder
            ->delete($this->tableName)
            ->where('id = ?')
            ->setParameter(0, $id)
            ->executeQuery();
    }

    public function getConnection()
    {
        return $this->conn;
    }

    // Disconnect DB
    public function __destruct()
    {
        $this->conn = null;
    }
}
