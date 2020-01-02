<?php
/**
 * Created by PhpStorm.
 * User: chenweihua
 * Date: 2019/12/29
 * Time: 5:38 PM
 */

namespace app\admin\controller;


use app\BaseController;
use think\facade\Db;
use think\facade\View;

class Page extends BaseController
{
    public function homePage()
    {
        $articles = Db::name('articles')->select();
        $view = Db::name('articles')->order('click')->limit('6')->select();
//        dump($view);
        View::assign('view',$view);
        View::assign('articles',$articles);
        return View::fetch();
    }

    public function search()
    {
        $keyword = input('keyword');
        $list = Db::name('articles')->where('title','like',"%".$keyword."%")->select();
        View::assign('list',$list);
        return View::fetch();
    }

}