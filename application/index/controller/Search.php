<?php
namespace app\index\controller;

class Search extends Common{
    public function index(){ 
		$keyword = input('keyword'); //var_dump(input('preurl'));   

    	$validate = new \think\Validate(['keyword|关键词' => 'require|max:25']);
		if (!$validate->check(['keyword'=>$keyword])){
			return $this->error($validate->getError(),input('preurl'));  //登录页preurl为空
		}
        $dbsearch = db('search');  //统计用户搜索的关键词
        $recode = $dbsearch->where('keyword',$keyword)->value('id');

    	$searchres = db('blog')
    				->where('title|blogkeywords','like','%'.$keyword.'%')
    				->field('bid,title,blogdesc,time')
    				->select();

        if($recode){
            if($searchres){
                $dbsearch->where('keyword',$keyword)->setInc('searchtimes');
                $dbsearch->where('keyword',$keyword)->setField('status',1);
            }else{
                $dbsearch->where('keyword',$keyword)->setInc('searchtimes');
                $dbsearch->where('keyword',$keyword)->setField('status',0);
            }
        }else{
            if($searchres){
                $dbsearch->insert(['keyword'=>$keyword,'searchtimes'=>1,'status'=>1]);
            }else{
                $dbsearch->insert(['keyword'=>$keyword,'searchtimes'=>1,'status'=>0]);
            }
        }

    	$this->assign('searchres', $searchres);
    	$this->assign('searchrescount', count($searchres));
    	$this->assign('keyword', $keyword);
    	   	
        return view();
    }
}

// drop table if exists search;
// create table if not exists search(
// id int(10) unsigned not null primary key auto_increment,
// keyword char(30) not null default '',
// searchtimes int(10) unsigned not null
// )engine=MyISAM charset=utf8;