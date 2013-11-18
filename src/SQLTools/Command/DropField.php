<?php
/**
 * Created by PhpStorm.
 * User: rfontes
 * Date: 18/11/13
 * Time: 08:50
 */

namespace SQLTools\Command;


use SQLTools\Base\AlterTableEnum;

class DropField extends AlterTable {

    protected $changeType =  AlterTableEnum::DROP;
    protected $field;

    public function __construct($table, $fieldName)
    {
        $this->table = $table;
        $this->field = $fieldName;
    }

    protected function getWhatToAdd()
    {
        return $this->field;
    }

} 