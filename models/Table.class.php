<?php

/**
 * ファイルパス : C:\xampp\htdocs\training\models\Table.class.php
 * ファイル名 : Table.class.php
 */

namespace training\models;

use training\models\PDODatabase;
use training\Bootstrap;


class Table extends PDODatabase
{
    private $db;
    private $tableName;

    protected function __construct()
    {
        $this->db = parent::__construct(Bootstrap::DB_HOST, Bootstrap::DB_PORT, Bootstrap::DB_USER, Bootstrap::DB_PASS, Bootstrap::DB_NAME, Bootstrap::DB_TYPE);
    }

    protected function setTable($tableName)
    {
        $this->tableName = " ". $tableName . " ";
    }

    protected function getTable()
    {
        return $this->tableName;
    }
}

?>