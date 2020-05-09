<?php

/**
 * ファイルパス : C:\xampp\htdocs\training\controllers\DetailController.class.php
 * ファイル名 : DetailController.class.php(Menuを表示)
 */

namespace training\controllers;

use training\models\Category;
use training\models\Menu;
use training\models\Session;

class DetailController
{
    private $category;
    private $menu;
    private $session;
    private $twig;

    public function __construct($twig)
    {
        $this->twig = $twig;
        $this->category = new Category();
        $this->menu = new Menu();
        $this->session = new Session();

        // セッションキーでDBへの登録状況を確認する
        $this->session->checkSession();
    }

    public function detailDisplayAction()
    {
        // 画面から渡されたリクエストパラメーターの値を取得する
        $menu_id = (isset($_GET['menu_id']) === true && preg_match('/^\d+$/', $_GET['menu_id']) === 1) ? $_GET['menu_id'] : '';

        if ($menu_id === '') header('Location: '. Bootstrap::ENTRY_URL. 'index.php');

        $cateArr = $this->category->getCategoryList();

        $menuData = $this->menu->getMenuDetailData($menu_id);

        $context = [];
        $context['cateArr'] = $cateArr;
        $context['menuData'] = $menuData[0];

        // テンプレート
        $template = $this->twig->loadTemplate('detail.html.twig');

        $template->display($context);
    }
}

?>