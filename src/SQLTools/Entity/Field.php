<?php

namespace SQLTools\Entity;

class Field {

    private $field;
    private $data_type;
    private $size;
    private $isPrimary;
    private $extra;
    private $default;
    private $nullable;
    private $isKey;

    public function __construct($field="", $data_type="", $size=null, $nullable=true,
                                $default=null, $isPrimary=false, $isKey=false, $extra = "")
    {
        $this->field = $field;
        $this->data_type = $data_type;
        $this->size = $size;
        $this->nullable=$nullable;
        $this->default = $default;
        $this->isPrimary = $isPrimary;
        $this->extra = $extra;
        $this->isKey = $isKey;
    }

    public function __toString()
    {
        $str = "`" . $this->field . "` ";
        $str .= $this->data_type . " ";
        if ($this->size)
            $str .= "(" . $this->size . ") ";
        if (!$this->nullable)
            $str .= "NOT NULL ";
        if ($this->default)
            $str .= "DEFAULT " . $this->default . " ";
        if ($this->extra)
            $str .= $this->extra . " ";


        return $str;
    }

    /**
     * @param string $data_type
     */
    public function setDataType($data_type)
    {
        $this->data_type = $data_type;
    }

    /**
     * @return string
     */
    public function getDataType()
    {
        return $this->data_type;
    }

    /**
     * @param null $default
     */
    public function setDefault($default)
    {
        $this->default = $default;
    }

    /**
     * @return null
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param string $extra
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;
    }

    /**
     * @return string
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * @param string $field
     */
    public function setField($field)
    {
        $this->field = $field;
    }

    /**
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @param boolean $isPrimary
     */
    public function setIsPrimary($isPrimary)
    {
        $this->isPrimary = $isPrimary;
    }

    /**
     * @return boolean
     */
    public function isPrimary()
    {
        return $this->isPrimary;
    }

    /**
     * @param boolean $nullable
     */
    public function setNullable($nullable)
    {
        $this->nullable = $nullable;
    }

    /**
     * @return boolean
     */
    public function getNullable()
    {
        return $this->nullable;
    }

    /**
     * @param null $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return null
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param boolean $isKey
     */
    public function setIsKey($isKey)
    {
        $this->isKey = $isKey;
    }

    /**
     * @return boolean
     */
    public function isKey()
    {
        return $this->isKey;
    }



} 