<?php
namespace app\admin\controller;

class Layui extends Common{
	public function index(){
		return view();
	}
	function upload(){
        $file = request()->file('file');//file是webloader插件固定写入一个隐藏域的传文件的名称
        if($file){
        	$savePath = ROOT_PATH . 'public' . DS . 'static/webuploader/upload';
	        $info = $file->move($savePath);
	        if($info){
				// return $this->success('上传成功！');
				$result = [
					"code" => 0,                          //0表示成功，其它失败
				  	"msg"  => "上传成功！",                //提示信息,一般上传失败后返回
				  	"data" => [
				    	"src"   => request()->root(true)."/public/static/webuploader/upload/".date('Ymd')."/".$info->getFilename(),
				    	"title" => $info->getFilename()   //可选
				    ]
				];
			}else{
				// return $this->error($file->getError());
				$result = [
					"code" => 1,            //0表示成功，其它失败
				  	"msg"  => "上传失败！",  //提示信息,一般上传失败后返回
				  	"data" => [ 
				    	"src"   => '',
				    	"title" => ''       //可选
				    ]
				];
			}
			return json_encode($result);
		}
    }
}