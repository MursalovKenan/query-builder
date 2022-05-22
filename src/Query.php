<?php

namespace Mursalov\QueryBuilder;

use Aigletter\Contracts\Builder\QueryInterface;

class Query implements QueryInterface
{
    private array|string $columns;
    private array|string $conditions;
    private string $table;
    private int $limit;
    private int $offset;
    private int $order;

    /**
     * @param array|string $columns
     * @param array|string $conditions
     * @param string $table
     * @param int $limit
     * @param int $offset
     * @param int $order
     */
    public function __construct(array|string $columns, array|string $conditions, string $table, int $limit, int $offset, int $order)
    {
        $this->columns = $columns;
        $this->conditions = $conditions;
        $this->table = $table;
        $this->limit = $limit;
        $this->offset = $offset;
        $this->order = $order;
    }


    public function toSql(): string
    {
        // TODO: Implement toSql() method.
    }
}