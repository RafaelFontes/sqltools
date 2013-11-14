<?php
/**
 * Created by PhpStorm.
 * User: rfontes
 * Date: 14/11/13
 * Time: 10:31
 */

namespace SQLTools\Command;


use SQLTools\Base\ICommand;

class CreateDataBase implements ICommand {

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getSql()
    {
        return "CREATE DATABASE `{$this->name}`;\n";
    }

} 