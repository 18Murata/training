<?php

/**
 * ファイルパス : C:\xampp\htdocs\training\models\Category.class.php
 * ファイル名 : Category.class.php
 */

namespace training\models;

use training\models\Table;

class Category extends Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setTable('category');
    }

    // カテゴリーリストの取得
    public function getCategoryList()
    {
        $col = ' ctg_id, category_name';
        $res = parent::select($col);
        return $res;
    }
}

?>