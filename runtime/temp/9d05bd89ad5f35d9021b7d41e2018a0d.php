<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:65:"E:\wamp64\www\tp5/application/admin\view\members\memberslist.html";i:1502100967;s:57:"E:\wamp64\www\tp5/application/admin\view\public\base.html";i:1527229214;s:56:"E:\wamp64\www\tp5/application/admin\view\public\nav.html";i:1501324619;s:58:"E:\wamp64\www\tp5/application/admin\view\public\aside.html";i:1535335564;}*/ ?>
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
<title>管理列表模板文件源码</title>
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
			
	<p class="welcome"><a href="<?php echo url('admin/index/index'); ?>"> <span class="glyphicon glyphicon-home"></span>首页</a> > <a href="<?php echo url('members/memberslist'); ?>">用户管理</a> > 用户列表</p>
	<div class="wrap table-responsive">
		<ul class="list-inline">
			<li><li><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">新增用户</button></li></li>
			<li><a class="btn btn-success" href="#">批量删除</a></li>
			<li><a class="btn btn-success" href="#">更新排序</a></li>
			<li><font color="red">有且仅有一个超级管理uid=1,admin;删除用户还必须同时删除其留言，评论；只能修改管理员，超管不能锁定和删除</font></li>
		</ul>	
		<table class="listtab table table-striped table-bordered table-hover table-condensed">
			<tr>
				<th><input type="checkbox" ></th>
				<th>sort</th>
				<th >ID</th>
				<th>user</th>
				<th title="所属用户组">group</th>
				<th>tel</th>
				<th>email</th>
				<th>gender</th>
				<th>birth</th>
				<th title="登录时间">logintime</th>
				<th title="登录ip">loginip</th>
				<th title="登录次数">count</th>
				<th title="会员积分">score</th>
				<th title="锁定状态">locked</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<tr>
					<td><input type="checkbox" ></td>
					<td><input type="text" name="sort" value="0" size="2" class="text-center"></td>
					<td><?php echo $vo['uid']; ?></td>
					<td><?php echo $vo['username']; ?></td>
					<td><?php echo $vo['group_title']; ?></td>
					<td><?php echo $vo['tel']; ?></td>
					<td><?php echo $vo['email']; ?></td>
					<td><?php echo $vo['gender']; ?></td>
					<td><?php echo $vo['birthday']; ?></td>
					<td><?php echo date("Y.m.d",$vo['logintime']); ?></td>
					<td><?php echo $vo['loginip']; ?></td>
					<td><?php echo $vo['logincount']; ?></td>
					<td><?php echo $vo['score']; ?></td>
					<td><?php echo $vo['locked']; ?></td>
					<td>					
						<a class="btn btn-info" href="<?php echo url('editormembers',['uid'=>$vo['uid']]); ?>" <?php if($vo['typeof'] == '0'): ?> disabled="disabled" onclick="return false;" <?php endif; ?>>修改</a>  

						<?php if($vo['locked'] == '0'): ?>
							<a class="btn btn-warning" href="<?php echo url('lockmembers',['uid'=>$vo['uid']]); ?>" <?php if($vo['uid'] == '1'): ?> disabled="disabled" onclick="return false;" <?php endif; ?> onclick="return confirm('确定要锁定该用户吗？')">锁定</a>
						<?php else: ?>
							<a class="btn btn-success" href="<?php echo url('unlockmembers',['uid'=>$vo['uid']]); ?>" <?php if($vo['uid'] == '1'): ?> disabled="disabled" onclick="return false;" <?php endif; ?> onclick="return confirm('确定要解锁该用户吗？')">解锁</a>
						<?php endif; ?>
						<a class="btn btn-danger" href="<?php echo url('deletemembers',['uid'=>$vo['uid']]); ?>" <?php if($vo['uid'] == '1'): ?> disabled="disabled" onclick="return false;" <?php endif; ?> onclick="return confirm('确定要删除该用户吗？')">删除</a>	
					</td>
				</tr>
			<?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
		</table>
	</div>
<!-- bootstrap模态框新增用户 -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	    		<form action="<?php echo url('members/addmembers'); ?>" method="post" class="form-horizontal">
		      		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        		<h4 class="modal-title" id="myModalLabel">新增用户<small>---bootstrap模态框</small></h4>
		      		</div>
		      		<div class="modal-body">
			      		<div class="form-group">
							<label for="username" class="col-md-3 col-xs-3 control-label"><font color="red">* </font>用户名</label>
							<div class="col-md-9 col-xs-9">
								<input type="text" name="username" id="username">
							</div>
						</div>
						<div class="form-group">
							<label for="authgroup" class="col-md-3 col-xs-3 control-label"><font color="red">* </font>用户组</label>
							<div class="col-md-9 col-xs-9">
								<?php if(is_array($authgroup) || $authgroup instanceof \think\Collection || $authgroup instanceof \think\Paginator): $i = 0; $__LIST__ = $authgroup;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(!strchr($vo['title'],'会员')): ?>
										<input type="radio" name="authgroup" id="authgroup<?php echo $vo['id']; ?>" value="<?php echo $vo['id']; ?>">
										<label for="authgroup<?php echo $vo['id']; ?>"><?php echo $vo['title']; ?></label>
									<?php endif; endforeach; endif; else: echo "" ;endif; ?>
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-md-3 col-xs-3 control-label"><font color="red">* </font>密 码</label>
							<div class="col-md-9 col-xs-9">
								<input type="text" name="password" id="password">
							</div>
						</div>
		      		</div>
		      		<div class="modal-footer">
		        		<button type="submit" class="btn btn-primary" >确认新增</button>
		        		<button type="button" class="btn btn-default" data-dismiss="modal">取消新增</button>
		      		</div>
	      		</form>
	    	</div>
	  	</div>
	</div>

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