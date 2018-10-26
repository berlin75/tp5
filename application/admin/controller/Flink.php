<?php
namespace app\admin\controller;
use app\admin\model\Flink as Flinkmodel;   //引用命名空间，设置模型别名来区别Flink控制器名

class Flink extends Common{
    public function flinklist(){
    	$data=\think\Db::name('flink')->order('fid')->paginate(5);
    	//var_dump($data);
    	$this->assign('data',$data);
        return view();
    }
//******************************Model添加数据***************************************************
    public function addflink(){
        if(request()->isPost()){  
            $flinkmodel=new Flinkmodel;  
            $flinkmodel->data([
                'title'   => input('title'),
                'urldesc' => input('urldesc'),
                'urlpath' => input('urlpath'),
            ]);

            $validate = validate('Flink');
            if($validate->check($flinkmodel)){
                if($flinkmodel->save()){
                    return $this->success('新增成功','flinklist');
                }else{
                    return $this->error('新增失败');
                };

            }else{
                return $this->error($validate->getError());
            }       
            return ;
        }
    }
//*****************************Db类添加数据***********************************
    public function addflink1(){
    	if(request()->isPost()){	
    		$validate = validate('Flink');
			if($validate->check(input('post.'))){
				if(db('flink')->insert(input('post.'))){
	    			return $this->success('新增成功','flinklist');
	    		}else{
	    			return $this->error('新增失败');
	    		};

			}else{
				return $this->error($validate->getError());
			} 		
       		return ;
    	}
        return view();
    }

    public function deleteflink(){
        if(db('flink')->delete(input('fid'))){
            return $this->success('删除链接成功！','flinklist');
        }else{
            return $this->error('删除链接失败！');
        }
    }

    public function editorflink(){
        if(request()->isPost()){
            //dump($_POST);die;
            $validate = validate('Flink');
            if($validate->check(input('post.'))){ 
                if(db('flink')->update(input('post.'))){
                    return $this->success('修改成功','flinklist');
                }else{
                    return $this->error('修改失败');
                };

            }else{
                return $this->error($validate->getError());
            }   
            return;
        }
        $data=db('flink')->find(input('fid'));
        $this->assign('data',$data);
        return view();
    }

}