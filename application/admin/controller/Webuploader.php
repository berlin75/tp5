<?php
namespace app\admin\controller;

class Webuploader extends Common{
	public function index(){
		return view();
	}

	public function webuploader(){
		return view();
	}

    function upload(){
        $file = request()->file('file');//file是webloader插件固定写入一个隐藏域的传文件的名称
        if($file){
	        $info = $file->move(ROOT_PATH . 'public' . DS . 'static/webuploader/upload');
	        if(!$info){
				return $this->error($file->getError());
			}
			$data['img']=date('Ymd').'/'.$info->getFilename();
			db('webuploader')->insert($data);
			return $this->success('上传成功！');
		}
    }
 
}