<?php
namespace app\admin\model;

class Login extends \think\Model{
	public function login($username,$password,$captcha){ 
		if(!captcha_check($captcha)) return 0;
		$data=db('think_members')->where(['username'=>input('username')])->find();

		if($data['password']==md5($password)){
			if($data['typeof']==0){   //非管理员
				return 3;
			}
			session('uid',$data['uid']);
			session('username',input('username'));
			session('adminpass',1);
			db('think_members')->update(['uid'=>$data['uid'],'logintime'=>time(),'loginip'=>request()->ip()]);
			db('think_members')->where('uid',$data['uid'])->setInc('logincount');
			return 1;
		}else{
			return 2;
		}
	}

}