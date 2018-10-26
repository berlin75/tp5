<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:57:"E:\wamp64\www\tp5/application/index\view\index\index.html";i:1533092965;s:56:"E:\wamp64\www\tp5/application/index\view\public\nav.html";i:1501351599;s:59:"E:\wamp64\www\tp5/application/index\view\public\footer.html";i:1502117575;s:59:"E:\wamp64\www\tp5/application/index\view\public\fixnav.html";i:1500055131;}*/ ?>
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
<title><?php echo \think\Config::get('webinfor.webname'); ?></title>
<script type="text/javascript" src="__PUBLIC__/static/common/jquery-3.1.1.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/static/common/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/static/index/css/base.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/static/index/css/index.css" />
</style>
<!--百度统计-->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?71238d5d26321ca3a21a98fce0ad7ecd";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

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
	<main>
		<section>
		 	<ul class="banner">
		 		<li id="banner1">
		 			<div class="banner-body">
		 				<h1>李宗盛</h1>
		 				<h3>
		 					<span>有人问我你究竟是哪里好</span>
							<span>这么多年我还忘不了</span>
							<span>春风再美也比不上你的笑</span>
							<span>没见过你的人不会明了</span>
						</h3>
		 				<p><a class="banner-link" href="<?php echo url('article/index',['bid'=>25]); ?>" title="李宗盛-鬼迷心窍">了解详情</a></p>
		 			</div>
		 		</li>
		 		<li id="banner2">
		 			<div class="banner-body">
		 				<h1>罗大佑</h1>
		 				<h3>
		 					<span>乌溜溜的黑眼珠和你的笑脸</span>
							<span>怎么也难忘记你容颜的转变</span>
							<span>轻飘飘的旧时光就这么溜走</span>
							<span>转头回去看看时已匆匆数年</span>
						</h3>
		 				<p><a class="banner-link" href="<?php echo url('article/index',['bid'=>26]); ?>" title="罗大佑-恋曲1990">了解详情</a></p>
		 			</div>
		 		</li>
		 		<div class="banner-btn">
	 				<span id="banner-btn1" class="banner-btn-active"></span>
	 				<span id="banner-btn2" class="banner-btn-default"></span>
	 			</div>
		 	</ul>
			<div class="content-body">
				<div class="container">
					<ul class="list-ul">
						<li>
							<div class="title-time">
								<h3><a href="####" title="明心见性的一段对话">明心见性的一段对话</a></h3>
								<small>2017年6月10日</small>
							</div>
							<div class="desc-pic row">				
							    <div class="col-md-3">
							    	<a href="####" title="明心见性的一段对话">
							       		<img src="__PUBLIC__/static/index/image/1.jpg" class="list-img" alt="文章缩略图" title="文章缩略图" />
							        </a>
							    </div>
								<div class="col-md-9" >
									以下是我和妹子萌萌的一段对话，希望我们都能一直保持平常心，认真做自己，开心过好每一天……
									<div class="text-right">
										<a class="btn btn-success" href="####" title="明心见性的一段对话">阅读全文 ></a>
									</div>
								</div>
							</div>
							<div class="art-tags"><span class="glyphicon glyphicon-tags " style="color: red;"> Tags:</span>
								觉悟 生活 人生 规则
							</div>
							<div class="art-info">
								<span>发布：圈圈 | 分类：如是观 | 评论：23 | 浏览：234 |</span>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</section>
		<div class="flink">
			<div class="container">
				<div class="flink-title">[友情链接]</div>
				<ul class="list-inline">
					<?php if(is_array($flink) || $flink instanceof \think\Collection || $flink instanceof \think\Paginator): $i = 0; $__LIST__ = $flink;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<li><a href="<?php echo $vo['urlpath']; ?>" target="_blank" title="<?php echo $vo['urldesc']; ?>" ><?php echo $vo['title']; ?></a></li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
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
	
	<script>
		function change(){
			$('#banner1').toggle();
			$('#banner2').toggle();
			$('#banner-btn1').toggleClass('banner-btn-active');
			$('#banner-btn1').toggleClass('banner-btn-default');
			$('#banner-btn2').toggleClass('banner-btn-active');
			$('#banner-btn2').toggleClass('banner-btn-default');
		}
		var timer=setInterval(change,3000);
		$('.banner').hover(function(){clearInterval(timer);},function(){timer=setInterval(change,3000);});
		$('#banner-btn1').click(function(){change();});
		$('#banner-btn2').click(function(){change();});
	</script>
</body>
</html>
