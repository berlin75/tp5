<?php
namespace app\admin\controller;

class Members extends Common{
    public function memberslist(){
    	$data=\think\Db::name('think_members')->order('uid')->select();
        $db_group_access=db('think_auth_group_access');
        $db_group=db('think_auth_group');
        foreach ($data as $k=>$v) {
             $group_access_group_id=$db_group_access->where('uid',$v['uid'])->value('group_id');
             $group_title=$db_group->where('id',$group_access_group_id)->value('title'); 
             $data[$k]['group_title']=$group_title;  
        }
    	$this->assign('data',$data);
        $this->assign('authgroup',db('think_auth_group')->field('id,title')->where('id','neq','1')->select()); //模态框新增
        return view();
    }

    public function addmembers(){
    	if(request()->isPost()){	
    		$validate = validate('Members'); 
			if(!$validate->check(input('post.'))){
                return $this->error($validate->getError());
            }
            $data=[
                'username' => input('username'),
                'password' => md5(input('password')),
                'regtime'  => time(),
                'typeof'   => 1     //后台添加的用户默认是管理员
            ];
			if($result=db('think_members')->insertGetId($data)){
                if(db('think_auth_group_access')->insert(['uid'=>$result,'group_id'=>input('authgroup')])){
                    return $this->success('新增成功','memberslist');
                }else{
                    return $this->error('新增失败');
                }
            };		
    	}
        $this->assign('authgroup',db('think_auth_group')->field('id,title')->where('id','neq','1')->select());
        return view();
    }

    public function editormembers(){
        if(request()->isPost()){ 
            $validate = validate('Members');
            if(!$validate->scene('edit')->check(input('post.'))){
                return $this->error($validate->getError());
            }
            if(!input('password')){
                $data=['username'=>input('username'),'uid'=>input('uid')];
            }else{
                $data=[
                    'uid'      => input('uid'),
                    'username' => input('username'),
                    'password' => md5(input('password')),
                ];
            }
            $up_members=db('think_members')->update($data);
            $up_group_access=db('think_auth_group_access')->where(['uid'=>input('uid')])->update(['group_id'=>input('authgroup')]);
            if($up_members||$up_group_access){
                return $this->success('修改成功','memberslist');
            }else{
                return $this->error('修改失败');
            };
        }

        $data=db('think_members')->find(input('uid'));
        $this->assign('data',$data);
        $this->assign('group_id',db('think_auth_group_access')->where('uid',input('uid'))->value('group_id')); 
        $this->assign('authgroup',db('think_auth_group')->field('id,title')->where('id','neq','1')->select());
        return view();
    }

    public function lockmembers(){
        if(db('think_members')->update(['uid'=>input('uid'),'locked'=>1])){
            return $this->success('锁定用户成功！','memberslist');
        }else{
            return $this->error('锁定用户失败！');
        }
    }

    public function unlockmembers(){
        if(db('think_members')->update(['uid'=>input('uid'),'locked'=>0])){
            return $this->success('解锁用户成功！','memberslist');
        }else{
            return $this->error('解锁用户失败！');
        }
    }

    public function deletemembers($uid=0){
        if($uid==1) return $this->error('超级管理员不允许删除！'); //防止通过地址栏删除删除
        $res1=db('think_members')->delete($uid);
        $res2=db('think_auth_group_access')->where('uid',$uid)->delete();
        $res3=db('members_blog')->where('uid',$uid)->delete();
        if($res1&&$res2&&$res3){
            return $this->success('删除管理员成功！','memberslist');
        }else{
            return $this->error('删除管理员失败！');
        }
    }

    public function deletemembers1(){
        if(input('uid')==1) return $this->error('超级管理员不允许删除！'); //防止通过地址栏删除删除
        if(db('think_members')->delete(input('uid'))&&db('think_auth_group_access')->where('uid',input('uid'))->delete()){
            return $this->success('删除管理员成功！','memberslist');
        }else{
            return $this->error('删除管理员失败！');
        }
    }

}