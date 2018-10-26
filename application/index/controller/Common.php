<?php
namespace app\index\controller;

class Common extends \think\Controller{
    public function _initialize(){  
        config('cache.expire',60*60*24);
        //导航栏目缓存
        if(cache('nav')){
            $nav = cache('nav');
        }else{
            $nav = db('cate')->order('sort')->select();
            cache('nav', $nav, config('cache.expire'));
        }       
        $this->assign('nav',$nav);

        //最新文章列表缓存
        if(cache('newblog')){
            $newblog = cache('newblog');
        }else{
            $newblog=db('blog')->field('bid,stitle,time')->order('time desc')->limit(5)->select();
            cache('newblog', $newblog, config('cache.expire'));
        }       
        $this->assign('newblog',$newblog);

        //热门文章列表缓存
        if(cache('hotblog')){
            $hotblog = cache('hotblog');
        }else{
            $hotblog=db('blog')->field('bid,stitle,click')->order('click desc')->limit(5)->select();
            cache('hotblog', $hotblog, config('cache.expire'));
        }        
        $this->assign('hotblog',$hotblog);

        //友情链接缓存
        if(cache('flink')){
            $flink = cache('flink');
        }else{
            $flink = db('flink')->order('fid')->select();
            cache('flink', $flink, config('cache.expire'));
        } 
        $this->assign('flink',$flink);

        //标签列表缓存
        if(cache('tagsres')){
            $tagsres = cache('tagsres');
        }else{
            $tags=db('blog')->field('blogkeywords')->select();
            $tags=array_column($tags,'blogkeywords');   //二维转一维
            $tagstr=implode(' ',$tags);                 //全部tag拼成字符串
            $tagsarr=explode(' ',$tagstr);              //tags字符串转成一维数组
            $tagsu=array_unique($tagsarr);
            foreach ($tagsu as $k => $v) {
                $tagsres[$k]['count'] = substr_count($tagstr,$v);
                $tagsres[$k]['tag'] = $v;
            }
            cache('tagsres', $tagsres, config('cache.expire'));
        }         
        $this->assign('tagsres',$tagsres);

        $hotkeywords = db('search')->where('status',1)->order('searchtimes desc')->limit(5)->select();
        $this->assign('hotkeywords',$hotkeywords);

        $this->assign('islogined',session('uid')?session('uid'):0);
    }

}