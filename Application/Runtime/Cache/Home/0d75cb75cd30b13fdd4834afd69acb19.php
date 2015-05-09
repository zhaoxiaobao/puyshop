<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<title>浦苑商城-<?php echo ($Info['title']); ?>-学校周围在线商城</title>
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
							<input type="text"  name="keyword" placeholder="输入关键词，回车检索一下" id="keyword" />
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
						<li class="grid"><a class="color2" href="<?php echo U('Index/index');?>">双庭院</a></li>
						<li class="grid"><a class="color2" href="<?php echo U('Index/index');?>">力朋广场</a></li>
						<li class="grid"><a class="color2" href="<?php echo U('Index/index');?>">创业园</a></li>
					</ul>
				</div>
			</div>
			<script type="text/javascript">

				$('.header-bottom').offsetTop('');


			</script>
		</div>
<div class="content details-page">

	<div class="product-details">
		<div class="wrap">
			<ul class="product-head">
				<li><a href="#">主页</a> <span>::</span></li>
				<li class="active-page"><a href="#">产品页</a></li>
				<div class="clear"> </div>
			</ul>
			<link rel="stylesheet" href="/pshop/Public/nick/css/etalage.css">
			<script src="/pshop/Public/nick/js/jquery.etalage.min.js"></script>
			<script>
				jQuery(document).ready(function($){
					$('#etalage').etalage({
						thumb_image_width: 300,
						thumb_image_height: 400,
						source_image_width: 900,
						source_image_height: 1000,
						show_hint: true,
						click_callback: function(image_anchor, instance_id){
							alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
						}
					});
					$('.dropdownlist').change(function(){
						etalage_show( $(this).find('option:selected').attr('class') );
					});
				});
			</script>
			<div class="details-left">
				<div class="details-left-slider">
					<ul id="etalage">
						<?php if(is_array($pic)): $i = 0; $__LIST__ = $pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li>
								<img class="etalage_thumb_image" src="<?php echo ($data["url"]); ?>" />
								<img class="etalage_source_image" src="<?php echo ($data["url"]); ?>" />
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div class="details-left-info">
					<div class="details-right-head">
						<h1><?php echo ($Info['title']); ?></h1>
						<div class="product-more-details">
							<ul class="price-avl">
								<li class="price">
									<label>优惠价：<?php echo ($Info['m_price']); ?>元</label>


								</li>




								<li class="stock"><i>[热销中]</i></li>

								<div class="clear"> </div>
							</ul>

							<?php if(($follow) == "false"): ?><input type="button" value="   收 藏   " id="sc-btn" />
								<?php else: ?>
								<input type="button" value="   已收藏   "  /><?php endif; ?>

							<script type="text/javascript">
								$('#sc-btn').click(function() {
					// body...
					var id=<?php echo ($_GET['id']); ?>;
					// alert();
					$.post("<?php echo U('Stu/follow');?>",{good_id:id,status:"true"},
						function(data){
						// body...
						// alert(data.id);
						$('#sc-btn').val('   已收藏   ');
					},'json');
				});


							</script>
							<ul class="product-share">
								<h3>分享</h3>
								<ul>
									<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
									<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
								</ul>
							</ul>


						</div>
					</div>
				</div>
				<div class="clear"> </div>
			</div>
			<div class="details-right">
				<div class="utuan_shopinfo border_grey">
					<h3 class="yahei fw_b">商家信息</h3>
					<ul class="shop_info_list">
						<li><label class="fl">店铺：</label><span class="fl text_hide shop_name"><?php echo ($shopInfo["mall_name"]); ?></span></li>
						<li><label>商品数(件)：</label><?php echo ($count); ?></li>
						<li><label>联系人：</label><?php echo ($shopInfo["contact_name"]); ?></li>
						<li><label>联系电话：</label><?php echo ($shopInfo1["mobile"]); ?></li>
						<li><label class="fl">所在地：</label><span class="text_hide fl shop_info_addr"><?php echo ($shopInfo["address"]); ?></span></li>
					</ul>
					<a class="btn_flat1 btn_shop_add follow_shop" uid="12egl1q" href="<?php echo U('Msg/znx',array('mall_id'=>$shopInfo['mall_id']));?>">站内联系</a>
					<!-- </div> -->
				</div>
				<style type="text/css">
					.utuan_shopinfo{
						text-align: left;
					}
					.utuan_shopinfo h3 {
						height: 45px;
						line-height: 45px;
						background-color: #f8f8f8;
						font-size: 20px;
						color: #333;
						font-weight: bold;
						padding-left: 0px;
					}
					.utuan_shopinfo .shop_info_list {
						padding-left: 15px;
						padding-top: 7px;
					}
					.utuan_shopinfo .shop_info_list li {
						height: 26px;
						line-height: 26px;
						padding-top: 6px;
						color: #666;
					}
					.utuan_shopinfo label {
						color: #999;
					}
					.utuan_shopinfo .shop_info_list li .text_hide {
						color: #666;
					}
					.utuan_shopinfo .shop_name {
						width: 145px;
						color: #666;
					}
				</style>
			</div>
			<div class="clear"> </div>
		</div>
		<!----product-rewies---->
		<div class="product-reviwes">
			<div class="wrap">
				<script src="/pshop/Public/nick/js/easyResponsiveTabs.js" type="text/javascript"></script>
				<script type="text/javascript">
					$(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
									type: 'default', //Types: default, vertical, accordion           
									width: 'auto', //auto or any width like 600px
									fit: true,   // 100% fit in a container
									closed: 'accordion', // Start closed if in accordion view
									activate: function(event) { // Callback function if tab is switched
										var $tab = $(this);
										var $info = $('#tabInfo');
										var $name = $('span', $info);
										$name.text($tab.text());
										$info.show();
									}
								});
						$('#verticalTab').easyResponsiveTabs({
							type: 'vertical',
							width: 'auto',
							fit: true
						});
					});
				</script>

				<div id="verticalTab">
					<ul class="resp-tabs-list">
						<li>商品详情</li>
						<li>商品留言</li>
					</ul>
					<div class="resp-tabs-container vertical-tabs">
						<div>
							<h3> 商品详情</h3>
							<?php echo ($des); ?>
						</div>
						<div>
							<h3>商品留言</h3>
							<table class="table table-condensed ">
								<thead>
									<tr>

										<th width="80%">留言内容</th>
										<th>留言者</th>
									</tr>
								</thead>
								<tbody>
									<?php if(is_array($listMCom)): $i = 0; $__LIST__ = $listMCom;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
											<th scope="row">

												<?php echo ($data["content"]); ?>

											</th>
											<td>
												<?php echo ($data["nickname"]); ?>
											</td>


										</tr><?php endforeach; endif; else: echo "" ;endif; ?>
								</tbody>
							</table>								
							<h4>添加留言:</h4>
							<form method="post" action="<?php echo U('Pro/comment');?>">
								<input type="hidden" value="<?php echo ($_GET['id']); ?>" name="id" class ="id">
								<textarea name="content" id="" cols="50" rows="10" class="vertical-tabs-textarea">
								</textarea>
								<input type="submit" value="添加"/>
							</form>


							<script type="text/javascript">
								$(document).ready(function() {
								    	// body...
								//     	$.post("<?php echo U('Pro/commentAjax');?>",{id:$('.id').val()},function(data){
								//     	   $.each(data,function(i,item){
								//     			  $('.comment-div').append('<td>'+item.nickname+'</td>
								// <td>'+item.content+'</td>');
								//     			});
								//     	},'json');
								//     });
</script>
</div>

</div>
</div>
<div class="clear"> </div>

<div class="similar-products">
	<div class="similar-products-left">
		<h3>相似产品</h3>
		<p>看看本店的其他相似产品</p>
	</div>
	<div class="similar-products-right">
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
		<div id="owl-demo" class="owl-carousel">
			<?php if(is_array($Info2)): $i = 0; $__LIST__ = $Info2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="item" onclick="location.href='<?php echo U('Detail/detail_good',array('id'=>$data['id']));?>';">
					<div class="product-grid fade sproduct-grid">
						<div class="product-pic">
							<a href="<?php echo U('Detail/detail_good',array('id'=>$data['id']));?>">
								<?php  $where['goodid']=$data['id']; $gpic = M('gpic'); $pic = $gpic->where($where)->find(); echo('<img src="'.$pic['url'].'" />'); ?>
							</a>
							<p>

								<span><?php  echo(chinesesubstr($data['title'],0,45)); ?>...</span>
							</p>
						</div>
						<div class="product-info">
							<div class="product-info-cust">
								<a href="<?php echo U('Detail/detail_good',array('id'=>$data['id']));?>">优惠价</a>
							</div>
							<div class="product-info-price">
								<a href="<?php echo U('Detail/detail_good',array('id'=>$data['id']));?>"><?php echo ($data["m_price"]); ?>元</a>
							</div>
							<div class="clear"> </div>
						</div>
						<div class="more-product-info">
							<span> </span>
						</div>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>

	</div>
	<div class="clear"> </div>
</div>

</div>
</div>
<div class="clear"> </div>

</div>
</div>
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