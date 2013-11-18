<?php

namespace SQLTools\Command;


use SQLTools\Base\ICommand;

class DropTable implements ICommand {

    /**
     * Table name
     * @var string
     */
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getSql()
    {
        return "DROP {$this->name};";
    }

} 