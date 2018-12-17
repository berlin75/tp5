<?php
namespace app\admin\validate;
use think\Validate;
class Authrule extends Validate{
	protected $rule = [
		'name'      => 'require|max:80|unique:think_auth_rule',
		'title'     => 'require|max:20',
		'sort'      => 'number|min:0|egt:0',
		'condition' => 'max:100',
	];
	protected $message = [
		'name.require' => '规则标识不能为空',
		'name.max'     => '规则标识最多不能超过80个字符',
		'name.unique'  => '规则标识已存在，不能重复',
		'title.require'=> '规则名称不能为空',
		'title.max'    => '规则名称最多不能超过20个字符',
		'sort.max' 	   => '排序最多不能超过6个字符',
		'sort.egt' 	   => '排序必须是正整数',
		'sort.number'  => '排序必须是正整数',	
		'condition.max'=> '规则表达式最多不能超过100个字符',
	];
}