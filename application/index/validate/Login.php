<?php
namespace app\index\validate;
use think\Validate;
class Login extends Validate{
	protected $rule = [
		'username'   => 'require|chsDash|max:30',
		'password'   => 'require|min:5|max:12|alphaDash',
		'password_confirm' => 'require|confirm:password',
		'tel'        =>  'require|length:11|number|unique:think_members',
	];
	protected $message = [
		'username.require'    => '用户名不能为空',
		'username.chsDash'    => '用户名必须是汉字、字母、数字和下划线_及破折号',
		'username.max'        => '用户名最多不能超过30个字符',
		'password.require'    => '密码不能为空',
		'password.min'        => '密码最少不能低于5个字符',
		'password.max'        => '密码最多不能超过12个字符',
		'password.alphaDash'  => '密码必须是字母 数字 下划线 破折号',
		'password_confirm.require' => '确认密码不能为空',
		'password_confirm.confirm' => '两次密码不一致',
		'tel.require'         => '手机号码不能为空',
		'tel.number'          => '手机号码错误',
		'tel.length'          => '手机号码错误',
		'tel.unique'          => '该手机号码已注册',
	];
	protected $scene = [
			'log' => ['username','password'],
			'reg' => ['username','password','password_confirm','tel'],
	];
}