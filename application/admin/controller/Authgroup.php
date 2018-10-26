<?php
namespace app\admin\controller;

class Authgroup extends Common{
	public function authgrouplist(){
		$this->assign('authgroup',db('think_auth_group')->select());
		return view();
	}

	public function confauthgroup(){
		if(request()->isPost()){
			$data['rules']=implode(',',input('')['rules']);
			$data['id']=input('id');
			if(db('think_auth_group')->update($data)){
				return $this->success('保存成功！','authgrouplist');
			}else{
				return $this->error('保存失败！','authgrouplist');
			}
		}

		$authgroup=db('think_auth_group')->find(input('id'));
		$this->assign('authgroup',$authgroup);		
		$grouprules=explode(',', $authgroup['rules']); //已有配置		
		$authrule=db('think_auth_rule')->where('status','1')->select(); //全部权限
		foreach ($authrule as $k=>$v) {     //循环全部权限，如果在已有权限内则标记confed为1，便于模板标识
			$authrule[$k]['confed']=in_array($v['id'],$grouprules)?'1':'0';
		}
		$authrule=node_merge($authrule);    //dump($authrule['3']);die;
		$this->assign('authrule',$authrule);
		return view();
	}

	public function addauthgroup(){		
		if(request()->isPost()){      
			$validate = validate('Authgroup');
			if(!$validate->check(input(''))){
                return $this->error($validate->getError());
            }
			if(db('think_auth_group')->insert(input(''))){
				return $this->success('新增成功！','authgrouplist');
			}else{
				return $this->error('新增失败！');
			}
		}
	}

	public function editorauthgroup(){
		if(request()->isPost()){
			if(db('think_auth_group')->update(input(''))){
				return $this->success('修改成功！','authgrouplist');
			}else{
				return $this->error('修改失败！');
			}
		}
		$this->assign('authgroup',db('think_auth_group')->find(input('id')));
		return view();
	}

	public function deleteauthgroup(){
		if(!request()->header('referer')){
			return $this->error('页面错误！');
		}
		if(input('id')==1){
			return $this->error('超级管理员不能被删除！');
		}
		if(db('think_auth_group')->delete(input('id'))){
			return $this->success('删除成功！','authgroup/authgrouplist');
		}else{
			return $this->error('删除失败！');
		}
	}
}