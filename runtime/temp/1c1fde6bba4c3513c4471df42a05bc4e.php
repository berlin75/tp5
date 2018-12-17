<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:59:"E:\wamp64\www\tp5/application/admin\view\blog\bloglist.html";i:1503329223;s:57:"E:\wamp64\www\tp5/application/admin\view\public\base.html";i:1527229214;s:56:"E:\wamp64\www\tp5/application/admin\view\public\nav.html";i:1501324619;s:58:"E:\wamp64\www\tp5/application/admin\view\public\aside.html";i:1535335564;}*/ ?>
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
<title>博文列表模板文件源码</title>
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
			
	<p class="welcome"><a href="<?php echo url('admin/index/index'); ?>"><span class="glyphicon glyphicon-home"></span> 首页</a> > <a href="<?php echo url('blog/bloglist'); ?>">博文管理</a> > 博文列表</p>
	
<div class="container-fluid">
	<div class="row">
		<ul class="list-inline col-md-4">
			<li><a class="btn btn-success" href="<?php echo url('addblog'); ?>">新增博文</a></li>
			<li><input type="submit" class="btn btn-success" value="批量删除" form="bloglistform"></li>
			<li><a class="btn btn-success" href="javascript:void(0)" onclick="downloadexcel()">下载列表excel</a></li>
		</ul>

		<div class="container-fluid col-md-6 col-md-offset-2" >
			<form class="form-inline">
				<div class="form-group">
					<label for="catename" class="control-label">选择栏目:</label>
					<select name="catename" class="form-control">
						<option>全部栏目</option>
						<?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<option><?php echo $vo['catename']; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
				<div class="form-group">
					<div class="input-group">			    		
			     		<input type="text" id="titlekeyword" class="form-control" placeholder="标题关键字...">
			        	<div class="input-group-btn">
				        	<button class="btn btn-primary searchbtn" type="button" title="搜索">
				        		<span class="glyphicon glyphicon-search"></span>
				        	</button>
			      		</div>
			    	</div>
				</div>
			</form>
		</div>
	</div>
	<div>
		<form action="<?php echo url('blog/deleteblog'); ?>" method="post" name="bloglistform" id="bloglistform"  onsubmit="return confirm('确定要删除吗？')" class="table-responsive">	
			<table class="listtab table table-striped table-bordered table-hover table-condensed">
				<tr class="thead">
					<th><input type="checkbox" ></th>
					<th><a href="<?php echo url('blog/bloglist',['field'=>'bid','order'=>'asc']); ?>" title="bid升序" >ID</a></th>
					<th>标题</th>
					<th>所属栏目</th>
					<th>缩略图</th>
					<th><a href="<?php echo url('blog/bloglist',['field'=>'click','order'=>'desc']); ?>" title="click降序">点击量</th>
					<th><a href="<?php echo url('blog/bloglist',['field'=>'time','order'=>'desc']); ?>" title="time降序">发布时间</a></th>
					<th >评论</th>
					<th >操作</th>
				</tr>
				<?php if(is_array($blog) || $blog instanceof \think\Collection || $blog instanceof \think\Paginator): $i = 0; $__LIST__ = $blog;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<tr>
						<td><input type="checkbox" name="bid<?php echo $vo['bid']; ?>" value="<?php echo $vo['bid']; ?>"></td>
						<td><?php echo $vo['bid']; ?></td>
						<td><?php echo $vo['title']; ?></td>
						<td><?php echo $vo['catename']; ?></td>
						<td>
							<?php if($vo['pic'] == ''): ?>暂无缩略图
							<?php else: ?><img src="__PUBLIC__/static/uploads/<?php echo trim(strstr($vo['pic'],' ')); ?>" title="<?php echo $vo['picdesc']; ?>" height="50" />
							<?php endif; ?>
						</td>
						<td><?php echo $vo['click']; ?></td>
						<td><?php echo date('Y-m-d',$vo['time']); ?></td>
						<td></td>
						<td>
							<a class="btn btn-info" href="<?php echo url('index/article/index',['bid'=>$vo['bid']]); ?>" target="_blank">查看</a>
							<a class="btn btn-info" href="<?php echo url('editorblog',['bid'=>$vo['bid']]); ?>">修改</a> 
							<a class="btn btn-warning" href="<?php echo url('deleteblog',['bid'=>$vo['bid']]); ?>" onclick="return confirm('确定要删除该博文吗？')">删除</a>
						</td>
					</tr>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
		</form>
		
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

	//按栏目筛选
	$('select[name=catename]').change(function(){
		var catename = $(this).val();
		$('tr:not(.thead)').show();
		if(catename !== '全部栏目'){
			$('tr:not(.thead)').each(function(){
				var match = $(this).children().eq(3).text();
				if(match !== catename){
					$(this).hide();
				}
			});
		}		
	});

	//按照标题关键词筛选
	$('#titlekeyword').keyup(function(){
		var titlekeyword = $(this).val(); 
		if(titlekeyword){ 
			$('tr:not(.thead)').each(function(){
				var match = $(this).children().eq(2).text();
				var result = match.search(titlekeyword);
				if(result != -1){
					$(this).css('background','rgba(146,221,73,.3)');
				}
			});
		}			
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