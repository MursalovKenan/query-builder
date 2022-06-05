<?php

namespace Mursalov\QueryBuilder;

use Aigletter\Contracts\Builder\BuilderInterface;
use Aigletter\Contracts\Builder\QueryBuilderInterface;
use Aigletter\Contracts\Builder\QueryInterface;
use http\Exception\InvalidArgumentException;

class QueryBuilder implements QueryBuilderInterface
{
    private array|string $columns;
    private array|string $conditions;
    private string $table;
    private int $limit;
    private int $offset;
    private array|string $order;

    public function __construct()
    {
        $this->limit = 0;
        $this->offset = 0;
    }

    public function select($columns): BuilderInterface
    {
        $this->columns = $columns;
        return $this;
    }

    public function where($conditions): BuilderInterface
    {
        $this->conditions = $conditions;
        return $this;
    }

    public function table($table): BuilderInterface
    {
        $this->table = $table;
        return $this;
    }

    public function limit($limit): BuilderInterface
    {
        if ($limit < 0) {
            throw (new InvalidArgumentException('Limit must be more then 0'));
        }
        $this->limit = $limit;
        return $this;
    }

    public function offset($offset): BuilderInterface
    {
        if ($offset < 0) {
            throw (new InvalidArgumentException('Offset must be more then 0'));
        }
        $this->offset = $offset;
        return $this;
    }

    public function order($order): BuilderInterface
    {
        $this->order = $order;
        return $this;
    }

    public function build(): QueryInterface
    {
        return new Query($this->columns, $this->conditions, $this->table, $this->limit, $this->offset, $this->order);
    }
}