<?php
namespace app\index\controller;

class Tags extends Common{
    public function index(){ 
    	//dump(input('tag'));
    	$blog=db('blog')
    		    ->field('blog.bid,blog.title,blog.pic,picdesc,blog.blogkeywords,blog.blogdesc,blog.click,blog.time,cate.catename')
    		    ->join('cate','blog.cateid = cate.cid','left')
    	        ->where('blogkeywords','like','%'.input('tag').'%')
    	        ->paginate(3);
    	//dump($blog);
    	$this->assign('blog',$blog);
        $this->assign('tag',input('tag'));
        return view('articlelist/index');
    }
}