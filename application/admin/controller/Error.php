<?php
namespace app\admin\controller;

class Error extends Common{
	public function index(){
		return $this->error('页面错误：该控制器不存在！');
	}

	public function _empty(){
		return $this->error('页面错误：该控制器或方法不存在！');
	}
}