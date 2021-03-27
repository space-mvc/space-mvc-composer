<?php

namespace SpaceMvc\Framework\Library\Database\Mysql;

use SpaceMvc\Framework\Library\Database\Mysql;
use SpaceMvc\Framework\Library\Database\Mysql\Resource\Collection;
use SpaceMvc\Framework\Library\Database\Mysql\Resource\Item;

/**
 * Class QueryBuilder
 * @package SpaceMvc\Database\Mysql
 */
class QueryBuilder extends Mysql
{
    /** @var string $query */
    protected string $query = '';

    /**
     * select
     * @param string $table
     * @param array $fields
     * @return $this
     */
    public function select(string $table, array $fields = [])
    {
        $this->query = 'SELECT ';

        if(!empty($fields)) {
            foreach($fields as $field) {
                $this->query .= $field.', ';
            }
            $this->query = rtrim($this->query, ', ');
        } else {
            $this->query .= ' * ';
        }
        $this->query .= ' FROM '.$table.' ';

        return $this;
    }

    /**
     * get
     * @return Collection
     */
    public function get()
    {
        $results = $this->fetchAll($this->query);
        $collection = new Collection();

        if(!empty($results)) {
            foreach($results as $result) {
                $item = new Item();
                $item->setAttributes($result);
                $collection->addItem($item);
            }
        }

        return $collection;
    }

    public function where()
    {

    }

    public function whereLike()
    {

    }

    public function whereIn()
    {

    }

    public function leftJoin()
    {

    }

    public function join()
    {

    }

    public function limit()
    {

    }

    public function skip()
    {

    }

    public function orderBy()
    {

    }
}