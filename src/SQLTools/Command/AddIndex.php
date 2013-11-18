<?php
/**
 * Created by PhpStorm.
 * User: rfontes
 * Date: 18/11/13
 * Time: 08:56
 */

namespace SQLTools\Command;


class AddIndex extends AlterTable {

    private $fields;
    private $idxName;

    /**
     * @param array $fields - List of field names
     * @param string $idxName - Index name
     */
    public function __construct(array $fields, $idxName="")
    {
        $this->fields = $fields;
        $this->idxName = $idxName;
    }

    protected function getWhatToAdd()
    {
        return "INDEX " . $this->idxName . "(".implode(",", $this->fields).")";
    }

} 