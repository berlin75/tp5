<?php
namespace app\admin\controller;

class Common extends \think\Controller{
    public function _initialize(){   
        if(!session('username')){
			return $this->redirect('Login/index');
		}
		if(!session('?adminpass')){  //必须后台登录之后才能进入防止会员前端登录之后直接跳转后台
			return $this->error('页面错误！');
		}

		//至此已经保证是管理员登录，而且是地址栏进入登录页面登录的
		//开始验证管理员的权限

		//获取当前的模块/控制器/方法
		$module = request()->module();
		$controller = request()->controller();
		$action = request()->action();
		// 获取auth实例
		$Auth = new \app\common\controller\Auth();
		if($controller != 'Index' && session('uid') != 1){        //不是首页并且不是超管就要验证权限
			if(!$Auth->check($module.'/'.$controller.'/'.$action, session('uid'))){
				$this->error('您的权限不足！');
			}
		}
    }
}