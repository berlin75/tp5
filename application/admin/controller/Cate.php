<?php
namespace app\admin\controller;

class Cate extends Common{
    public function catelist(){
    	$data=\think\Db::name('cate')->paginate(5);
    	//var_dump($data);
    	$this->assign('data',$data);
        return view();
    }

    public function addcate(){
    	if(request()->isPost()){	
    		$data=[
    			'catename' => input('catename'),
    			'catetype' => input('catetype'),
    			'catekeywords' => input('catekeywords'),
    			'catedesc' => input('catedesc'),
    		];
    		dump($data);

    		$validate = validate('Cate');
			if($validate->check($data)){
				if(db('cate')->insert($data)){
	    			return $this->success('新增成功','catelist');
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

    public function deletecate(){
        if(db('cate')->delete(input('cid'))){
            return $this->success('删除栏目成功！','catelist');
        }else{
            return $this->error('删除栏目失败！');
        }
    }

    public function editorcate(){
        if(request()->isPost()){
            $data=[
                'cid'       => input('cid'),
                'catename' => input('catename'),
                'catetype' => input('catetype'),
                'catekeywords' => input('catekeywords'),
                'catedesc' => input('catedesc'),
            ];
            $validate = validate('Cate');
            if($validate->check($data)){
                if(db('cate')->update($data)){
                    return $this->success('修改成功','catelist');
                }else{
                    return $this->error('修改失败');
                };

            }else{
                return $this->error($validate->getError());
            }   
            return;
        }
        $data=db('cate')->find(input('cid'));
        $this->assign('data',$data);
        return view();
    }

    public function upsort(){
        // var_dump(input('post.'));
        // var_dump($_POST['sort']);
        // var_dump($_POST['cid']);
        foreach($_POST['sort'] as $k=>$v){
            $new[$k]['sort']=$_POST['sort'][$k];
            $new[$k]['cid']=$_POST['cid'][$k];
        }
        //var_dump($new);
        $dbcate=db('cate');
        foreach($new as $k=>$v){
            $dbcate->where('cid',$v['cid'])->setField('sort',$v['sort']);
        }
        $this->success('更新排序成功！','cate/catelist');
    }

}