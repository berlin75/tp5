<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:58:"E:\wamp64\www\tp5/application/admin\view\backup\index.html";i:1501740918;s:57:"E:\wamp64\www\tp5/application/admin\view\public\base.html";i:1527229214;s:56:"E:\wamp64\www\tp5/application/admin\view\public\nav.html";i:1501324619;s:58:"E:\wamp64\www\tp5/application/admin\view\public\aside.html";i:1535335564;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" >
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width,initial-scale=1.0" >
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="<?php echo \think\Config::get('webinfor.keyword'); ?>">
<meta name="description" content="<?php echo \think\Config::get('webinfor.description'); ?>">
<meta name="Author" content="<?php echo \think\Config::get('webinfor.webname'); ?>">
<meta name="renderer" content="webkit">
<meta name="baidu_union_verify" content="<?php echo \think\Config::get('webinfor.baiduu'); ?>">
<meta name="google-site-verification" content="<?php echo \think\Config::get('webinfor.googlev'); ?>">
<meta name="baidu-site-verification" content="<?php echo \think\Config::get('webinfor.baiduv'); ?>">
<meta name="sogou_site_verification" content="<?php echo \think\Config::get('webinfor.sogouv'); ?>">
<meta name="360-site-verification" content="<?php echo \think\Config::get('webinfor.360v'); ?>">
<link rel="shortcut icon" href="__PUBLIC__/static/favicon.ico" />
<link rel="bookmark" href="__PUBLIC__/static/favicon.ico" type="image/x-icon"/>
<title>数据库备份模板文件源码</title>
<script type="text/javascript" src="__PUBLIC__/static/common/jquery-3.1.1.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/static/common/bootstrap/css/bootstrap.min.css" />

	<link rel="stylesheet" type="text/css" href="__PUBLIC__/static/admin/css/base.css" />



</head>
<body>
	<header>
		<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
      		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        		<span class="sr-only">Toggle navigation</span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
      		</button>
      		<a class="navbar-brand" href="<?php echo url('admin/index/index'); ?>" style="padding: 5px 15px;">
      			<img class="img-responsive" src="__PUBLIC__/static/logo.png" style="width: 45px;display: inline-block;">
      			<span>后台管理系统</span>
      		</a>
    	</div>

    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      		<ul class="nav navbar-nav">
        		<li class="active"><a href="<?php echo url('index/index'); ?>"> 后台首页<span class="sr-only">(current)</span></a></li>
        		<li><a href="<?php echo url('index/index/index'); ?>" >前端首页</a></li>
        		<li class="dropdown">
          			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Todo 
          				<span class="caret"></span>
          			</a>
		          	<ul class="dropdown-menu">
			            <li><a href="#">Action</a></li>
			            <li><a href="#">Action</a></li>
			            <li><a href="#">Action</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">Action</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">Action</a></li>
		          	</ul>
        		</li>
      		</ul>

	      	<ul class="nav navbar-nav navbar-right">
		        <li><a href="javascript:void(0);" ><span class="glyphicon glyphicon-user"></span> <?php echo session('username'); ?></a></li>
            <li><a href="javascript:void(0);" ><?php echo \think\Request::instance()->ip(); ?></a></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">用户信息 <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="<?php echo url('members/editormembers',['uid' => session('uid')]); ?>" >修改密码</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="<?php echo url('login/logout'); ?>" >退出登录</a></li>
		          </ul>
		        </li>
	      	</ul>
    	</div>
  	</div>
