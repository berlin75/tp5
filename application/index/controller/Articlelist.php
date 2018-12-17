<?php
namespace app\index\controller;

class Articlelist extends Common{
    public function index(){   
    	$blog=db('blog')->where(['cateid'=>input('cid')])->order('time desc')->paginate(3);
    	$this->assign('blog',$blog);
    	$this->assign('catename',db('cate')->where(['cid'=>input('cid')])->value('catename'));
        return view();
    }
}