<?php
namespace app\token\controller;
use \app\token\model\Users;

class Login{
    private function makeToken(){
        return sha1(md5(uniqid(md5(microtime(true)), true))); //生成一个40位不会重复的字符串,加密
    }

    // curl http://localhost/tp5/token/login/register
    public function register(){
        $user = new Users;
        $res = $user->save(['token' => $this->makeToken(), 'time_out' => strtotime("+3 minute")
        ],['uid' => 1]);       
        return json($res);
    }

    // curl http://localhost/tp5/token/login/checkToken?token=d93ef3794cc0d7d7afa0aef2402b4fe13b19edb7
	public function checkToken(){ 
        $token = input('token');
        if(strlen($token) !== 40) return "token error";        //token错误,验证失败
        $res = Users::where('token', $token)->value('time_out');
        if ($res === null ) return "token error";              //token错误,验证失败
        if (time() > $res)  return "token faild,rellogin";     //token长时间未使用而过期,需重新登陆
        $res = Users::update(['time_out' => strtotime("+3 minute")], ['token' => $token]);
        if ($res) return "token success";      //token验证成功，time_out刷新成功，可以获取接口信息
    }

    // curl -d "username=admin&password=admin" http://localhost/tp5/token/login/userLogin
    public function userLogin(){
        if(!request()->isPost()) return "invilid request";
        $username = input('username');
        $password = input('password');
        $user = Users::get(['username' => $username]);
        if ($user == null) {
            return json(["user"=>$username,"code"=>"400","msg"=>"用户不存在"]);
        } 
        if ($user->password !== sha1(md5($password))) {
            return json(["user"=>$username,"code"=>"401","msg"=>"密码错误"]);
        }
        //session('user', $username);
        $token = $this->makeToken();
        $res = Users::update(['time_out' => strtotime("+3 minute"), 'token' => $token], ['username' => $username]);
        if ($res) {
            return json(["user"=>$username,"toekn"=>$token,"code"=>"0","msg"=>"登录成功"]);
        }
    }
}