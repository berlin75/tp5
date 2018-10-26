<?php
namespace app\admin\validate;
use think\Validate;
class Cate extends Validate{
	protected $rule = [
		'catename' => 'require|chsDash|max:30|unique:cate',
		'keywords' => 'max:150',
		'catedesc' => 'max:300',
	];
	protected $message = [
		'catename.require' => '栏目名称必须',
		'catename.chsDash' => '栏目名称只能是汉字、字母、数字和下划线_及破折号',
		'catename.max' 	   => '栏目名称最多不能超过30个字符',
		'catename.unique'  => '栏目名称已存在，不能重复',
		'keywords.max'     => '关键词最多不能超过150个字符',
		'catedesc.max'     => '栏目描述最多不能超过300个字符',
	];
}