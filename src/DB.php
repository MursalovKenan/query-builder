<?php

namespace Mursalov\QueryBuilder;

use Aigletter\Contracts\Builder\DbInterface;
use Aigletter\Contracts\Builder\QueryInterface;
use PDO;

class DB implements DbInterface
{
    protected PDO $pdo;

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function one(QueryInterface $query): object
    {
        $data = $this->pdo->query($query)->fetch(PDO::FETCH_OBJ);
        if ($data) {
            return $data;
        }
        return [];    }

    public function all(QueryInterface $query): array
    {
        $data = $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
        if ($data) {
            return $data;
        }
        return [];
    }
}