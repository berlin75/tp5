<?php
namespace app\admin\validate;
use think\Validate;
class Members extends Validate{
	protected $rule = [
		'username' => 'require|chsDash|max:30|unique:think_members',
		'authgroup'=> 'require',
		'password' => 'require|min:5|max:12|alphaDash',
	];
	protected $message = [
		'username.require'    => '用户名不能为空',
		'username.chsDash'    => '用户名必须是汉字、字母、数字和下划线_及破折号',
		'username.max'        => '用户名最多不能超过30个字符',
		'username.unique'     => '用户名已存在，不能重复',
		'authgroup.require'   => '属于用户组为必选',
		'password.require'    => '密码不能为空',
		'password.min'        => '密码最少不能低于5个字符',
		'password.max'        => '密码最多不能超过12个字符',
		'password.alphaDash'  => '密码必须是字母 数字 下划线 破折号',
	];

	protected $scene = [
			'edit' => ['username'],
	];
}