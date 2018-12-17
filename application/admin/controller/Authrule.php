<?php 
namespace app\admin\controller;

class Authrule extends Common{
	public function authrulelist(){
		if(request()->isPost()){  
			$dbauthrule=db('think_auth_rule');
			foreach (input('')['id'] as $k=>$v) {
				$dbauthrule->where('id',$v)->setField('sort',input('')['sort'][$k]);
			}
			return $this->success('排序成功!','authrulelist');
		}

		$authrule=db('think_auth_rule')->order('sort')->select();
		//$authrule=\app\common\controller\Category::unlimitForLevel($authrule,$html='|--',$pid=0,$level=0);
		//$authrule=\app\common\controller\Category::unlimitForLayer($authrule);
		//dump($authrule);die;
		$this->assign('authrule',$authrule);
		return view();
	}

	public function addauthrule(){ 
		if(request()->isPost()){      
			$validate = validate('Authrule');
			if(!$validate->check(input(''))){
                return $this->error($validate->getError());
            }
			if(db('think_auth_rule')->insert(input(''))){
				return $this->success('新增成功！','authrulelist');
			}else{
				return $this->error('新增失败！');
			}
		}
		$this->assign('pid',input('?pid')?input('pid'):0);
		return view();
	}

	public function editorauthrule(){
		if(request()->isPost()){
			$validate = validate('Authrule');
			if(!$validate->check(input(''))){
                return $this->error($validate->getError());
            }
			if(db('think_auth_rule')->update(input(''))){
				return $this->success('修改成功！','authrulelist');
			}else{
				return $this->error('修改失败！');
			}
		}
		$this->assign('authrule',db('think_auth_rule')->find(input('id')));
		return view();
	}

	public function deleteauthrule($id){
		if(!request()->header('referer')){
			return $this->error('页面错误！');
		}
		$result=db('think_auth_rule')->delete($id);
		if($result){
			return $this->success('删除成功！','authrulelist');
		}else{
			return $this->error('删除失败！');
		}
	}
}