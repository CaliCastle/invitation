<?php include 'functions.php';
?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<title>登录 - Abletive论坛抢码活动</title>
<?php include 'head.php'; ?>
</head>
<body id="login">
  <div class="login-logo">
      <div id="banner" style="width:200px;height:200px;background-image:url(images/banner.png)"></div>
  </div>
  <h2 class="form-heading">登录后抢码</h2>
  <hr>
  <p style="text-align:center">抢码规则：每天凌晨00:00发放10个邀请码<br>全新的Abletive 论坛已开启内测，先到先得哦~</p>
  <div class="app-cam">
	  <form>
		<input type="text" class="text" value="" placeholder="用户名" id="username">
		<input type="password" value="" placeholder="密码" id="password">
		<div class="submit"><input type="button" id="login-button" onclick="submitLogin()" value="登录"><br /><p id="status" style="text-align:center"></p></div>
		<ul class="new">
			<li class="new_left"><p><a href="http://abletive.com/wp-login.php?action=lostpassword" target="_blank">忘记密码 ?</a></p></li>
			<li class="new_right"><p class="sign"><a href="http://abletive.com" target="_blank"> 访问社区</a></p></li>
			<div class="clearfix"></div>
		</ul>
	</form>
  </div>
   <div class="copy_layout login">
      <p>Copyright &copy; 2015. Abletive All rights reserved.</p>
   </div>
   <div class="overlay">
       <div class="message-box">
           <p id="message"></p>
       </div>
   </div>
   <script src="js/custom.js"></script>
   <script type="text/javascript">
    if(getCookie("invite")){
        window.location.href="index.php";
    }
    </script>
</body>
</html>
