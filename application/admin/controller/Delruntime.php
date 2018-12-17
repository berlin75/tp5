<?php
namespace app\admin\controller;

class Delruntime extends Common{
    public function index(){
        return view();
    }

    //删除文件夹
    private function _deleteDir($R){
    	if(!file_exists($R)){
    		return $this->error('runtime文件不需要清除！');
    	}
        //打开一个目录句柄
        $handle = opendir($R);
        //读取目录,直到没有目录为止
        while(($item = readdir($handle)) !== false){
            //跳过. ..两个特殊目录
            if($item != '.' and $item != '..'){
                //如果遍历到的是目录
                if(is_dir($R.'/'.$item)){
                    //继续向目录里面遍历
                    $this->_deleteDir($R.'/'.$item);
                }else{
                    //如果不是目录，删除该文件
                    if(!unlink($R.'/'.$item)){
                    	return $this->error('删除runtime文件失败！');
                    }
                }
            }
        }
        //关闭目录
        closedir( $handle );
        //删除空的目录
        return rmdir($R); 
    }

    //清除缓存--删除runtime文件夹
    public function delRun () {
        //执行删除函数
        if($this->_deleteDir(RUNTIME_PATH.'temp/') && $this->_deleteDir(RUNTIME_PATH.'cache/')){
        	return $this->success('成功删除runtime文件！');
        }
    }
}