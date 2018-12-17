<?php
namespace app\admin\validate;
use think\Validate;
class Flink extends Validate{
	protected $rule = [
		'title'   => 'require|max:30|unique:flink',
        'urldesc' => 'max:255',
        'urlpath' => 'require|max:60|url',
	];
	protected $message = [
		'title.require' => '链接名称不能为空',
		'title.max' 	=> '链接名称最多不能超过30个字符',
		'title.unique'  => '链接名称已存在，不能重复',
		'urldesc.max'   => '链接描述最多不能超过300个字符',
		'urlpath.require'   => '链接地址不能为空',
		'urlpath.max'       => '链接地址最多不能超过60个字符',
		'urlpath.url'       => '链接地址不合格',
	];
}