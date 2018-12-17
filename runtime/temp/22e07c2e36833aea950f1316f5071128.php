<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:57:"E:\wamp64\www\tp5/application/index\view\login\index.html";i:1534742797;s:56:"E:\wamp64\www\tp5/application/index\view\public\nav.html";i:1501351599;s:59:"E:\wamp64\www\tp5/application/index\view\public\footer.html";i:1502117575;s:59:"E:\wamp64\www\tp5/application/index\view\public\fixnav.html";i:1500055131;}*/ ?>
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
<title>登录-<?php echo \think\Config::get('webinfor.webname'); ?></title>
<script type="text/javascript" src="__PUBLIC__/static/common/jquery-3.1.1.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/static/common/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/static/common/nprogress/nprogress.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/static/index/css/base.css" />
<style>
	body{background: #f2f2f2;}
	#logregbox{padding-top: 2rem;margin-bottom: 3rem;background: #fff;border-radius: 4px;box-shadow:3px 3px 15px #666;}
</style>
</head>
<body>
	<header id="top">
		<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">       	
      		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        		<span class="sr-only">Toggle navigation</span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
      		</button>
      		<a class="navbar-brand" href="<?php echo url('index/index'); ?>" style="padding: 5px 15px;">
      			<img class="img-responsive" src="__PUBLIC__/static/logo.png" style="width: 45px;display: inline-block;">
      			<span><?php echo \think\Config::get('webinfor.webname'); ?></span>
      		</a>
    	</div>

    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      		<ul class="nav navbar-nav navbar-left">
        		<li class="active"><a href="<?php echo url('index/index'); ?>" >首页<span class="sr-only">(current)</span></a></li>
        			<?php if(is_array($nav) || $nav instanceof \think\Collection || $nav instanceof \think\Paginator): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<li role="presentation">
							<?php if($vo['catetype'] == 1): ?>
							<a href="<?php echo url('comment/index',['cid' => $vo['cid']]); ?>" ><?php echo $vo['catename']; ?></a>
							<?php else: ?>
							<a href="<?php echo url('articlelist/index',['cid' => $vo['cid']]); ?>" ><?php echo $vo['catename']; ?></a>
							<?php endif; ?>
						</li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
        		<li class="dropdown">
          			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Todo <span class="caret"></span></a>
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
      		<?php if(\think\Session::get('uid') == ''): ?>
	      		<ul class="nav navbar-nav navbar-right tologin">
		      		<li><a href="<?php echo url('login/index'); ?>">登录 | 注册</a></li>
		      	</ul>

	      	<?php else: ?>
		      	<ul class="nav navbar-nav navbar-right logined">
			        <li><a href="javascript:void(0);" ><span class="glyphicon glyphicon-user"></span> <?php echo session('username'); ?></a></li>
			        <li><a href="javascript:void(0);" ><span class="glyphicon glyphicon-bell"></span> 信息中心<span class="badge">4</span></a></li>
			        <li class="dropdown">
			          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">用户信息 <span class="caret"></span></a>
			          	<ul class="dropdown-menu">
				            <li><a href="<?php echo url('members/editormembers',['uid' => session('uid')]); ?>" >个人主页</a></li>
				            <li role="separator" class="divider"></li>
				            <li><a href="<?php echo url('login/logout'); ?>" >退出登录</a></li>
			          	</ul>
			        </li>
		      	</ul>
	      	<?php endif; ?>
    	</div>
  	</div>
</nav>
	</header>
	<main class="container-fluid">
		<section class="row">
	        <div id="logregbox" class="col-md-6 col-md-offset-3">
                <div class="logregcon" id="tablogin">
                	<h3 style="padding-bottom:1rem;text-indent: 3rem;">会员登录</h3>
                   	<form action="" method="post" name="logform" class="form-horizontal"> 
					  	<div class="form-group">
						    <label class="control-label col-md-2 col-sm-2" for="username">用户名</label>
						    <div class="input-group col-md-6 col-sm-6" style="float: left;">
							    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							    <input type="text" class="form-control" id="username" name="username" autofocus required placeholder="用户名为5-22个字符" maxlength="22" >
							</div>
					  	</div>
					  	<div class="form-group">
						    <label class="control-label col-md-2 col-sm-2" for="password" >密&nbsp;&nbsp;码</label>
						    <div class="input-group col-md-6 col-sm-6" style="float: left;">
							    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							    <input type="password" class="form-control" id="password" name="password"  required placeholder="密码为5-12个字符" maxlength="12">
							</div>			    
					  	</div>
					  	<div class="form-group">
	                        <label class="control-label col-md-2 col-sm-2" for="name">验证码</label>
	                        <div class="input-group col-md-3 col-sm-3" style="float: left;">
	                        	<span class="input-group-addon"><i class="glyphicon glyphicon-check"></i></span>
	                          	<input type="text" id="captcha" name="captcha" class="form-control col-md-7 col-xs-12" placeholder="请输入验证码" required maxlength="<?php echo \think\Config::get('captcha.length'); ?>" pattern="[A-z0-9]{4}">
	                        </div>
	                        <div class="col-md-3 col-sm-3">						
								<a href="javascript:void(0)" title="点击切换验证码" onclick="document.getElementById('yzpiclog').src='<?php echo captcha_src(); ?>?id='+Math.random() ">
									<img src="<?php echo captcha_src(); ?>" alt="captcha" id="yzpiclog">
								</a>
						  	</div>
	                    </div>
					  	<div class="form-group">
						  	<div class="checkbox row">
							 	<label class="col-md-3 col-md-offset-2">
							 		<input type="checkbox" name="autologin" value="7">一周内自动登录
							 	</label>
							 	<a class="col-md-3 col-md-offset-2" href="javascript:void(0);">忘记密码？</a>
						  	</div>
					  	</div>						  	
					  	<div class="form-group">
					  		<div class="col-md-offset-2 col-md-6">
						  		<input type="hidden" name="preurl" value="<?php echo \think\Request::instance()->server('http_referer'); ?>">
						     	<button type="submit" id="logbtn" class="btn btn-primary btn-block btn-lg" > 登录 </button>
						     	<p style="text-align: center;margin-top: 2rem;"><a href="<?php echo url('index/login/register'); ?>">还没账号？立即注册</a></p>
					     	</div>
					    </div>
					</form>
                </div>
	        </div>
	    </section>
	</main>
	<footer id="bottom">
		<div class="container">
			<div class="row">
<!-- 	<div class="col-md-2 hidden-xs bottom-logo">
		<a href="<?php echo url('index/index'); ?>">
			<img src="__PUBLIC__/static/logo.png" title="sitename" class="img-response" style="vertical-align: middle;">
			<span>ThinkPhp5.0.9</span>
		</a>
	</div>
 -->
	<div class="col-md-9">
		<ul class="list-inline bottom-nav">
			<li><a href="<?php echo url('single/aboutus'); ?>" title="关于我们">关于我们</a></li>
			<li><a href="<?php echo url('single/aboutserver'); ?>" title="服务条款">服务条款</a></li>
			<li><a href="<?php echo url('single/aboutlayer'); ?>" title="法律声明">法律声明</a></li>
			<li><a href="<?php echo url('single/sitemap'); ?>" title="网站地图">网站地图</a></li>
			<li><a href="<?php echo url('single/helpcenter'); ?>" title="帮助中心">帮助中心</a></li>
		</ul>
		<div class="copyright">
			<span>Copyright©2016-2017 <?php echo \think\Config::get('webinfor.webname'); ?> 版权所有</span>
			<span><a href="#"><?php echo \think\Config::get('webinfor.beian'); ?></a></span>
		</div>
	</div>
	<div class="safe-logo" class="col-md-3">
		<img src="__PUBLIC__/static/index/image/sprite_safe.png" width="222" alt="360网站认证，可信任网站" title="360网站认证，可信任网站">
	</div>
</div>
		</div>
	</footer>

	<!--侧边悬浮框-->
	<!--侧边悬浮框-->
<div class="fixnav">
	<ul>
		<li>
			<a href="#top" title="↑ 返回顶部"><span></span></a>
		</li>
		<li>
			<a href="####"><span></span></a>
			<div>客服QQ:465137869<br/>周一至周六 9:00-18:00</div>			
		</li>
		<li>
			<a href="####"><span></span></a>
			<div>客服电话:400-888-8888<br/>周一至周六 9:00-18:00</div>			
		</li>
		<li>
			<a href="####"><span></span></a>
			<div>提交订单</div>			
		</li>
		<li>
			<a href="#bottom" title="↓ 移到底部"><span></span></a>
		</li>
	</ul>
</div>

	<script type="text/javascript" src="__PUBLIC__/static/common/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/static/common/nprogress/nprogress.js"></script>
	<script type="text/javascript" src="__PUBLIC__/static/common/bootstrap_validate.js"></script>
	<script>
		//表单验证         
		checkform($("form[name=logform]"));
	</script>
	
</body>
</html>