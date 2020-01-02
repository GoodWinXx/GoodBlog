<?php
/**
 * Created by PhpStorm.
 * User: chenweihua
 * Date: 2019/10/7
 * Time: 2:27 PM
 */

namespace app\admin\controller;

use app\BaseController;
use pay\Paydemo;

class Pay extends BaseController
{
    public function demo()
    {
        //$money = input('money');
        //var_dump($money);exit;
        $obj = new Paydemo;
        $result =  $obj -> pay();
        return json($result);
    }
}