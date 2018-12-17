<?php
namespace app\admin\controller;

class Setsys extends Common{
    public function index(){
    	if(request()->isPost()){
			$webinfor=[
				'webname'=>input('webname'),
				'keyword'=>input('keyword'),
				'description'=>input('description'),
				'beian'=>input('beian'),
				'baiduu'=>input('baiduu'),
				'baiduv'=>input('baiduv'),
				'360v'=>input('360v'),
				'googlev'=>input('googlev'),
				'sogouv'=>input('sogouv'),
			];
			$captcha=[
				'codeSet'=>input('codeSet'),
				'fontSize'=>input('fontSize'),
				'useCurve'=>input('useCurve'),
				'imageH'=>input('imageH'),
				'imageW'=>input('imageW'),
				'length'=>input('length'),
				'reset'=>input('reset'),
			];
			$setdir=[
				'exportdir' => input('exportdir')?input('exportdir'):ROOT_PATH.'backup',
				'uploaddir' => input('uploaddir')?input('uploaddir'):ROOT_PATH . 'public' . DS . 'static/uploads'
			];
			$settime=[
				'searchtime'=>input('searchtime'),
				'logerrtimes'=>input('logerrtimes'),
				'logerruntil'=>input('logerruntil'),
			];

    		$webinfor='<?php return '.var_export($webinfor,true).';'; 
    		$res1=file_put_contents(APP_PATH.'extra/webinfor.php',$webinfor);

    		$captcha='<?php return '.var_export($captcha,true).';';
    		$res2=file_put_contents(APP_PATH.'extra/captcha.php',$captcha);

    		$setdir='<?php return '.var_export($setdir,true).';';
    		$res2=file_put_contents(APP_PATH.'extra/setdir.php',$setdir);

    		$settime='<?php return '.var_export($settime,true).';';
    		$res2=file_put_contents(APP_PATH.'extra/settime.php',$settime);

    		if($res1&&$res2){
    			return $this->success('设置成功！');
    		}else{
    			return $this->error('设置失败！');
    		}
    	}
        return view();
    }
}