<?php

/**
 * ファイルパス : C:\xampp\htdocs\training\index.php
 * ファイル名 : index.php
 * アクセスURL : http://localhost/training/index.php
 * 各コントローラーに振り分けるプログラム
 */

namespace training;

require_once dirname(__FILE__). '\Bootstrap.class.php';

use training\controllers\DetailController;
use training\controllers\SearchController;
use training\controllers\FavoriteController;

$display = (isset($_GET['display']) === true) ? $_GET['display'] : 'search';

// テンプレートを指定
$loader = new \Twig_Loader_Filesystem(Bootstrap::TEMPLATE_DIR);
$twig = new \Twig_Environment($loader, [ 'cache' => Bootstrap::CACHE_DIR]);

// displayによってどのコントローラーを使用するか選択する
switch ($display) {
    case 'search':
        $ctrl = new SearchController($twig);
        $ctrl->SearchDisplayAction();
    break;

    case 'detail':
        $ctrl = new DetailController($twig);
        $ctrl->detailDisplayAction();
    break;

    case 'favorite':
        $ctrl = new FavoriteController($twig);
        $ctrl->favoriteDisplayAction();
    break;
}

?>