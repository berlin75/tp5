<?php
namespace app\common\controller;

//无限极分类方法1组合二维数组,递归
//调用之后返回的数组结构不变，每个元素多了level和html
// 无限极分类的显示：在制作栏目列表时候，我们先从catepid为0开始查找，并将符合条件的数据（我们暂且称其为a）存入到静态数组中，接着我们把数据a的id作为下一次查找的条件，如果存在数据b的catepid与a的id相等，则将b也存入静态数组中，然后继续以b的id作为条件查找下一组数据，如果不存在b则停止查找，并把静态数组返回出去供控制器方法调用
class Category{
	public static function unlimitForLevel($cate,$html='--',$pid=0,$level=0){
		$arr=array();
		foreach($cate as $v){
			if($v['pid']==$pid){   //pid为0是顶级栏目
				$v['level']=$level+1;
				$v['html']=str_repeat($html,$level); //字符串重复指定的次数
				$arr[]=$v;
				$arr=array_merge($arr,self::unlimitForLevel($cate,$html,$v['id'],$level+1)); //合并数组，递归
			}
		}
		return $arr;
	}
//无限极分类方法2组合多维数组,递归	
//调用之后重组数组，子栏目作为父数组的child元素
//无限极分类的删除：与无限级分类的显示相似，删除的时候，需要根据传入的id的值作为第一次查找的条件，如果数据a的catepid与传入的id值相等，则将a的id值存入静态数组中。然后以a的id作为下一次查找的条件，如果存在数据b的catepid与a的id相同，则将b的id值也存入静态数组中，然后继续以b的id作为条件查找下一组数据，如果不存在b则停止查找，并把静态数组中保存的id值返回出去
	public static function unlimitForLayer($cate,$pid=0){
		$arr=array();
		foreach($cate as $v){
			if($v['pid']==$pid){   //pid为0是顶级栏目
				$v['child']=self::unlimitForLayer($cate,$v['id']); //递归,将数组压入另一个数组
				$arr[]=$v;
			}
		}
		return $arr;
	}
	
//面包屑导航，根据子级分类id查找所有父级数组,然后父级和子级合并成数组返回
//从id开始查起或者说从子栏目开始往上查找父级栏目。首先是根据传入的id值查找本条数据a，存入到静态数组中。接着将数据a的catepid作为下一次查找的条件，如果a的catepid不为0，则进行查找符合条件的数据b，如果a的catepid为0，则说明查找到了顶级栏目，停止查找
	public static function getParents($cate,$id){
		$arr=array();
		foreach($cate as $v){
			if($v['id']==$id){   
				$arr[]=$v;
				//$arr=array_merge($arr,self::getParents($cate,$v['pid'])); //递归,将数组压入另一个数组
				$arr=array_merge(self::getParents($cate,$v['pid']),$arr); //显示父级再子级
				
			}
		}
		return $arr;		
	}
	
//根据父级分类的id查找所有子级分类,返回所有子级元素的一维数组
	public static function getChilds($cate,$pid){
		$arr=array();
		foreach($cate as $v){
			if($v['pid']==$pid){   
				$arr[]=$v['id'];
				$arr=array_merge($arr,self::getChilds($cate,$v['id'])); 				
			}
		}
		return $arr;
	}
}