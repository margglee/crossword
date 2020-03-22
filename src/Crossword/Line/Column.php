<?php

namespace Crossword\Line;

use \Crossword\Field;

/**
 * Crossword Column
 */
class Column extends Line{

    /**
     * @var string Line type column
     */
    protected $type = self::TYPE_COLUMN;

    /**
     * @param Field $field
     */
    public function addField(Field $field){
        $this->fields[$field->getRow()->getIndex()] = $field;
    }

    /**
     * @return array
     */
    public function getNeighbors(){
        $fields = $this->getFields();
        $row = $fields[1]->getRow();

        $neighbor = array();
        $field = $row->getByIndex($this->getIndex() + 1);
        if(!empty($field)) {
            $neighbor[] = $field->getColumn();
        }
        $field = $row->getByIndex($this->getIndex() - 1);
        if(!empty($field)) {
            $neighbor[] = $field->getColumn();
        }
        return $neighbor;
    }

}
