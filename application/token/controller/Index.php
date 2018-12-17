<?php
namespace app\token\controller;
class Index{
	public function index(){
		$token = "0251d7f3172cc9c8733485308bb22ee93151d115";
		$login = new \app\token\controller\Login;
		$res = $login->checkToken($token);
		if($res == 90001){
		    echo 'ok';
		}else if($res == 90002){
		    echo 'err';
		}else if($res == 90003){
		    echo 'relogin';
		}
	}
}