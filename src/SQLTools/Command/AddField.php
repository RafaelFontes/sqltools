<?php

namespace SQLTools\Command;

use SQLTools\Entity\Field;

class AddField extends AlterTable {

    /**
     * @var Field $field
     */
    private $field;

    public function __construct($table, Field $field)
    {
        $this->table = $table;
        $this->field = $field;
    }

    protected function getWhatToAdd()
    {
        return $this->field->__toString();
    }

} 