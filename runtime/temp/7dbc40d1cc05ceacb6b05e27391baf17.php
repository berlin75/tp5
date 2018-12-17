<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:57:"E:\wamp64\www\tp5/application/admin\view\index\index.html";i:1532944779;s:57:"E:\wamp64\www\tp5/application/admin\view\public\base.html";i:1527229214;s:56:"E:\wamp64\www\tp5/application/admin\view\public\nav.html";i:1501324619;s:58:"E:\wamp64\www\tp5/application/admin\view\public\aside.html";i:1535335564;}*/ ?>
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
<title>后台首页模板文件源码</title>
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
			
	<p class="welcome" style="border-bottom: 1px solid rgba(128,128,128,0.3);">欢迎收看童老师thinkPHP视频教程 
		<a href="#" ><font color="red">点击观看视频教程</font></a>
	</p>
	<div class="wrap">
		<ul class="list-inline">
			<li><a class="btn btn-default" href="<?php echo url('blog/addblog'); ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>新建博文</a></li>
			<li><a class="btn btn-default" href="<?php echo url('cate/addcate'); ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>新增栏目</a></li>
		</ul>	
	</div>
	<div class="table-responsive">
		<p class="titlebar"><b>系统基本信息</b></p>
		<table class="table table-condensed">
			<tr><td align="right">操作系统:</td><td><?php echo \think\Request::instance()->server('HTTP_USER_AGENT'); ?></td></tr>
			<tr><td align="right">运行环境::</td><td>wamp3.0.0</td></tr>
			<tr><td align="right">PHP运行方式:</td><td><?php echo \think\Request::instance()->server('SERVER_SOFTWARE'); ?></td></tr>
			<tr><td align="right">版本信息:</td><td>thinkphp<?php echo THINK_VERSION; ?></td></tr>
			<tr><td align="right">上传附件限制:</td><td>2M</td></tr>
			<tr><td align="right">北京时间:</td><td><?php echo date("Y-m-d H:i:s",\think\Request::instance()->server('REQUEST_TIME')); ?></td></tr>
			<tr><td align="right">服务器域名/ip:</td><td><?php echo \think\Request::instance()->ip(); ?></td></tr>
			<tr><td align="right">host:</td><td><?php echo \think\Request::instance()->server('HTTP_HOST'); ?></td></tr>
		</table>
	</div>
	<div class="wrap">
		<p class="titlebar">使用帮助</p>
		<p>thinkphp交流群：465137869</p>
	</div>
	<div class="contaainer-fluid">
		<hr/><p>TODO:</p>
		<ol>
			<li>关闭调试模式'app_debug' => false,404页面生效</li>
			<li>数据库配置，模板上传目录修改，ueditor上传修改config.json</li>
			<li>网站统计信息工具，网站认证，百度广告联盟</li>
			<li>https://connect.qq.com/manage.html#/</li>

			<li>网站地图，关于我们，法律条款，帮助中心等单页面，文章评论，robot，搜索</li>
			<li>头像缩略图截取区域</li>

			<li>前端文章收藏写入了数据库，怎么防止用户频繁的收藏和取消，或者是写入session</li>

			<li>防止用户恶意频繁访问数据库：做好数据库并发，设置内容缓存，限制访问时间间隔(用户体验差)、验证码，自动限制恶意ip访问频率，重复内容判断，无效内容判断</li>
			<li>防止站外提交、恶意注册、恶意攻击，设置间隔，用户可以禁用js和cookie</li>
			<li>考虑服务器压力，防止频繁读写数据库，无法显示网页、目前访问网站的用户过多</li>
			<li>考虑服务器压力，一些前端后台都能处理的任务交给前端处理</li>
			<li>高并发：多个客户端同时调用数据库数据，没有缓存的情况下，mysql是怎么处理的</li>

			<li>mysql怎么自动删除超过3天的数据:1.通过触发器来删。给这个表建立一个触发器，每当有insert或者update的时候，就触发一条sql，这个sql就是删除过期的数据; 2.写程序加到crontab里面，让定时执行，然后去删; 3.mysql中有个event定时处理机制,写个删除数据的存储过程  ，让event定时调用这个存储过程; 4.delete from table_name where endTime=curdate(); 4.1.程序中处理： 在你的程序中有对某个表的insert操作的地方，在insert操作完成之后，查询该表的记录数，如果超过你设定的数量，则把用delete操作将前面的数据删除。 2.数据库触发器： 一般数据库系统都是支持“触发器trigger”的，你可数据库中创建一个 当insert操作时触发的触发器</li>
			<li>The system limits the search interval of 10 seconds,and later search</li>
			<li>
				<pre>
					btn.onclick = function() {
						this.disabled = 'disabled';
						setTimeout(function() {
							btn.disabled = '';
						}, 1000);//1秒后才能点击
					};

					//er
					input id="btn" type="button" onclick="test(this)" value="test" 					
					function test(t){
						var i=1;
						t.disabled=true;
						var timer=setInterval(function(){t.value="test"+i;i++;
						if(i>4){t.disabled=false;i=1;t.value="test";clearInterva(timer)}},1000)
					}
					
				</pre>
			</li>

		</ol>
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