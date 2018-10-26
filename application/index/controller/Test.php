<?php
namespace app\index\controller;

class Test extends Common{
    public function index($id,$type='json'){ 
    	// echo $id;
     //    echo '<hr/>';
     //    echo url('index/test/index',['id' => $id]);

        if(!in_array($type,['json','jsonp','xml'])) $type='json';
 		config('default_return_type',$type); //控制器内部方法内动态配置使数组转换成输出类型为json
 		$res=[
        	'id'    => 1,
        	'name'  => 'berlin',
        	'works' =>[
        		'one'   => 'iter',
        		'two'   => 'cfer',
        	]
        ];
		return $res;   //http://localhost/tp5/public/t/1/type/jsonp
        
    }

    public function index2(){
    	$this->assign('user','berlin');
		return $this->display('<h1>这是{$user}要输出的{$type}字符串</h1>',['type' => '测试']);
    }

    public function index3(){
        echo '解析ueditor/php/config.json , 查看imagePathFormat';
        $CONFIG = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents("./public/static/ueditor/php/config.json")), true);
        var_dump($CONFIG);
    }
}