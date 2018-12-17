<?php
namespace app\api\validate;
use think\Validate;
class Blog extends Validate {
    protected $rule = [ 
    	'name' => 'require|max:40', 
    	'title' =>'require|max:80',  
    	'content' => 'require',  
    ];
    protected $message = [
        'name.require' => 'name is required',
        'name.max' => "name max 40",
        'title.require' => 'title is required',
        'title.max' => "title max 80",
        'content.require' => 'content is required',
    ];
    protected $scene = [
		'save' => ['name','title', 'content'],
		'update' => ['']
	];
}