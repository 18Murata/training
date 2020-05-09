<?php

/**
 * ファイルパス : C:\xampp\htdocs\training\models\Menu.class.php
 * ファイル名 : Menu.class.php (メニューに関するプログラム)
 */

namespace training\models;

class Menu extends Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setTable('menu');
    }

    // メニューリストを取得する
    public function getMenuList($ctg_id)
    {
        // カテゴリーによって表示させるアイテムを変える
        $col = ' menu_id, menu_name, ctg_id';
        $where = ($ctg_id !== '') ? 'ctg_id = ?': '';
        $arrVal = ($ctg_id !== '') ? [$ctg_id] : [];
        
        $res = parent::select($col, $where, $arrVal);

        return ($res !== false && count($res) !== 0) ? $res : false;
    }

    public function getMenuDetailData($menu_id)
    {
        $col = ' menu_id, menu_name, detail, ctg_id';

        $where = ($menu_id !== '') ? ' menu_id = ?' : '';
        // カテゴリーによって表示させるアイテムをかえる
        $arrVal = ($menu_id !== '') ? [$menu_id] : [];

        $res = parent::select($col, $where, $arrVal);

        return ($res !== false && count($res) !== 0) ? $res : false;
    }
}

?>