<?php
/**
 * Created by PhpStorm.
 * User: chenweihua
 * Date: 2019/12/28
 * Time: 4:10 AM
 */

namespace app\index\controller;


use think\facade\View;


class index {
    public function index()
    {
        return View::fetch();
    }

}