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
    private array|string $order;

    /**
     * @param array|string $columns
     * @param array|string $conditions
     * @param string $table
     * @param int $limit
     * @param int $offset
     * @param int $order
     */
    public function __construct(array|string $columns, array|string $conditions, string $table, int $limit, int $offset, array|string $order)
    {
        $this->columns = $columns;
        $this->conditions = $conditions;
        $this->table = $table;
        $this->limit = $limit;
        $this->offset = $offset;
        $this->order = $order;
    }

    public function __toString(): string
    {
        return $this->toSql();
    }
    public function toSql(): string
    {
        $sql = 'SELECT ';
        if (is_array($this->columns)) {
            $sql .= implode(', ', $this->columns);
        } else {
            $sql .= $this->columns;
        }
        $sql .= ' FROM ' . $this->table;
        if (is_array($this->conditions) && !empty($this->conditions)) {
            $sql .= ' WHERE ';
            foreach ($this->conditions as $columnName=>$condition) {
                $sql .= $columnName . ' = \'' . $condition . '\' ';
            }
        }else {
            $sql .= ' WHERE ' . $this->conditions;
        }
        if (is_array($this->order )) {
            foreach ($this->order as $columnName=>$order) {
                $sql .= 'ORDER BY ' . $columnName . ' ' . $order;
            }
        }else {
            $sql = ' ORDER BY ' . $this->order;
        }
        if ($this->limit > 0) {
            $sql .= ' LIMIT ' . $this->limit;
        }
        if ($this->offset > 0) {
            $sql .= ' OFFSET ' . $this->offset;
        }
        return $sql;
    }
}