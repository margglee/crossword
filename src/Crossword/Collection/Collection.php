<?php

namespace Crossword\Collection;

use \Crossword\Iterator;

/**
 * Collection for columns, lines, words.
 */
class Collection implements \IteratorAggregate, \Countable
{

    /**
     * @var array
     */
    protected $items = array();

    /**
     * @return \Crossword\Iterator
     */
    public function getIterator() {
        return new Iterator($this->items);
    }

    /**
     * Adding a New Item
     *
     * @param $value
     * @param null $key
     */
    public function add($value, $key = null) {
        if(!is_null($key)) {
            $this->items[$key] = $value;
        } else {
            $this->items[] = $value;
        }
    }

    /**
     * @return bool Check for missing items
     */
    public function notEmpty() {
        return !empty($this->items);
    }

    /**
     * @return bool Random item
     */
    public function getRandom() {
        if(!empty($this->items)) {
            $randKey = array_rand($this->items);
            return $this->items[$randKey];
        }
        return false;
    }

    /**
     * @param int $index
     * @return Element
     * @throws \Exception
     */
    public function getByIndex($index) {
        if(array_key_exists($index, $this->items)) {
            return $this->items[$index];
        }
        throw new \Exception('The index is invalid. (' . $index . ')');
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }
}
