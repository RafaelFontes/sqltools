<?php
/**
 * Created by PhpStorm.
 * User: rfontes
 * Date: 18/11/13
 * Time: 09:06
 */

namespace SQLTools\Command;


use SQLTools\Base\AlterTableEnum;

class DropPrimaryKey extends AlterTable {

    protected $changeType = AlterTableEnum::DROP;

    protected function getWhatToAdd()
    {
        return "PRIMARY KEY";
    }
} 