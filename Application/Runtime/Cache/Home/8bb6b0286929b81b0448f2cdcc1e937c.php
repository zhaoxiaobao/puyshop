<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
<html>
<head>
	<title>注册</title>
	<link href="/pshop/Public/nick/css/style.css" rel='stylesheet' type='text/css' />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="[keywords]" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<script src="/pshop/Public/nick/js/jquery.min.js"></script>
<script src="/pshop/Public/js/jquery.validate.js"></script>
<script src="/pshop/Public/js/jquery.validate.messages_cn.js"></script>
<script type="text/javascript" src="/pshop/Public/nick/js/jquery.easy-ticker.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#demo').hide();
		$('.vticker').easyTicker();
	});
</script>
 <link rel="icon" href="/pshop/Public/nick/images/pu.png" type="image/x-icon">
<link href="/pshop/Public/nick/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="/pshop/Public/nick/js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="/pshop/Public/nick/js/menu_jquery.js"></script>
<link rel="stylesheet" href="/pshop/Public/nick/css/slippry.css">
<script src="/pshop/Public/nick/js/jquery-ui.js" type="text/javascript"></script>
<script src="/pshop/Public/nick/js/scripts-f0e4e0c2.js" type="text/javascript"></script>
<script>
	jQuery('#jquery-demo').slippry({
			  // general elements & wrapper
			  slippryWrapper: '<div class="sy-box jquery-demo" />', // wrapper to wrap everything, including pager
			  // options
			  adaptiveHeight: false, // height of the sliders adapts to current slide
			  useCSS: false, // true, false -> fallback to js if no browser support
			  autoHover: false,
			  transition: 'fade'
			});
</script>
<script type="text/javascript" src="/pshop/Public/nick/js/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="/pshop/Public/nick/css/jquery-ui.css">
		<script type='text/javascript'>//<![CDATA[ 
			$(window).load(function(){
				$( "#slider-range" ).slider({
					range: true,
					min: 0,
					max: 500,
					values: [ 100, 400 ],
					slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
				}
			});
				$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );
				
			});//]]>  
		</script>
		<script type="text/javascript" src="/pshop/Public/nick/js/move-top.js"></script>
		<script type="text/javascript" src="/pshop/Public/nick/js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
		</script>
		<link href="/pshop/Public/nick/css/owl.carousel.css" rel="stylesheet">
		<script src="/pshop/Public/nick/js/jquery-1.9.1.min.js"></script> 
		<script src="/pshop/Public/nick/js/owl.carousel.js"></script>
		<script>
			$(document).ready(function() {

				$("#owl-demo").owlCarousel({
					items : 3,
					lazyLoad : true,
					autoPlay : true,
					navigation : true,
					navigationText : ["",""],
					rewindNav : false,
					scrollPerPage : false,
					pagination : false,
					paginationNumbers: false,
				});

			});
		</script>
	</head>
	<body>
		<div class="header">
			<div class="top-header">
				<div class="wrap">
					<div class="top-header-left">

					</div>
					<div class="top-header-center">
						<div class="top-header-center-alert-left">
							<h3>浦苑商城</h3>
						</div>
						<div class="top-header-center-alert-right">
							<div class="vticker">
								<ul>
									<?php if(!empty($_COOKIE['nickname'])): ?><li>

										
										
										<?php switch($_COOKIE['role']): case "1": ?>您有<a href="<?php echo U('Stu/znxlist');?>" class="msg-count"></a>条未读信息！<?php break;?>
											<?php case "2": ?><a href="<?php echo U('Com/znxlist');?>" class="msg-count"></a>条未读信息！<?php break;?>


											<?php default: endswitch;?>

											

										</li><?php endif; ?>	
									<?php if(empty($_COOKIE['nickname'])): ?><li>浦苑商城 <label>正式上线了！</label>

											

										</li><?php endif; ?>	
								</ul>
							</div>
						</div>
						<div class="clear"> </div>
					</div>
					<script type="text/javascript">

						$.post("<?php echo U('Msg/checkmsg');?>",{name:"add_time",status:"true"},
							function(data){

						$('.msg-count').text(data.count);

					},'json');



					</script>

					<div class="top-header-right"> 
						<ul>
							<?php if(!empty($_COOKIE['nickname'])): ?><li><a href="<?php echo U('Index/role');?>">用户中心</a><span> </span></li>
								<li><a href="<?php echo U('Login/logout');?>">退出</a><span> </span></li><?php endif; ?>	

						</ul>

						<ul>

							
							<?php if(empty($_COOKIE['nickname'])): ?><li><a href="<?php echo U('Login/index');?>">登录</a><span> </span></li>
								<li><a href="<?php echo U('Register/index');?>">注册</a><span> </span></li><?php endif; ?>	

						</ul>

					</div>
					<div class="clear"> </div>
				</div>
			</div>
			<div class="mid-header">
				<div class="wrap">
					<div class="mid-grid-left">
						<form method="get"  action="<?php echo U('Index/search');?>">
							<input type="text"  name="keyword" placeholder="输入关键词，快速检索一下" />
						</form>
					</div>
					<div class="mid-grid-right">
						<a class="logo" href="<?php echo U('Index/index');?>"><span> </span></a>
					</div>
					<div class="clear"> </div>
				</div>
			</div>
			<div class="header-bottom">
				<div class="wrap">
					<ul class="megamenu skyblue">
						<li class="grid"><a class="color2" href="<?php echo U('Index/index');?>">首页</a></li>
					</ul>
				</div>
			</div>
			<script type="text/javascript">

				$('.header-bottom').offsetTop('');


			</script>
		</div>
