<?php
namespace app\admin\controller;
use PHPExcel_IOFactory;
use PHPExcel;

class Blog extends  Common{
    public function bloglist($field='bid',$order='desc'){ 
    	$blog = db('blog')->join('cate','cate.cid = blog.cateid','left')->order($field,$order)->select();//paginate(10);
    	//dump($blog);die;
    	$this->assign('blog',$blog);
        $cate = db('cate')->field('catename,sort,catetype')->select();
        $this->assign('cate',$cate);
        return view();
    }
//********************************************************************************************
    public function addblog(){
    	if(request()->isPost()){ 
    		$data=[
    			'title'    => input('title'),
    			'cateid'   => input('cateid'),
    			'blogkeywords' => input('blogkeywords'),
    			'blogdesc' => input('blogdesc'),
                'picdesc'  => input('picdesc'),
    			'content'  => input('content'),
    			'click'    => input('click'),
    			'time'     => time(),
    		];
            $data['picdesc']=input('picdesc')?input('picdesc'):'缩略图描述';
            $data['stitle']=input('stitle')?input('stitle'):substr(input('title'),0,30);
    		//dump($_POST);dump($data);die;

			$file = request()->file('pic'); 
            if($file){   
                $info = $file->validate(['size'=>204800,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'static/uploads'); 

                if($info){
                        //大图加水印
                    $bigpath='./static/uploads/'.date('Ymd').'/'.$info->getFilename();
                    $image = \think\Image::open($bigpath);
                    $image->water('./static/logo.png',\think\Image::WATER_SOUTHWEST,80)->save($bigpath);

                    //生成缩略图
                    $smallpath='./static/uploads/'.date('Ymd').'/thumb'.$info->getFilename(); 
                    $image = \think\Image::open($file);  //dump($image);die;            
                    $image->thumb(150,150,\think\Image::THUMB_CENTER)->save($smallpath); 

                    $data['pic']=date('Ymd').'/'.$info->getFilename().' '.date('Ymd').'/thumb'.$info->getFilename();
                    //dump($data['pic']) ;   die;
                }else{
                    return $this->error($file->getError());
                } 
            }

    		$validate = validate('Blog');
			if(!$validate->check($data)){
                return $this->error($validate->getError());
            }
			if(db('blog')->insert($data)){
    			return $this->success('新增成功','bloglist');
    		}else{
    			return $this->error('新增失败');
    		};
    	}

    	$this->assign('cate',db('cate')->select());
        return view();
    }
//************************************************************************************************
    public function editorblog(){
        if(request()->isPost()){//file_put_contents(ROOT_PATH.'/backup/pre.sql',input('content'),FILE_APPEND);die;
            $data=[
                'bid'    => input('bid'),
                'title'    => input('title'),
                'stitle'    => input('stitle'),
                'cateid'   => input('cateid'),
                'blogkeywords' => input('blogkeywords'),
                'blogdesc' => input('blogdesc'),
                'content'  => input('content'),
                'click'    => input('click'),
                'time'     => time(),
            ];
            //dump($_POST);dump($data);die;

            $file = request()->file('pic'); 
            if($file){   
                $info = $file->validate(['size'=>204800,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'static/uploads'); 

                if($info){
                        //大图加水印
                    $bigpath='./static/uploads/'.date('Ymd').'/'.$info->getFilename();
                    $image = \think\Image::open($bigpath);
                    $image->water('./static/logo.png',\think\Image::WATER_SOUTHWEST,80)->save($bigpath);

                    //生成缩略图
                    $smallpath='./static/uploads/'.date('Ymd').'/thumb'.$info->getFilename(); 
                    $image = \think\Image::open($file);  //dump($image);die;            
                    $image->thumb(150,150,\think\Image::THUMB_CENTER)->save($smallpath); 

                    $data['pic']=date('Ymd').'/'.$info->getFilename().' '.date('Ymd').'/thumb'.$info->getFilename();
                    //dump($data['pic']) ;   die;
                }else{
                    return $this->error($file->getError());
                } 
            }

            $validate = validate('Blog');
            if(!$validate->check($data)){
                return $this->error($validate->getError());
            }
            if(db('blog')->update($data)){
                return $this->success('修改成功',input('preurl'));
            }else{
                return $this->error('修改失败');
            };
        }
        $this->assign('blog',db('blog')->find(input('bid')));
        $this->assign('cate',db('cate')->select());
    	return view();
    }
//***************单一博文删除get方式和批量删除post方式******************************************************************
    public function deleteblog(){  //dump($GLOBALS);die;
        if( !isset($_SERVER['HTTP_REFERER'])){       //防止地址栏进行删除操作
            $this->error('页面错误！','bloglist');
        }
        $dbblog=db('blog');
        $dbmembers_blog=db('members_blog');
        \think\Db::transaction(function(){      //事务操作
                $dbblog->delete(input('')); 
                $dbmembers_blog->where('bid','in',input(''))->delete(); //删除用户点赞、评论、打分  
        });
        $this->success('删除博文成功！','bloglist');
    }
    
    //phpexcel下载博文列表，导出数据表
    public function blogphpexcel(){
        if (!request()->isAjax()){
            return $this->error('页面错误！');
        }

        $blog=db('blog')->select();
        foreach ($blog as $k => $v) {
            $blog[$k]['time']=date('Y-m-d',$v['time']);
        }
        
        $PHPExcel=new PHPExcel();
        $PHPSheet=$PHPExcel->getActiveSheet()->setTitle('blog');

        foreach (array_keys($blog[0]) as $k => $v){ 
            if($k+65<91){
                $PHPSheet->setCellValue(chr($k+65).'1',$v);
            }                                       
        }
        foreach ($blog as $key => $value) {
            $value=array_values($value);
            foreach ($value as $k => $v) {
                if($k+65<91){
                    $PHPSheet->setCellValue(chr($k+65).($key+2),$v);
                }       
            }
        }

        $PHPWriter=PHPExcel_IOFactory::createWriter($PHPExcel,'Excel2007'); //按照指定格式生成excel文件
        $savename='blog_'.date('Ymd').'.xlsx';
        $savepath='./static/excel/'.$savename;
        $res=$PHPWriter->save($savepath);
        return ['status'=>1,'downpath'=>$savename];      
    }
}