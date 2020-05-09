<?php

/**
 * ファイルパス : C:\xampp\htdocs\training\models\Session.class.php
 * ファイル名 : Session.class.php
 */

namespace training\models;

use training\models\Table;

class Session extends Table
{
    private $session_key = '';

    public function __construct()
    {
        // セッションをスタートする
        session_start();
        // セッションIDを取得する
        $this->session_key = session_id();
        // DBへの登録
        parent::__construct();
        $this->setTable('session');
    }

    public function checkSession()
    {
        // セッションIDのチェック
        $customer_no = $this->selectSession();
        // セッションIDがある
        if ($customer_no !== false) {
            $_SESSION['customer_no'] = $customer_no;
        } else {
            // セッションIDがない
            $res = $this->insertSession();
            if ($res === true) {
                $_SESSION['customer_no'] = parent::getLastId();
            } else {
                $_SESSION['customer_no'] = '';
            }
        }
    }

    private function selectSession()
    {
        $col = ' customer_no ';
        $where = ' session_key = ? ';
        $arrVal = [$this->session_key];

        $res = parent::select($col, $where, $arrVal);
        return (count($res) !== 0) ? $res[0]['customer_no'] : false;
    }

    private function insertSession()
    {
        $insData = ['session_key' => $this->session_key];
        $res = parent::insert($insData);
        return $res;
    }
}

?>