<div class="content login-box">
			<div class="login-main">
				<div class="wrap">
					<h1>创建一个账户</h1>
					<div class="register-grids">
						<form action="<?php echo U('Register/userReg');?>" method="post">
								<div class="register-top-grid">
										<h3>个人信息</h3>
										<div>
											<span>用户名<label>*</label></span>
											<input type="text" required name="user" required minlength="3" title="请输入您的用户名"> 
										</div>
										<div>
											<span>手机号<label>*</label></span>
											<input type="text" required name="phone" > 
										</div>
										<div>
											<span>邮箱<label>*</label></span>
											<input type="text" required name="mail"> 
										</div>
										<div class="clear"> </div>
											<a class="news-letter" href="#">
											<p><input type="radio" name="type" value="2" />卖家
    <input type="radio" name="type" value="1" /> 买家</p>
			
											</a>
										<div class="clear"> </div>
								</div>
								<div class="clear"> </div>
								<div class="register-bottom-grid">
										<h3>注册信息</h3>
										<div>
											<span>密码<label>*</label></span>
											<input type="password" name="password" required>
										</div>
										<div>
											<span>确认密码<label>*</label></span>
											<input type="password" name="repassword" required>
										</div>
										<div class="clear"> </div>
								</div>
								<div class="clear"> </div>
								<input type="submit" value="提交" />
						</form>
					</div>
				</div>
			</div>
		</div>
<div class="clear"> </div>
<script src="http://jquery.bassistance.de/validate/jquery.validate.js"></script>

		<div class="bottom-grids">
			<div class="bottom-top-grids">
				<div class="wrap">
					<div class="bottom-top-grid">
						<h4>新手入门</h4>
						<ul>
							<li><a href="contact.html">购物流程</a></li>
							<li><a href="#">联系我们</a></li>
							<li><a href="#">常见问题</a></li>
							<li><a href="#">网站详情</a></li>
						</ul>
					</div>
					<div class="bottom-top-grid">
						<h4>支付方式</h4>
						<ul>
							<li><a href="#">网上支付</a></li>
							<li><a href="#">现金支付</a></li>
							<li><a href="#">使用抵用卷</a></li>
						</ul>
					</div>
					<div class="bottom-top-grid last-bottom-top-grid">
						<h4>自助服务</h4>
						<ul>
							<li><a href="#">取消订单</a></li>
							<li><a href="#">退换货申请</a></li>
							<li><a href="#">在线投诉</a></li>
							<li><a href="#">绑定手机/邮箱</a></li>
						</ul>
						<a class="learn-more" href="#">了解更多</a>
					</div>
					<div class="clear"> </div>
				</div>
			</div>
			<div class="bottom-bottom-grids">
				<div class="wrap">
					<div class="bottom-bottom-grid">
						<h6>邮箱登陆</h6>
						<p>及时了解最新产品和优惠服务.</p>
						<a class="learn-more" href="#">登录</a>
					</div>
					<div class="bottom-bottom-grid">
						<h6>优惠卷</h6>
						<p>使用优惠卷可以抵消部分消费.</p>
						<a class="learn-more" href="#">查看卡</a>
					</div>
					<div class="bottom-bottom-grid last-bottom-bottom-grid">
						<h6>附近商店</h6>
						<p>查找附近零售店或授权的零售商.</p>
						<a class="learn-more" href="#">搜索</a>
					</div>
					<div class="clear"> </div>
				</div>
			</div>
		</div>

		<div class="footer">
			<div class="wrap">
				<div class="footer-left">
					<ul>
						<li><a href="#">Copyright © 2015 puyshop.cn All Rights Reserved</a> <span> </span></li>
						<li><a href="#">苏ICP备   15016503号 </a> <span> </span></li>
						<li><a href="#"> 关于我们</a> <span> </span></li>
						<li><a href="#">隐私政策</a> <span> </span></li>
						<li><a href="#">意见反馈</a></li>
						<div class="clear"> </div>
					</ul>
				</div>
				<div class="footer-right">
					<p> <a href="" target="_blank" title="">友情链接</a></p>
					<script type="text/javascript">
						$(document).ready(function() {
							
							var defaults = {
					  			containerID: 'toTop', // fading element id
								containerHoverID: 'toTopHover', // fading element hover id
								scrollSpeed: 1200,
								easingType: 'linear' 
							};
							
							
							$().UItoTop({ easingType: 'easeOutQuart' });
							
						});
					</script>
					<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
	</body>
	</html>