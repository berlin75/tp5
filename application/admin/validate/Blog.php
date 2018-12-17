<?php
namespace app\admin\validate;
use think\Validate;
class Blog extends Validate{
	protected $rule = [
		'title'    => 'require|max:100|unique:blog',
		'stitle'   => 'require|max:30|unique:blog',
		'cateid'   => 'require|number',
		'blogkeywords' => 'require|max:150',
		'blogdesc' => 'max:255',
		'pic'      => 'max:150',
		'picdesc'  => 'max:30',
		'content'  => 'require',
		'click'    => 'number',
	];
	protected $message = [
		'title.require' => '标题不能为空',
		'title.max' 	=> '标题最多不能超过100个字符',
		'title.unique'  => '标题已存在，不能重复',
		'stitle.require'=> '短标题不能为空',
		'stitle.max' 	=> '短标题最多不能超过30个字符,10个汉字',
		'stitle.unique' => '短标题已存在，不能重复',
		'cateid.require'=> '所属栏目为必选',
		'cateid.number' => '所属栏目为必选',	
		'blogkeywords.require'  => '关键词不能为空',
		'blogkeywords.max'  => '关键词最多不能超过150个字符',
		'blogdesc.max'  => '博文描述最多不能超过255个字符',
		'pic.max'       => '缩略图地址最多不能超过150个字符',
		'picdesc.max'   => '缩略图描述最多不能超过30个字符',
		'content.require' => '内容不能为空',
		'click.number'  => '点击量必须是整数',


	];
}