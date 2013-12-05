<?php

namespace SQLTools;

use SQLTools\Base\ICommand;
use SQLTools\Command\AddForeignKey;
use SQLTools\Command\CreateDataBase;
use SQLTools\Command\CreateTable;

class SQLTools {

    static private $instance;

    /**
     * @var SQLConfig $config
     */
    private $config;

    public $debug=false;

    static public function getConfig()
    {
        return self::getInstance()->getSqlConfig();
    }

    public function getSqlConfig()
    {
        return $this->config;
    }

    /**
     * @param SQLConfig $config
     * @return SQLTools
     */
    static private function getInstance(SQLConfig $config=null)
    {
        if (!self::$instance || $config)
        {
            self::$instance = new SQLTools($config);
        }

        return self::$instance;
    }

    /**
     * @param SQLConfig $config
     */
    private function __construct(SQLConfig $config)
    {
        $this->config = $config;
    }

    /**
     * @param SQLConfig $config
     * @return SQLTools
     */
    static public function configure(SQLConfig $config)
    {
        return self::getInstance($config);
    }

    static public function getConnection()
    {
        $self = self::getInstance();
        return new \PDO($self->config->getConnectionString(), $self->config->getUser(), $self->config->getPwd());
    }

    /**
     * @param ICommand $command
     * @param array $data
     * @return null|\PDOStatement
     */
    private function exec(ICommand $command, array $data = null)
    {
        $pdo = $this->getConnection();

        $pdo->beginTransaction();

        try
        {

            $sql = $command->getSql();
            if ($this->debug) echo $sql."\n";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);

            $pdo->commit();

            return $stmt;
        }
        catch(\PDOException $e)
        {
            echo $e->getTraceAsString();
            $pdo->rollBack();
        }

        return null;
    }

    /**
     * @param ICommand $command
     * @param array $data
     * @return null|\PDOStatement
     */
    static public function execute(ICommand $command, array $data=null)
    {
        return self::getInstance()->exec($command, $data);
    }

    /**
     * @param $name
     * @param string $collation
     * @return null|\PDOStatement
     */
    static public function create_database($name, $collation="utf8_general_ci")
    {
        return self::execute(new CreateDataBase($name, $collation));
    }

    /**
     * @param null $table
     * @param array $fields
     * @param string $engine
     * @param string $charset
     * @param bool $isTemporary
     * @param bool $createIfNotExists
     * @return null|\PDOStatement
     */
    static public function create_table($table=null, array $fields = array(), $engine = "InnoDB",
                                        $charset="utf8_unicode_ci", $isTemporary=false, $createIfNotExists = false)
    {
        return self::execute(new CreateTable($table, $fields, $engine, $charset, $isTemporary, $createIfNotExists));
    }

    /**
     * @param $table
     * @param $localField
     * @param $foreignTable
     * @param $foreignField
     * @param null $name
     * @return null|\PDOStatement
     */
    static public function setRelation($table, $localField, $foreignTable, $foreignField, $name = null)
    {
        return self::execute(new AddForeignKey($table, $localField, $foreignTable, $foreignField, $name));
    }

}