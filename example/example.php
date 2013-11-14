<?php

require_once __DIR__  . '/../vendor/autoload.php';

use SQLTools\Command\CreateDataBase;
use SQLTools\Command\CreateTable;
use SQLTools\Entity\Field;
use SQLTools\SQLConfig;
use SQLTools\SQLTools;

$dbName = "sql_tools_example";

$config = new SQLConfig("localhost", "root");

SQLTools::configure($config);

SQLTools::execute(new CreateDataBase($dbName));

$config->setDb($dbName);


$idField = new Field("id", "INT", null, false, null, true, false, 'AUTO_INCREMENT');

$nameField = new Field("name", "VARCHAR", 100, false);

$descriptionField = new Field("description", "TEXT");

$dateField = new Field("date", "DATE");

$command = new CreateTable("event", array($idField, $nameField, $descriptionField, $dateField));

$errorInfo = SQLTools::execute($command)->errorInfo();

if (!empty($errorInfo) && $errorInfo[0] != '00000')
{
    print_r($errorInfo);
}

else
{
    echo "Everything is gonna be alright";
}