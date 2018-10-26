<?php
namespace app\admin\validate;
use think\Validate;
class Authgroup extends Validate{
	protected $rule = [
		'title'     => 'require|max:100|unique:think_auth_group',
	];
	protected $message = [
		'title.require'=> '用户组名称不能为空',
		'title.max'    => '用户组名称最多不能超过100个字符',
		'title.unique' => '用户组名称已存在，不能重复'
	];
}