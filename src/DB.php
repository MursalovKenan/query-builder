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
        return $this->pdo->query($query)->fetch(PDO::FETCH_OBJ);
    }

    public function all(QueryInterface $query): array
    {
        return $this->pdo->query($query)->fetch(PDO::FETCH_ASSOC);
    }
}