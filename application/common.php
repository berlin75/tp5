<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

//二维数组去重，应用于前端内容页按照tags查询相关文章调用,注意原关联数组会换成索引数组
function arr_unique($arr2d){
	foreach ($arr2d as $v) {
		$v=implode(',',$v);
		$temp[]=$v;
	}
	$temp=array_unique($temp);
	foreach ($temp as $k => $v) {
		$temp[$k]=explode(',',$v);
	}
	return $temp;
}


//递归重组数组函数，应用后台权限配置
function node_merge($node,$access=null,$pid=0){  //要处理的节点数组，父级ID
	$arr=array();
	foreach($node as $v){
		if(is_array($access)){
			$v['access']=in_array($v['id'],$access)?1:0;  //如果节点的id在数组$access内则新增的元素值为1
		}
		if($v['pid']==$pid){
			$v['child']=node_merge($node,$access,$v['id']);  //控制器的pid等于应用的id，方法的pid等于控制器的id来分类
			$arr[]=$v;
		}
	}
	
	return $arr;
}

function create_qrcode($data ='http://www.baidu.com', $level = 'L', $size =4){
    $outfile=ROOT_PATH."public/qrcode/".time().'.jpg';
    $QRcode = new \PHPQrcode\Qrcode\QRcode();
    ob_start();
    $QRcode->png($data,$outfile,$level,$size,2);
    ob_end_clean();
    return time();   
}

// 封装生成二维码函数,返回base64
function get_qrcode($url){
    /*生成二维码*/
    $data =$url;
    $level = 'L';// 纠错级别：L、M、Q、H
    $size = 4;// 点的大小：1到10,用于手机端4就可以了
    $QRcode = new \PHPQrcode\Qrcode\QRcode();
    ob_start();
    $QRcode->png($data,false,$level,$size,2);
    $imageString = base64_encode(ob_get_contents());
    ob_end_clean();
    return "data:image/jpg;base64,".$imageString;
}
