<?php

/**
 * ファイルパス : C:\xampp\htdocs\training\controllers\FavoriteController.class.php
 * ファイル名 : FavoriteController.class.php (お気に入り機能)
 */

namespace training\Controllers;

use training\models\Favorite;
use training\models\Session;

class FavoriteController
{
    private $session;
    private $favorite;
    private $twig;
    private $customer_no;

    public function __construct($twig)
    {
        $this->twig = $twig;
        $this->session = new Session();
        $this->favorite = new Favorite();

        // セッションキー
        $this->session->checkSession();
        $this->customer_no = $_SESSION['customer_no'];
    }

    public function favoriteDisplayAction()
    {
        // 画面外から渡されたパラメーターの値を取得する
        $menu_id = (isset($_GET['menu_id']) === true && preg_match('/^\d+$/', $_GET['menu_id']) === 1) ? $_GET['menu_id'] : '';
        $fav_id = (isset($_GET['fav_id']) === true && preg_match('/^\d+$/', $_GET['fav_id']) === 1) ? $_GET['fav_id'] : '';

        if ($menu_id !== '') {
            $this->insertFavoriteAction($menu_id);
        }

        if ($fav_id !== '') {
            $this->deleteFavoriteAction($fav_id);
        }

        $dataArr = $this->favorite->getFavoriteData($this->customer_no);
        $context = [];
        $context['dataArr'] = $dataArr;
        $template = $this->twig->loadTemplate('favorite.html.twig');
        $template->display($context);
    }

    private function insertFavoriteAction($menu_id)
    {
        $res = $this->favorite->insFavoriteData($this->customer_no, $menu_id);

        if ($res === false) {
            header("Location: http://localhost/training/index.php?display=favorite");
            exit;
        }
    }

    private function deleteFavoriteAction($fav_id)
    {
        $res = $this->favorite->delFavoriteData($fav_id);
        $res2 = $this->favorite->delTable();

        if ($res === false) {   
            echo "お気に入り削除に失敗しました";
            exit();
        }
    }
}

?>