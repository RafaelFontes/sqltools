<?php

namespace SQLTools\Command;


use SQLTools\Base\AlterTableEnum;
use SQLTools\Entity\Field;

class ChangeField extends AlterTable {

    protected $changeType = AlterTableEnum::CHANGE;

    private $fieldToChange;
    /**
     * @var Field $field
     */
    private $field;

    public function __construct($table, $fieldToChange, Field $field)
    {
        $this->table = $table;
        $this->fieldToChange = $fieldToChange;
        $this->field = $field;
    }

    protected function getWhatToAdd()
    {
        return $this->fieldToChange . $this->field->__toString();
    }

} 