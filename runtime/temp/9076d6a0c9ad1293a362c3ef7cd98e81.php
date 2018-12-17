<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:57:"E:\wamp64\www\tp5/application/admin\view\login\index.html";i:1534743776;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" >
	<meta name="viewport" content="width=device-width,initial-scale=1.0" >
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="__PUBLIC__/static/favicon.ico" />
	<link rel="bookmark" href="__PUBLIC__/static/favicon.ico" type="image/x-icon"/>
	<title>后台登录模板</title>
	<script type="text/javascript" src="__PUBLIC__/static/common/jquery-3.1.1.js"></script>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/static/common/bootstrap/css/bootstrap.min.css" />
	<style>
		/*.help-block{position: absolute;left: 55%;top: 0px;}*/
		body{background-image: url(__PUBLIC__/static/admin/image/bj.png)}
	</style>
</head>
<body class="container">
<main class="row">
<div class="col-md-6 col-md-offset-3" style="background-color: #f2f2f2;margin-top: 8rem">
	<form action="" method="post" name="loginform" role="form">
		<h3 style="text-align: center;margin-bottom: 2rem;">管理登录</h3>
	  	<div class="form-group">
		    <div class="input-group">
			    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			    <input type="text" class="form-control" name="username" placeholder="密码以字母开头,5-16字节,允许数字字母下划线" autofocus required>
			</div>
	  	</div>
	  	<div class="form-group">
		    <div class="input-group">
			    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			    <input type="password" name="password" class="form-control" placeholder="密码以字母开头,5-16字节,允许数字字母下划线" required>
			</div>			    
	  	</div>
		<div class="row">
			<div class="col-md-6">
				<div class="input-group">
				    <span class="input-group-addon"><span class="glyphicon glyphicon-check"></span></span>
				    <input type="text" name="captcha" id="captcha" class="form-control" placeholder="请输入验证码" required pattern="[A-z0-9]{4}">
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
					<img src="<?php echo captcha_src(); ?>" id="yzpic">
					<a href="javascript:void(0)" onclick="document.getElementById('yzpic').src='<?php echo captcha_src(); ?>?id='+Math.random() ">看不清</a>
				</div>
			</div>
		</div>
	  	<div class="form-group">
		  	<div class="checkbox">
			 	<label><input type="checkbox" name="autologin" value="7">一周内自动登录</label>
		  	</div>
	  	</div>
	  	<div class="form-group col-md-offset-2 col-md-8">
	     	<button type="submit" class="btn btn-primary btn-lg btn-block" style="padding: 1rem 5rem;"> 登 录 </button>
	    </div>
	</form>
</div>
</main>
<script type="text/javascript" src="__PUBLIC__/static/common/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/common/jquery-validation-1.17.0/dist/jquery.validate.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/common/jquery-validation-1.17.0/dist/localization/messages_zh.js"></script>
<script>
$.validator.setDefaults({
    submitHandler: function(form) {
      form.submit();
    }
});
$().ready(function() {
	jQuery.validator.addMethod("isUser", function(value, element) {
        return this.optional(element) || /^[a-zA-Z][a-zA-Z0-9_]{4,15}$/.test(value);
    }, "用户名以字母开头,5-16字节,允许数字字母下划线");
    jQuery.validator.addMethod("isPwd", function(value, element) {
        return this.optional(element) || /^[a-zA-Z]\w{4,15}$/.test(value);
    }, "密码以字母开头,5-16字节,允许数字字母下划线");
    jQuery.validator.addMethod("isCaptcha", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9]{4}$/.test(value);
    }, "验证码输入有误");

// 在键盘按下并释放及提交后验证提交表单
  $("[name=loginform]").validate({
	    rules: {
	      username: { required: true, isUser: true, },
	      password: { required: true, isPwd: true },
	      captcha: { required: true, isCaptcha: true },
	    },
	    messages: {
	      username: { required: "请输入用户名", },
	      password: { required: "请输入密码", },
	      captcha: {  required: "请输入验证码", },
	    },
	    errorElement: "p",
		errorClass : 'help-block',
	    //自定义错误消息放到哪里
        errorPlacement : function(error, element) {
            element.next().remove();//删除显示图标
            element.after('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');
            element.closest('.form-group').append(error);//显示错误消息提示
        },
        //给未通过验证的元素进行处理
        highlight : function(element) {
            $(element).closest('.form-group').addClass('has-error has-feedback');
        },
        //验证通过的处理
        success : function(label) {
            var el=label.closest('.form-group').find("input");
            el.next().remove();
            // el.after('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>');
            // label.closest('.form-group').removeClass('has-error').addClass("has-feedback has-success");
            // label.remove();
            label.closest('.form-group').removeClass('has-error');
        },
	});
});


</script>
</body>
</html>