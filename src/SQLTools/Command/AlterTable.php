<?php

namespace SQLTools\Command;


use SQLTools\Base\AlterTableEnum;
use SQLTools\Base\ICommand;

abstract class AlterTable implements ICommand {

    protected $table;
    protected $changeType = AlterTableEnum::ADD;

    public function getSql()
    {
        $sql = "ALTER TABLE ";
        $sql .= $this->table . " {$this->$changeType} ";

        $this->getWhatToAdd() . ";";
    }

    abstract protected function getWhatToAdd();
}