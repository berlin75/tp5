<?php
namespace app\index\controller;

class Article extends Common{
    public function index(){   
    	$bid=input('bid','1');
    	db('blog')->where(['bid'=>$bid])->setInc('click');
    	$blog=db('blog')->find($bid);
    	$this->assign('blog',$blog);

        $blogkeywords=explode(' ',$blog['blogkeywords']); 
        $this->assign('blogkeywords',$blogkeywords);

    	$this->assign('catename',db('cate')->where('cid',$blog['cateid'])->value('catename'));

        //文章收藏功能
        if(session('uid')){
            $storeart=db('think_members')->where('uid',session('uid'))->value('storeart');
            $storearted = in_array($blog['bid'],explode(',',$storeart))?1:-1;            
        }        
        //点赞功能,1点赞，0吐槽，-1无 //五星打分
        if(session('uid')){
            $res=db('members_blog')->where(['uid'=>session('uid'),'bid'=>$blog['bid']])->find();
            $updown=$res['updown']?$res['updown']:-1;  //uid在members_blog没有记录时$res['updown']为null
            $star=$res['star']?$res['star']:0;         
        }
        if(!session('uid')){
            $storearted = $updown = $star = 99;
        }

        //文章评论
        $artcomment = db('members_blog')
                      ->join('think_members','members_blog.uid = think_members.uid','left')
                      ->where('members_blog.comment','neq','null')
                      ->where('members_blog.bid',$bid)
                      ->field('think_members.username,members_blog.bid,members_blog.comment,members_blog.commenttime')
                      ->order('members_blog.commenttime desc')
                      ->select();

        $this->assign('storearted',$storearted);
        $this->assign('updown',$updown);
        $this->assign('star',$star);
        $this->assign('artcomment',$artcomment);
               
    	//上一篇下一篇
    	$pre=db('blog')->field('bid,title')->where('bid','<',$bid)->where(['cateid'=>$blog['cateid']])->order('bid desc')->limit(1)->find();
    	$next=db('blog')->field('bid,title')->where('bid','>',$bid)->where(['cateid'=>$blog['cateid']])->order('bid asc')->limit(1)->find();
    	$this->assign('pre',$pre);
    	$this->assign('next',$next);

    	//同栏目相关文章列表
    	$about=db('blog')->field('bid,title,time')->where(['cateid'=>$blog['cateid']])->where('bid','neq',$bid)->order('bid')->limit(5)->select();
    	$this->assign('about',$about);

    	//按标签查询相关文章,调用relative（）方法
    	$relative=$this->relative($blog['blogkeywords']); //dump($relative);die;
    	$this->assign('relative',$relative);

        return view();
    }

    public function relative($blogkeywords){
    	$arr=explode(' ',$blogkeywords);
    	static $relres=array();
    	foreach($arr as $k=>$v){
    		$relblog=db('blog')->field('bid,title,time')->order('bid')->limit(5)->where('blogkeywords','like','%'.$v.'%')->select();
    		$relres=array_merge($relres,$relblog); 
    		$relres=arr_unique($relres);  
    	}
    	return $relres;
    }

    public function storeart(){  //收藏文章  ***先验证是否登录auth权限认证
        if (!request()->isAjax()){
            return $this->error('页面错误！');
        }

        //动态判断是否已收藏
        $storeartlist=db('think_members')->where('uid',session('uid'))->value('storeart');
        if(substr_count($storeartlist,input('bid/s'))){ //已收藏,执行取消
            $find=$storeartlist==input('bid')?input('bid'):(','.input('bid')); 
            $storeartlist = str_replace($find,'',$storeartlist);
            if(db('think_members')->update(['storeart'=>$storeartlist,'uid'=>session('uid')])){
                return $this->success('已取消收藏！', null, ['typeofdo'=>0]);
            }
        }else{  //没收藏,执行收藏
            if($storeartlist==''){  //第一次收藏前为空
                $storeartlist = input('bid');
            }else{
                $storeartlist .= ','.input('bid');
            }
            
            if(db('think_members')->update(['storeart'=>$storeartlist,'uid'=>session('uid')])){
                return $this->success('收藏成功！', null, ['typeofdo'=>1]);
            }
        }         
    }

    public function updown(){  //点赞功能
        if (!request()->isAjax()){
            return $this->error('页面错误！');
        }
        if(null === session('uid')){
            return $this->error('登录之后才可以点赞哦！','login/index?logreg/log');
        }
        $res=db('members_blog')->where(['uid'=>session('uid'),'bid'=>input('bid')])->find();
        if(!$res){
            $updownres=db('members_blog')->insert(['uid'=>session('uid'),'bid'=>input('bid'),'updown'=>input('updown')]);
        }else{
            $updownres=db('members_blog')->where(['uid'=>session('uid'),'bid'=>input('bid')])->update(['updown'=>input('updown')]);
        }
        if($updownres){
            if(input('updown')==1){
                // return ['status'=>1,'updown'=>1];
                return $this->success('点赞成功！', null, ['updown'=>1]);
            }else{
                // return ['status'=>1,'updown'=>0];
                return $this->success('吐槽成功！', null, ['updown'=>0]);
            }
        }
    }

    public function star(){
        if (!request()->isAjax()){
            return $this->error('页面错误！');
        }
        $res=db('members_blog')->where(['uid'=>session('uid'),'bid'=>input('bid')])->find();
        if(!$res){
            $starres=db('members_blog')->insert(['uid'=>session('uid'),'bid'=>input('bid'),'star'=>input('star')]);
        }else{
            $starres=db('members_blog')->where(['uid'=>session('uid'),'bid'=>input('bid')])->update(['star'=>input('star')]);
        }
        if($starres){
            return $this->success(input('star').'星,感谢您的支持！');
        }
    }

    public function artcomment(){ 
        //var_dump(input(''));die;
        $res=db('members_blog')->where(['uid'=>session('uid'),'bid'=>input('bid')])->find();
        if(!$res){
            $artcommentres=db('members_blog')->insert(['uid'=>session('uid'),'bid'=>input('bid'),'comment'=>input('artcomment'),'commenttime'=>time()]);
        }else{
            $artcommentres=db('members_blog')->where(['uid'=>session('uid'),'bid'=>input('bid')])->update(['comment'=>input('artcomment'),'commenttime'=>time()]);
        }
        if($artcommentres){
            return $this->success(date("Y-m-d H:i"));
        }
    }
}