<?php
/**
 * Created by PhpStorm.
 * Users: chenweihua
 * Date: 2019/10/13
 * Time: 6:10 PM
 */

namespace app\admin\controller;


use app\BaseController;
use think\facade\View;

class Users extends BaseController
{
    public function admin()
    {
        if (request()->isPost()) {
            $admin = new \app\admin\model\Users();
            $status = $admin->login(input('username'), input('password'));
            if ($status == 1) {
                session('admin',$status);
                return $this->success('success', 'admin/index/index');
            } elseif ($status == 2) {
                return $this->error('账号或密码错误');
            } else {
                return $this->error('用户不存在');
            }
        }
        return View::fetch();
    }

    public function checkCode()
    {
        $code = input('captcha');

    }

    public function page()
    {
        return View::fetch();
    }
}