</nav>
	</header>
	<main class="container-fluid row">
		<div class="sidebar"> 菜单导航>></div>
		</div>
		<aside class="col-md-2" style="border-right: 1px solid rgba(0,0,0,.2);">
			 <ul class="menu" id="menu">
  <li>
     <span><a href="javascript:void(0);">内容管理<span class="glyphicon glyphicon-chevron-down"></span></a></span> 
     <ul class="active">
       <li><a href="<?php echo url('blog/bloglist'); ?>"><span class="glyphicon glyphicon-list"></span> 博文管理</a></li>
       <li><a href="<?php echo url('cate/catelist'); ?>"><span class="glyphicon glyphicon-list-alt"></span> 栏目管理</a></li> 
       <li><a href="<?php echo url('flink/flinklist'); ?>"><span class="glyphicon glyphicon-link"></span> 友情链接</a></li>
       <li><a href="javascript:void(0)"><span class="glyphicon glyphicon-comment"></span> 留言管理</a></li>
       <li><a href="javascript:void(0)"><span class="glyphicon glyphicon-pencil"></span> 评论管理</a></li>
       <li><a href="javascript:void(0)"><span class="glyphicon glyphicon-bullhorn"></span> 广告管理</a></li>
     </ul>
  </li>
  <li>
     <span><a href="javascript:void(0);">AUTH管理<span class="glyphicon glyphicon-chevron-down"></span></a></span>
     <ul>
       <li><a href="<?php echo url('members/memberslist'); ?>"><span class="glyphicon glyphicon-user"></span> 用户管理</a></li>
       <li><a href="<?php echo url('authrule/authrulelist'); ?>"><span class="glyphicon glyphicon-equalizer"></span> 规则管理</a></li>
       <li><a href="<?php echo url('authgroup/authgrouplist'); ?>"><span class="glyphicon glyphicon-user"></span>用户组管理</a></li>
     </ul>
   </li>
  <li>
     <span><a href="javascript:void(0);">系统管理<span class="glyphicon glyphicon-chevron-down"></span></a></span>
     <ul> 
       <li><a href="<?php echo url('setsys/index'); ?>"><span class="glyphicon glyphicon-cog"></span> 系统设置</a></li>
       <li><a href="<?php echo url(''); ?>"><span class="glyphicon glyphicon-cog"></span> 站内搜索</a></li>
       <li><a href="<?php echo url('log/index'); ?>"><span class="glyphicon glyphicon-record"></span> 登录日志</a></li>
       <li><a href="<?php echo url('delruntime/index'); ?>"><span class="glyphicon glyphicon-trash"></span> 清理缓存</a></li>
       <li><a href="<?php echo url('backup/sqlcode'); ?>"><span class="glyphicon glyphicon-copy"></span> sql命令</a></li>
       <li><a href="<?php echo url('backup/index'); ?>"><span class="glyphicon glyphicon-copy"></span> 备份还原</a></li>
       <li><a href="<?php echo url('webuploader/webuploader'); ?>"><span class="glyphicon glyphicon-upload"></span> webuploader</a></li>
       <li><a href="<?php echo url('layui/index'); ?>"><span class="glyphicon glyphicon-upload"></span>layui后台上传</a></li>
       <li><a href="<?php echo url('webuploader/index'); ?>"><span class="glyphicon glyphicon-upload"></span> upload</a></li>
       <li><a href="<?php echo url('code/index'); ?>"><span class="glyphicon glyphicon-upload"></span> qrcode</a></li>
     </ul>
  </li>
 </ul>
		</aside>
		<section class="col-md-10">
			
	<p class="welcome">
		<a href="<?php echo url('admin/index/index'); ?>"><span class="glyphicon glyphicon-home"></span> 首页</a> > 
		<a href="<?php echo url('backup/index'); ?>">数据库<span style="font-weight: bold;color: red;"><?php echo \think\Config::get('database.database'); ?></span>备份还原</a> > 数据表列表</p>
	<p>
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalsql">执行SQL命令语句</button>
		<span style="color: red">数据库以sql文件形式备份到/backup/ </span>
	</p>
