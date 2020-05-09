<?php

/**
 * ファイルパス : C:\xampp\htdocs\training\models\PDODatabase.class.php
 * ファイル名 : PDODatabase.class.php (商品に関するプログラムのクラスファイル,Model)
 */

namespace training\models;

class PDODatabase
{
    private $dbh = NULL;

    protected function __construct($db_host, $db_port, $db_user, $db_pass, $db_name, $db_type)
    {
        $this->dbh = $this->connectDB($db_host, $db_port, $db_user, $db_pass, $db_name, $db_type);
    }

    private function connectDB($db_host, $db_port, $db_user, $db_pass, $db_name, $db_type)
    {
        try {
            // 接続エラー発生→PDOExceptionオブジェクトがスローされる→例外処理をキャッチする
            switch ($db_type) {
                case 'mysql':
                    $dsn = 'mysql:host=' . $db_host . ':dbname' . $db_name;
                    $dbh = new \PDO($dsn, $db_user, $db_pass);
                    $dbh->query('SET NAMES utf8');
                    break;

                case 'pgsql':
                    $dsn = 'pgsql:dbname=' . $db_name . ' host=' . $db_host . ' port=' . $db_port;
                    $dbh = new \PDO($dsn, $db_user, $db_pass);
                    break;
            }
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
            exit();
        }
        return $dbh;
    }

    protected function select($column = '', $where = '', $arrVal = [], $join = '', $joinTable = '', $joinOn = '')
    {
        $sql = $this->getSql('select', $this->getTable(), $where, $column, $join, $joinTable, $joinOn);
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($arrVal);

        // データを配列に格納
        $data = [];
        while ($result = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($data, $result);
        }
        return $data;
    }

    protected function count($where = '', $arrVal = [])
    {
        $sql = $this->getSql('count', $this->getTable(), $where);
        $stmt = $this->dbh->prepare($sql);

        $stmt->execute($arrVal);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        return intval($result['NUM']);
    }

    private function getSql($type, $table, $where = '', $column = '', $join = '', $joinTable = '', $joinOn = '')
    {
        switch ($type) {
            case 'select':
                $columnKey = ($column !== '') ? $column : "*";
                break;

            case 'count':
                $columnKey = 'COUNT(*) AS NUM';
                break;

            default:
                break;
        }

        $joinSQL = ($join !== '') ? $join . ' JOIN ' . $joinTable . ' ON ' . $joinOn : '';
        $whereSQL = ($where !== '') ? ' WHERE ' . $where : '';

        // sql文の発行
        $sql = " SELECT " . $columnKey . " FROM " . $table . $joinSQL . $whereSQL;


        return $sql;
    }

    protected function insert($insData = [])
    {
        list($preSt, $insDataVal, $columns) = $this->getPreparedStatement('insert', $insData);
        $sql = " INSERT INTO " . $this->getTable() . "(" . $columns . ") VALUES (" . $preSt . ") ";
        $stmt = $this->dbh->prepare($sql);
        $res = $stmt->execute($insDataVal);

        return $res;
    }

    protected function update($insData = [], $where, $arrWhereVal = [])
    {
        list($preSt, $insDataVal) = $this->getPreparedStatement('update', $insData);

        // sql文の発行
        $sql = " UPDATE " . $this->getTable() . " SET " . $preSt . " WHERE " . $where;

        $updateData = array_merge($insDataVal, $arrWhereVal);
        $stmt = $this->dbh->prepare($sql);
        $res = $stmt->execute($updateData);
        return $res;
    }

    private function getPreparedStatement($mode, $insData)
    {
        if (empty($insData)) {
            return false;
        }

        $insDataKey = array_keys($insData);
        $insDataVal = array_values($insData);
        $preCnt = count($insDataKey);

        switch ($mode) {
            case 'insert':
                $columns = implode(',', $insDataKey);
                $arrPreSt = array_fill(0, $preCnt, '?');
                $preSt = implode(',', $arrPreSt);
                return [$preSt, $insDataVal, $columns];

            case 'update':
                for ($i = 0; $i < $preCnt; $i++) {
                    $arrPreSt[$i] = $insDataKey[$i] . " =? ";
                }
                $preSt = implode(',', $arrPreSt);
                return [$preSt, $insDataVal];
        }
    }

    protected function getLastId()
    {
        return $this->dbh->lastInsertId();
    }

    protected function delTableFlg($delFlg)
    {
        $sql = " DELETE FROM favorite WHERE delete_flg = :flg ";
        $stmt = $this->dbh->prepare($sql);
        $res2 = $stmt->execute($delFlg);
        return $res2;

    }
}
