<?php

/**
 * ファイルパス : C:\xampp\htdocs\training\models\Favorite.class.php
 * ファイル名 : Favorite.class.php(お気に入り機能)
 */

namespace training\models;

use training\models\Table;

class Favorite extends Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setTable('favorite');
    }

    public function insFavoriteData($customer_no, $menu_id)
    {
        $insData = [
            'customer_no' => $customer_no,
            'menu_id' => $menu_id,
            'delete_flg' => 0,
        ];
        return parent::insert($insData);
    }

    public function getFavoriteData($customer_no)
    {
        $menu = new Menu();
        $column = ' favorite.fav_id, i.menu_id, i.menu_name, i.detail';
        $join = ' LEFT ';
        $joinTable = $menu->getTable() . ' i ';
        $joinOn = ' favorite.menu_id = i.menu_id ';
        $where = ' favorite.customer_no = ? AND favorite.delete_flg = ?';
        $arrVal = [$customer_no, 0];

        return parent::select($column, $where, $arrVal, $join, $joinTable, $joinOn);
    }

    public function delFavoriteData($fav_id)
    {
        $insData = ['delete_flg' => 1];
        $where = 'fav_id = ?';
        $arrWhereVal = [$fav_id];

        return parent::update($insData, $where, $arrWhereVal);
    }

    public function delTable()
    {
        $delFlg = [':flg' => 1];

        return parent::delTableFlg($delFlg);
    }

}

?>