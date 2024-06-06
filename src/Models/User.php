<?php

namespace Hi\PhpOop\Models;

use Hi\PhpOop\Commons\Model;

class User extends Model
{
    protected string $tableName = 'users';

    public function activeToken($token)
    {
        return $this->queryBuilder
            ->select('id')
            ->from($this->tableName)
            ->where('active_token = :token')
            ->setParameter('token', $token)
            ->fetchAssociative();
    }

    public function getForgotToken($token)
    {
        return $this->queryBuilder
            ->select('id', 'email', 'forgot_token')
            ->from($this->tableName)
            ->where('forgot_token = ?')
            ->setParameter(0, $token)
            ->fetchAssociative();
    }

    public function findByEmail($email)
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('email = ?')
            ->setParameter(0, $email)
            ->fetchAssociative();
    }
}
