<?php
namespace app\admin\controller;
use app\admin\model\Login as Logmodel;         

class Login extends \think\Controller{
	public function index(){           //使用模型处理登录
		if(request()->isPost()){  
			//dump(input('post.'));die;      
			$login=new Logmodel;      //实例化模型并调用其Login()方法
			$status=$login->login(input('username'),input('password'),input('captcha'));		
			if($status==0){
				$this->error('验证码错误！');
			}elseif($status==1){
				$this->redirect('admin/index/index');
			}elseif($status==2){
				$this->error('用户名或密码错误！');
			}elseif($status==3){
				$this->error('您的权限不足！','index/index/index');  //非管理员
			}
			return;
 		}
        return view();
	}

    public function logout(){ 
    	session(null);
    	$this->redirect('login/index');
    }
}