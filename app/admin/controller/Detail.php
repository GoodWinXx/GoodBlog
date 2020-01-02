<?php
/**
 * Created by PhpStorm.
 * User: chenweihua
 * Date: 2019/12/29
 * Time: 6:22 PM
 */

namespace app\admin\controller;


use app\BaseController;
use Parsedown;
use think\facade\Db;
use think\facade\View;

class Detail extends BaseController
{
    public function article($id)
    {
        $view=Db::name('articles')->where('id',$id)->inc('click',1)->update();
        $Parsedown = new Parsedown();
        $data = Db::name('articles')->where('id',$id)->find();
        $result = $Parsedown->text($data['content']);
        View::assign('view',$view);
        View::assign('data',$data);
        View::assign('result',$result);
        return View::fetch();
    }
}