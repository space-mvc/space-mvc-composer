<?php

namespace SpaceMvc\Framework\Database\Mysql\Resource;

use SpaceMvc\Framework\Database;

/**
 * Class Collection
 * @package SpaceMvc\Framework\Database\Mysql\Resource
 */
class Collection
{
    /** @var array $items */
    protected array $items = [];

    /**
     * @param Item $item
     */
    public function addItem(Item $item)
    {
        $this->items[] = $item;
    }

    /**
     * getItems
     * @return array
     */
    public function getItems() : array
    {
        return $this->items;
    }
}
