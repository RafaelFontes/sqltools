<?php

namespace SQLTools;


class SQLConfig {
    private $host;
    private $db;
    private $user;
    private $pwd;

    public function __construct($host, $user, $pwd="", $db="")
    {
        $this->host = $host;
        $this->user = $user;
        $this->pwd = $pwd;
        $this->db = $db;
    }

    public function getConnectionString()
    {
        $dsn = "mysql:host={$this->host};";

        if ($this->db) $dsn .= "dbname=" . $this->db;

        return $dsn;

    }
    /**
     * @param mixed $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param mixed $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param mixed $pwd
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
    }

    /**
     * @return mixed
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
} 