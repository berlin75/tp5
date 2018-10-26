<?php
namespace app\api\model;
use think\Model;
use traits\model\SoftDelete;

class Blog extends Model{	
	use SoftDelete;
	protected $table = 'think_blog';
	protected $deleteTime = 'delete_time';
	protected $autoWriteTimestamp = 'timestamp';
	protected $insert = [
		'status' => 1,
	];
	protected $field = [
		'id' => 'int',
		'create_time',
		'update_time',
		'name', 
		'title', 
		'content',
		'author',
		'delete_time',
	];
}