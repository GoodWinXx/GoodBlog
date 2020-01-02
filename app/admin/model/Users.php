<?php
/**
 * Created by PhpStorm.
 * Users: chenweihua
 * Date: 2019/10/14
 * Time: 12:54 AM
 */

namespace app\admin\model;


use think\facade\Db;
use think\Model;

class Users extends Model
{
    public function login($username,$password,$captche)
    {
        $captche = input('captche');
        $admin = Db::name('users')->where('username','=',$username)->find();
        if ($admin)
        {
            if($admin['password'] == $password){
                if (captcha_check($captche)){
                    return 1;
                }else{
                    echo "<script> alert('验证码错误')</script>";
                }
            }else{
                return 2;
            }
        }else{
            return 3;
        }
    }
}