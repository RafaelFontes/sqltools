<?php

namespace SQLTools\Command;


use SQLTools\Base\ICommand;
use SQLTools\Entity\Field;

class CreateTable implements ICommand {

    private $table;

    private $isTemporary;
    private $createIfNotExists;

    private $fields;
    private $engine;
    private $charset;

    public function __construct($table=null, array $fields = array(), $engine = "InnoDB",
                                $charset="utf8_unicode_ci", $isTemporary=false, $createIfNotExists = false)
    {
        $this->table = $table;
        $this->fields = $fields;
        $this->engine = $engine;
        $this->charset = $charset;
        $this->isTemporary = $isTemporary;
        $this->createIfNotExists = $createIfNotExists;
    }

    public function getSql()
    {
        $sql = "CREATE ";
        if ($this->isTemporary)
            $sql .= "TEMPORARY ";

        if ($this->createIfNotExists)
            $sql .= "IF NOT EXISTS ";

        $sql .= "TABLE `" . $this->table . "` (\n";

        $sql .= $this->generateFields();

        $sql .= ") ENGINE=" . $this->engine . " COLLATE=" . $this->charset . ";\n";

        return $sql;
    }

    private function generateFields()
    {
        $fields = array();
        $keys = array();
        /**
         * @var Field $field
         */
        foreach($this->fields as $field)
        {
            $fields[] = $field->__toString();
            if ($field->isPrimary())
            {
                $keys[] = 'PRIMARY KEY ('.$field->getField().')';
            }
            if ($field->isKey())
            {
                $keys[] = 'KEY ('.$field->getField().')';
            }

        }

        return implode(",\n", array_merge($fields, $keys));

    }

    /**
     * @param mixed $charset
     */
    public function setCharset($charset)
    {
        $this->charset = $charset;
    }

    /**
     * @return mixed
     */
    public function getCharset()
    {
        return $this->charset;
    }

    /**
     * @param mixed $createIfNotExists
     */
    public function setCreateIfNotExists($createIfNotExists)
    {
        $this->createIfNotExists = $createIfNotExists;
    }

    /**
     * @return mixed
     */
    public function getCreateIfNotExists()
    {
        return $this->createIfNotExists;
    }

    /**
     * @param mixed $engine
     */
    public function setEngine($engine)
    {
        $this->engine = $engine;
    }

    /**
     * @return mixed
     */
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * @param mixed $fields
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return mixed
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param mixed $isTemporary
     */
    public function setIsTemporary($isTemporary)
    {
        $this->isTemporary = $isTemporary;
    }

    /**
     * @return mixed
     */
    public function getIsTemporary()
    {
        return $this->isTemporary;
    }

    /**
     * @param mixed $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }

    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
    }

} 