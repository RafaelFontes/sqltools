<?php

namespace SQLTools\Command;

use SQLTools\Base\AlterTableEnum;

class DropIndex extends AlterTable {

    protected $changeType = AlterTableEnum::DROP;
    private $idxName;

    /**
     * @param $idxName - Index name
     */
    public function __construct($idxName)
    {
        $this->idxName = $idxName;
    }

    protected function getWhatToAdd()
    {
        return "INDEX " . $this->idxName .";";
    }
} 