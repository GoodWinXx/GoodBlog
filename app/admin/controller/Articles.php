<?php
/**
 * Created by PhpStorm.
 * Users: chenweihua
 * Date: 2019/10/17
 * Time: 1:18 AM
 */

namespace app\admin\controller;


use app\BaseController;
use think\facade\Db;
use think\facade\View;

class Articles extends BaseController
{
    public function index()
    {
        return View::fetch();
    }

    public function lists()
    {
        $lists = Db::name('articles')->paginate(15)->toArray();
        View::assign('lists',$lists);
        return $this->listsData($lists['data'], $lists['total']);
    }

    public function listsData($data, $total)
    {
        return json(['code' => 0,'data' => $data, 'count' => $total]);
    }

    public function create()
    {
        //分类模版赋值
        $cate = Db::name('category')->select();
        View::assign('cate',$cate);

        //获取分类id
        $category = input('cate');
        $status = isset($_POST['status']) ? $_POST['status'] : '0';
        if (request()->isPost()){
            $data = [
                'title' => input('title'),
                'keywords' => input('keywords'),
                'author' => input('author'),
                'create_time' => input('create_time'),
                'cate_id' => $category,
                'content' => input('content'),
                'status' => $status,
            ];
            dump($data);exit;
            if (Db::name('articles')->insert($data)){
                return $this->success('success','index');
            }else{
                return $this->error('error','index');
            }
        }
        return View::fetch();
    }

    public function edit()
    {
        $id = input('id');
        $result = Db::name('articles')->where('id',$id)->find();
        View::assign('result',$result);

        $status = isset($_POST['status']) ? $_POST['status'] : '0';
        if (request()->isPost()){
            $data = [
                'title' => input('title'),
                'keywords' => input('keywords'),
                'author' => input('author'),
                'content' => input('content'),
                'create_time' => strtotime(input('create_time')),
                'status' => $status,
            ];
            if (Db::name('articles')->where('id',$id)->update($data)){
                return $this->success('success','index');
            }else{
                return $this->error('error','index');
            }
        }
        return View::fetch();
    }

    public function del()
    {
        $id = $_POST['id'];
        if (Db::name('articles')->delete($id)){
            return $this->success('success','index');
        }else{
            return $this->error('error','index');
        }
    }
}