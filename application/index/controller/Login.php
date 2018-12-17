<?php
namespace app\index\controller;

class Login extends Common{
    public function index(){
    	if(session('username')){
    		return $this->error('您已经是登录状态！', 'index/index/index');
		}
    	if(request()->isPost()){ 
    		if(!captcha_check(input('captcha'))){            //验证码校对
    			return $this->error('请输入正确的验证码！');
    		}
			$validate = validate('Login');
			if(!$validate->scene('log')->check(input('post.'))){
	        	return $this->error($validate->getError());
	        }
			$data=db('think_members')->where(['username'=>input('username')])->find();
			if($data['password']!==md5(input('password'))){
				return $this->error('用户名或密码错误！');
			}
			if($data['locked']==1){
				return $this->error('您的账户已被系统锁定，暂时无法登陆！');
			}
			session('uid',$data['uid']);
			session('username',input('username'));
			session('logintime',time());
			session('loginip',request()->ip());
			db('think_members')->update(['uid'=>$data['uid'],'logintime'=>time(),'loginip'=>request()->ip()]);
			db('think_members')->where('uid',$data['uid'])->setInc('logincount');
			$preurl = input('preurl') ?: 'index/index/index';
			return $this->redirect($preurl);  //跳转至原先页面
		}
        return view();
    }

    public function register(){
    	if(session('username')){
    		return $this->error('您已经是登录状态！', 'index/index/index');
		}
    	if(request()->isPost()){ 
    		if(!captcha_check(input('captcha'))){            //验证码校对
    			return $this->error('请输入正确的验证码！');
    		}
			$validate = validate('Login');
			if(!$validate->scene('reg')->check(input('post.'))){
            	return $this->error($validate->getError());
            }
            $data=[
                'username' => input('username'),
                'password' => md5(input('password')),
                'tel'      => input('tel'),
                'regtime'  => time(),
                'logintime'=> time(),
                'loginip'  => request()->ip()
            ];
            $result=db('think_members')->field('username,password,tel,regtime,logintime,loginip')->insertGetId($data);
			if($result){
                if(db('think_auth_group_access')->insert(['uid'=>$result,'group_id'=>8])){
                	session('uid',$result);
					session('username',input('username'));
					session('logintime',time());
					session('loginip',request()->ip());
					$preurl = input('preurl') || 'index/index/index';
                    return $this->success('注册成功，正在跳转',$preurl); 
                }else{
                    return $this->error('注册失败');
                }
            };	
    	}
        return view();
    }

    public function logout(){ 
    	session(null);
    	$this->redirect('login/index');
    }
}