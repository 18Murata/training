<?php

/**
 * ファイルパス : C:\xampp\htdocs\training\controllers\SearchController.class.php
 * ファイル名 : SearchController.class.php 
 */

namespace training\controllers;

use training\models\Category;
use training\models\Menu;
use training\models\Session;

class SearchController
{
    private $session;
    private $menu;
    private $category;
    private $twig;

    public function __construct($twig)
    {
        $this->twig = $twig;

        // テーブル情報をセットする
        $this->session = new Session();
        $this->menu = new Menu();
        $this->category = new Category();

        // セッションキーでDBへの登録状況を確認する
        $this->session->checkSession();
    }

    public function SearchDisplayAction()
    {
        // 画面から渡されたリクエストパラメーターの値を取得する
        $ctg_id = (isset($_GET['ctg_id']) === true && preg_match('/^[0-9]+$/', $_GET['ctg_id']) === 1) ? $_GET['ctg_id'] : '';

        // カテゴリーリストを取得する
        $cateArr = $this->category->getCategoryList();
        // メニューリストを取得する
        $dataArr = $this->menu->getMenuList($ctg_id);

        $context = [];
        $context['cateArr'] = $cateArr;
        $context['dataArr'] = $dataArr;

        // テンプレート
        $template = $this->twig->loadTemplate('search.html.twig');
        $template->display($context);
    }
}

?>