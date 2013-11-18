<?php
use SQLTools\Command\AddForeignKey;
use SQLTools\Command\CreateDataBase;
use SQLTools\Command\CreateTable;
use SQLTools\Command\DropDataBase;
use SQLTools\Entity\Field;
use SQLTools\SQLConfig;
use SQLTools\SQLTools;

require_once __DIR__  . '/../vendor/autoload.php';

class SQLToolsTest extends PHPUnit_Framework_TestCase {

    const HOST = "localhost";
    const USER = "root";
    const PWD  = "";
    const DB   = "sqltools_test";

    public function testCreateDataBase()
    {
        SQLTools::configure(new SQLConfig(self::HOST, self::USER, self::PWD));
        SQLTools::execute(new DropDataBase(self::DB));
        SQLTools::execute(new CreateDataBase(self::DB));
    }

    private function generateFields()
    {
        return array(
            new Field("id", "int", null, false, null, true, false, "AUTO_INCREMENT"),
            new Field("name", "varchar", 100)

        );
    }

    public function testCreateTable()
    {
        SQLTools::configure(new SQLConfig(self::HOST, self::USER, self::PWD, self::DB));
        SQLTools::execute(new CreateTable("category", $this->generateFields()));

        $fields = $this->generateFields();
        $fields[] = new Field("categoryId", "int");
        SQLTools::execute(new CreateTable("news", $fields));
    }

    public function testCreateForeignIndex()
    {
        SQLTools::configure(new SQLConfig(self::HOST, self::USER, self::PWD, self::DB));
        SQLTools::execute(new AddForeignKey("news", "categoryId", "category", "id"));
    }

}
 