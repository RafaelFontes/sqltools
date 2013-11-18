<?php

namespace SQLTools\Command;


use SQLTools\Base\ICommand;

class RenameTable implements ICommand {

    /**
     * Old table name
     * @var string
     */
    private $old;
    /**
     * New table name
     * @var string
     */
    private $new;

    public function __construct($old, $new)
    {
        $this->old = $old;
        $this->new = $new;
    }

    public function getSql()
    {
        return "RENAME {$this->old} TO {$this->new};";
    }

}