<?php
/**
 * Created by PhpStorm.
 * User: rfontes
 * Date: 18/11/13
 * Time: 10:00
 */

namespace SQLTools\Command;


use SQLTools\Base\ICommand;

class DropDataBase implements ICommand {
    private $dbName;

    public function __construct($dbName)
    {
        $this->dbName = $dbName;
    }

    public function getSql()
    {
        return "DROP DATABASE {$this->dbName};";
    }

} 