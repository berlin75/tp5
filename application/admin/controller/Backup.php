<?php
namespace app\admin\controller;    

class Backup extends Common{
    public function index(){ 
    	$tablist = \think\Db::query('show tables');
    	$tabres = $tabs = [];
    	foreach($tablist as $key => $value) {
    		foreach($value as $v) {
    			$tabs[]=$v;
    		}   		
    	}
    	foreach($tabs as $k => $v) {
    		$tabres[$k]['tbname'] = $v;
    		$tabres[$k]['fields'] = \think\Db::getTableInfo($v, 'fields'); 
    	}
    	// var_dump($tabres);die;
    	
		$this->assign('tabres', $tabres);
        return view();
    }

//每条SQL语句以;;结尾，执行多条SQL时以;;为分隔符分割为数组，再循环执行，防止SQL语句中分号混淆
    public function export(){
    	$tbname = input('')['tbname']; 
    	$to_file_name = ROOT_PATH.'/backup/'. $tbname . '-' . date('ymd') . '.sql';
    	$info = "-- ----------------------------\r\n";
		$info .= "-- 日期：".date("Y-m-d H:i:s",time())."\r\n";
		$info .= "-- 仅用于测试和学习,本程序不适合处理超大量数据\r\n";
		$info .= "-- ----------------------------\r\n\r\n";
        file_put_contents($to_file_name,$info);

		$sql = "show create table ".$tbname;
		$res = \think\Db::query($sql); 
		$result = $res[0]['Create Table'];   //dump($result);die;  //mysql_query($sql,$link);
		$info = "-- ----------------------------\r\n";
		$info .= "-- Table structure for `".$tbname."`\r\n";
		$info .= "-- ----------------------------\r\n";
		$info .= "DROP TABLE IF EXISTS `".$tbname."`;;\r\n";
		$sqlStr = $info.$result.";;\r\n\r\n";
		file_put_contents($to_file_name,$sqlStr,FILE_APPEND);

		$info = "-- ----------------------------\r\n";
		$info .= "-- Records for `".$tbname."`\r\n";
		$info .= "-- ----------------------------\r\n";
		file_put_contents($to_file_name,$info,FILE_APPEND);

		$res = db($tbname) -> select();     
		foreach ($res as $key => $value) {
			$sqlStr = "INSERT INTO `".$tbname."` VALUES (";
			foreach($value as $zd){
				if(is_string($zd)){
					$sqlStr .= "'".$zd."', ";
				}else{
					$sqlStr .= $zd.", ";
				}		      	
		    }
		    //去掉最后一个逗号和空格
		    $sqlStr = substr($sqlStr,0,strlen($sqlStr)-2);
		    $sqlStr .= ");;\r\n";
		    file_put_contents($to_file_name,$sqlStr,FILE_APPEND);
		}
		file_put_contents($to_file_name,"\r\n",FILE_APPEND);
		return ['status'=>1,'exportpath' => $to_file_name];
    }

    public function import(){
    	$tbname = input('')['tbname'];
    	$filelist = [];
    	$dir = ROOT_PATH.'/backup/';
		$filearr = scandir($dir);
		foreach ($filearr as  $v) {
			if(strpos($v,$tbname) === 0){
				$filelist[] = $v;
			}			
		}
		rsort($filelist);  
		if($filelist){
			return ['status'=>1,'filelist' => $filelist];
		}else{
			return ['status'=>0,'filelist' => $filelist];
		}
		
    }

    public function confirmimport(){
    	header("Content-type:text/html;charset=utf-8");
    	$dir = ROOT_PATH.'/backup/';
    	$filename = $dir . input('')['file'];
    	$errormsg = [];
    	$result = [];
		$templine = '';		
		$lines = file($filename);   //$sql=file_get_contents($sql_file_name); //把SQL语句以字符串读入$sql
		foreach ($lines as $line){
			if (substr($line, 0, 2) == '--' || $line == ''){
			    continue;
			}
			$templine .= $line; 
			if (substr_count(trim($templine),";;")){
				//var_dump($templine);
				$result[] = \think\Db::execute($templine); 
		        $templine = '';
			}
		}
		//var_dump($result);die;
		return ['status'=>1,'result' => $result];
    }

    public function sql(){
    	$sql = input('sql');
    	echo '<textarea style="width: 100%;height:200px;">' . $sql .'</textarea>';
    	//$sql = substr(trim($sql),0,-2);
    	$sql = rtrim(trim($sql), ';;');
    	$sqlarr = explode(';;', $sql);  //var_dump($sqlarr);die;
    	$result = [];
    	foreach ($sqlarr as $v) {
    		if(substr_count($v,"select")||substr_count($v,"show")){
	    		$result[] = \think\Db::query($v);
	    	}else{
	    		$result[] = \think\Db::execute($v);
	    	}
    	}
    	   	
    	var_dump($result);
    }

    public function sqlcode(){      //多条SQL语句执行
    	if (request()->isAjax()){
            $sql=input("post.sql"); 
            $sql = substr($sql, 0, -2); 
	    	$sqlarr = explode(';;', $sql); 
	    	$result = [];
	    	//var_dump($sqlarr);die;
            foreach ($sqlarr as $v) {
            	//var_dump(is_string($sql));continue;
                if (preg_match('/INSERT INTO|DELETE|UPDATE\s/i', $v, $info)){
                    $result[] = \think\Db::execute($v);
                }
                else{                    
                    $result[] = \think\Db::query($v);
                }	            
            }
        return dump($result);  
            
        }
        //读取所有的表
        $tables=\think\Db::query('SHOW TABLES');
        $this->assign('tables',$tables);           //var_dump($tables);
        $database=\think\Config::get("database");
        $this->assign('tkey',"Tables_in_".$database["database"]);
        return $this->fetch();
    }

    public function sqlcode1(){
    	if (request()->isAjax()){
            $sql=input("post.sql");
            //$sql=base64_decode($sql);
            if ($sql){
                if (preg_match('/INSERT INTO|DELETE|UPDATE\s/i', $sql, $info)){
                    $result=\think\Db::execute($sql);
                }
                else{                    
                    $result=\think\Db::query($sql);
                }
                return dump($result);//json_encode($result)
            }else{
                return  "错误的sql语句"; 
            }
            
        }
        //读取所有的表
        $tables=\think\Db::query('SHOW TABLES');
        $this->assign('tables',$tables);           //var_dump($tables);
        $database=\think\Config::get("database");
        $this->assign('tkey',"Tables_in_".$database["database"]);
        return $this->fetch();
    }
}