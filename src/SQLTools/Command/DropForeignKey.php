<?php

namespace SQLTools\Command;


use SQLTools\Base\AlterTableEnum;

class DropForeignKey extends AlterTable {

    protected $changeType = AlterTableEnum::DROP;
    private $fkName;

    public function __construct($fkName)
    {
        $this->fkName = $fkName;
    }

    protected function getWhatToAdd()
    {
        return "FOREIGN KEY {$this->fkName};";
    }

} 