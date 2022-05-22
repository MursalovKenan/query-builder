<?php

namespace Mursalov\QueryBuilder;

use Aigletter\Contracts\Builder\BuilderInterface;
use Aigletter\Contracts\Builder\QueryBuilderInterface;
use Aigletter\Contracts\Builder\QueryInterface;

class QueryBuilder implements QueryBuilderInterface
{
    private array|string $columns;
    private array|string $conditions;
    private string $table;
    private int $limit;
    private int $offset;
    private int $order;



    public function select($columns): \Aigletter\Contracts\Builder\BuilderInterface
    {
        $this->columns = $columns;
        return $this;
    }

    public function where($conditions): \Aigletter\Contracts\Builder\BuilderInterface
    {
        $this->conditions = $conditions;
        return $this;
    }

    public function table($table): \Aigletter\Contracts\Builder\BuilderInterface
    {
        $this->table = $table;
        return $this;
    }

    public function limit($limit): \Aigletter\Contracts\Builder\BuilderInterface
    {
        $this->limit = $limit;
        return $this;
    }

    public function offset($offset): \Aigletter\Contracts\Builder\BuilderInterface
    {
        $this->offset = $offset;
        return $this;
    }

    public function order($order): \Aigletter\Contracts\Builder\BuilderInterface
    {
        $this->order = $order;
        return $this;
    }

    public function build(): QueryInterface
    {
        return new Query($this->columns, $this->conditions, $this->table, $this->limit, $this->offset, $this->order);
    }
}