<div class="table-responsive">
	<table class="listtab table table-striped table-bordered table-hover table-condensed">
		<tr>
			<th>序号</th>
			<th>数据表</th>
			<th>字段</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($tabres) || $tabres instanceof \think\Collection || $tabres instanceof \think\Paginator): $i = 0; $__LIST__ = $tabres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<tr>
				<td><?php echo $key+1; ?></td>
				<td><?php echo $vo['tbname']; ?></td>
				<td>
					<?php if(is_array($vo['fields']) || $vo['fields'] instanceof \think\Collection || $vo['fields'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['fields'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
						<span><?php echo $v; ?></span>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</td>
				<td>
					<button class="btn btn-primary export" data-tbname="<?php echo $vo['tbname']; ?>">备份</button>
					<button class="btn btn-danger import" data-tbname="<?php echo $vo['tbname']; ?>">还原</button>
				</td>
			</tr>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
<!-- bootstrap模态框选择备份文件 -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	    		<form name="importform" id="importform" class="form-horizontal">
		      		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        		<h4 class="modal-title" id="myModalLabel">选择备份文件<small>---bootstrap模态框</small></h4>
		      		</div>
		      		<div class="modal-body" id="select-import">
				      	<div class="checkbox container">
				        	<label>
				          		<input type="radio"> Remember me
				        	</label>
				      	</div>
		      		</div>

		      		<div class="modal-footer">
		        		<button type="button" class="btn btn-primary" id="comfirm-import">确认还原</button>
		        		<button type="button" class="btn btn-default" data-dismiss="modal">取消还原</button>
		      		</div>
	      		</form>
	    	</div>
	  	</div>
	</div>
</div>
<!-- bootstrap模态框选择备份文件 -->
	<div class="modal fade" id="myModalsql" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  	<div class="modal-dialog modal-lg" role="document">
	    	<div class="modal-content">
	    		<form action="<?php echo url('backup/sql'); ?>" method="post" name="importform" id="sqlform" class="form-horizontal">
		      		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        		<h4 class="modal-title" id="myModalLabel">执行SQL语句<small>---bootstrap模态框</small></h4>
		      		</div>
		      		<div class="modal-body" id="select-import">
				      	<textarea placeholder="每条SQL语句以;;结尾" name="sql" class="form-control" rows="8"></textarea>
		      		</div>

		      		<div class="modal-footer">
		        		<button type="submit" class="btn btn-primary">执行SQL</button>
		        		<button type="button" class="btn btn-default" data-dismiss="modal">取消执行</button>
		      		</div>
	      		</form>
	    	</div>
	  	</div>
	</div>
</div>
<script>
	function downloadexcel(){  
		$.post("<?php echo url('blog/blogphpexcel','',''); ?>",function(data){
			if(data.status==1){
				window.location.href='__PUBLIC__/static/excel/'+data.downpath;
			}
		},'json');		
	};

	$('.export').click(function(){
		var tbname=$(this).attr('data-tbname');
		if(confirm('确定要备份数据表 ' + tbname + ' 吗？')){
			$.post("<?php echo url('backup/export','',''); ?>",{'tbname' : tbname},function(data){
				if(data.status==1){
					var alertstr='数据表' + tbname + '备份成功\n备份文件路径:\n' + data.exportpath;
					alert(alertstr);
				}
			},'json');	
		}
	});

	$('.import').click(function(){
		var tbname=$(this).attr('data-tbname');
		if(confirm('确定要还原数据表 ' + tbname + ' 吗？')){ 			
			$.post("<?php echo url('backup/import','',''); ?>",{'tbname' : tbname},function(data){
				if(data.status==0){
					alert('没有检索到数据表'+tbname+'的备份文件！');
				}else{
					var selectstr = ''; 
					$.each(data.filelist,function(i){
						selectstr += '<div class="radio container"><label><input type="radio" name="file" value="' + data.filelist[i] + '">' 
						selectstr += data.filelist[i];
						selectstr += '</label> </div>';
					});
					
					$('#select-import').html(selectstr);
					$('#select-import > div').first().find('input').attr("checked","checked");
					$('#myModal').modal('toggle');
				}
			},'json');	
		}
	});

	$('#comfirm-import').click(function(){
		var formData = new FormData($("#importform")[0]); 
		$.ajax({  
	      url: "<?php echo url('backup/confirmimport','',''); ?>",  
	      type: "POST",  
	      data: formData, 
	      dataType:"json",  
	      contentType: false,  
	      processData: false,  
	      success:function(data){ console.log(data);
	      	$('#myModal').modal('toggle');
	        if (data.status == 1) { 
	        	$.each(data.result,function(i){
			        console.log((data.result[i]));
     			});
	           alert('还原成功！');
	        }
	      } 
	    });  
	});
</script>

		</section>	
	</main>
	<footer class="container-fluid">
		<div class="text-center copyright" style="font-family:Arial;">Copyright©2016All Rright Reserved</div>
	</footer>
	<script type="text/javascript" src="__PUBLIC__/static/common/bootstrap/js/bootstrap.min.js"></script>
	<script>
		$('.sidebar').click(function(){  //响应式侧边栏
			$('aside').fadeToggle();
		});
	</script>

<!-- 手风琴式侧边导航菜单 -->
	 <script>
		$(function(){
		 	$(".menu>li>span").click(function(){
		 		$(this).addClass("menuactive").parent().siblings().children("span").removeClass("menuactive");
		 		$(this).next("ul").slideToggle(); 
		 		$(this).parent().siblings().children("ul").slideUp(); 
		 	}); 
		 });
	 </script>
</body>
</html>