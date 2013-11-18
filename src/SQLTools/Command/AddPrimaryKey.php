<?php

namespace SQLTools\Command;

class AddPrimaryKey extends AlterTable {

    private $fieldName;

    public function __construct($fieldName)
    {
        $this->fieldName = $fieldName;
    }

    protected function getWhatToAdd()
    {
        return "PRIMARY KEY ({$this->fieldName});";
    }

} 