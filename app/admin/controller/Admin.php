<?php
/**
 * Created by PhpStorm.
 * Users: chenweihua
 * Date: 2019/10/15
 * Time: 10:43 AM
 */

namespace app\admin\controller;


use app\BaseController;
use think\facade\Db;
use think\facade\View;


class Admin extends BaseController
{
    public function index()
    {
//        $list = Db::name('admin')->select();
//        //var_dump($list);exit;
//        view::assign('list',$list);
        return View::fetch();
    }

    public function lists()
    {
        $lists = Db::name('users')->paginate(15)->toArray();
        View::assign('lists',$lists);
        return $this->listsData($lists['data'], $lists['total']);
    }

    public function listsData($data, $total)
    {
        return json(['code' => 0,'data' => $data, 'count' => $total]);
    }

    public function create()
    {
        if (request()->isPost()){
            $data = [
                'username' => input('username'),
                'password' => md5(input('password')),
            ];
            if (Db::name('users')->insert($data)){
                return $this->success('success！','index');
            }else{
                return $this->error('error!','index');
            }
        }
        return View();
    }

    public function edit()
    {
        $id = input('id');
        $data = Db::name('users')->where('id',$id)->find();
        //var_dump($id);exit;
        View::assign('data',$data);
        if (request()->isPost()){
            $result = [
                'username' => input('username'),
                'password' => md5(input('password')),
            ];
            if (Db::name('users')->where('id',$id)->update($result)){
                return $this->success('success!','index');
            }else{
                return $this->error('error!','index');
            }
        }
        return View();
    }

    public function del()
    {
        if(request()->isPost()){
            $id = input('id');
            if (Db::name('users')->where('id',$id)->delete()){
                return $this->success('success！','index');
            }else{
                return $this->error('error！','index');
            }
        }
    }
}