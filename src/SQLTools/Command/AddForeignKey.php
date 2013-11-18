<?php

namespace SQLTools\Command;


class AddForeignKey extends AlterTable {

    private $localField;
    private $foreignTable;
    private $foreignField;
    private $fkName;

    public function __construct($table, $localField, $foreignTable, $foreignField, $fkName = "")
    {
        $this->table = $table;
        $this->localField = $localField;
        $this->foreignTable = $foreignTable;
        $this->foreignField = $foreignField;
        $this->fkName = ($fkName != "") ? $fkName : "fk_" . $foreignTable . "_" . $foreignField . '_idx';
    }

    protected function getWhatToAdd()
    {
        return "CONSTRAINT " . $this->fkName . "
                FOREIGN KEY ({$this->localField})
                REFERENCES " . $this->foreignTable . "({$this->foreignField})";
    }

} 