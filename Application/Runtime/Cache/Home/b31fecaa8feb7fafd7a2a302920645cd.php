<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<title>发布商品</title>
	<link href="/puys/Public/nick/css/style.css" rel='stylesheet' type='text/css' />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="[keywords]" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<script src="/puys/Public/nick/js/jquery.min.js"></script>
<script type="text/javascript" src="/puys/Public/nick/js/jquery.easy-ticker.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#demo').hide();
		$('.vticker').easyTicker();
	});
</script>
 <link rel="icon" href="/puys/Public/nick/images/pu.png" type="image/x-icon">
<link href="/puys/Public/nick/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="/puys/Public/nick/js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="/puys/Public/nick/js/menu_jquery.js"></script>
<link rel="stylesheet" href="/puys/Public/nick/css/slippry.css">
<script src="/puys/Public/nick/js/jquery-ui.js" type="text/javascript"></script>
<script src="/puys/Public/nick/js/scripts-f0e4e0c2.js" type="text/javascript"></script>
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
<script type="text/javascript" src="/puys/Public/nick/js/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="/puys/Public/nick/css/jquery-ui.css">
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
		<script type="text/javascript" src="/puys/Public/nick/js/move-top.js"></script>
		<script type="text/javascript" src="/puys/Public/nick/js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
		</script>
		<link href="/puys/Public/nick/css/owl.carousel.css" rel="stylesheet">
		<script src="/puys/Public/nick/js/jquery-1.9.1.min.js"></script> 
		<script src="/puys/Public/nick/js/owl.carousel.js"></script>
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
<script type="text/javascript" charset="utf-8" src="/puys/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/puys/Public/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/puys/Public/ueditor/zh-cn.js"></script>
<form id="form-fb" role="form" method="post" action="<?php echo U('Publish/edit');?>" enctype="multipart/form-data" >
<div class="content details-page">
<!---start-product-details--->
			<div class="product-details">
				<div class="wrap">
					<ul class="product-head">
						<li><a href="<?php echo U(Index/index);?>">首页</a> <span>::</span></li>
						<li class="active-page"><a href="#">发布商品</a></li>
						<div class="clear"> </div>
					</ul>
				<!----details-product-slider--->
				<!-- Include the Etalage files -->



        <link rel="stylesheet" href="/puys/Public/nick/css/etalage.css">
        <script src="/puys/Public/nick/js/jquery.etalage.min.js"></script>
        <!-- Include the Etalage files -->
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
							// This is for the dropdown list example:
							$('.dropdownlist').change(function(){
								etalage_show( $(this).find('option:selected').attr('class') );
							});

						});
       </script>
       <script>


        function readFile(obj,id){ 
          var file = obj.files[0];    
                                //判断类型是不是图片
                                if(!/image\/\w+/.test(file.type)){   
                                  alert("请确保文件为图像类型"); 
                                  return false; 
                                } 
                                var reader = new FileReader(); 
                                reader.readAsDataURL(file); 
                                reader.onload = function(e){ 
                                    // alert(this.result);
                                    // $('.item').removeClass('active');
                                    // $('<div class="item active"><div class="imgshow"><img src="'+this.result+'"></div><i class="glyphicon glyphicon-remove-circle"></i><input type="hidden" name="fmimg[]" value="'+this.result+'"></div>').prependTo('#pub-imgadd');

                                    $('<li class="etalage_thumb thumb_1"><img class="etalage_thumb_image" src="'+this.result+'" /><img class="etalage_source_image" src="'+this.result+'" /><input type="hidden" name="fmimg[]" value="'+this.result+'"></li>').prependTo('.pub-imgadd');




                                    





                                    // var index = $('.carousel-indicators li').last().index()*1+1;
                                    // $('<li data-target="#carousel-example-generic" data-slide-to="'+index+'"></li>').appendTo('.carousel-indicators');
                                    // mc_fmimg_delete();
                                  } 
                                } 


                              </script>
                              <style type="text/css">

                               #picfile {
                                position: absolute;
                                opacity: 0;
                                filter: alpha(opacity=0);
                                display: block;
                                width: 100%;
                                height: 100%;
                                left: 0;
                                top: 0;
                                right: 0;
                                bottom: 0;
                                cursor: pointer;
                                z-index: 1;
                              }


                            </style>


                            



                            <div class="details-left">
                             <div class="details-left-slider">
                              <ul id="etalage" class="pub-imgadd">




                                <li>

                                  <img class="etalage_thumb_image" src="/puys/Public/nick/images/upload.jpg" />
                                  <img class="etalage_source_image" src="/puys/Public/nick/images/upload.jpg" />
                                  <input type="file" id="picfile" onchange="readFile(this,1)" />

                                </li>


                                <li >

                                  <img class="etalage_thumb_image" src="http://localhost/shop/Theme/default/img/upload.jpg" />
                                  <img class="etalage_source_image" src="http://localhost/shop/Theme/default/img/upload.jpg" />
                                  <input type="file" id="picfile" onchange="readFile(this,1)" />

                                </li>


                              </ul>
                            </div>
                            <div class="details-left-info">
                              <div class="details-right-head">
                               <h1>商品标题<input type="text"name="title" placeholder="请填写商品标题"></h1>


                               <h1>商品价格<input name="price" type="text" class="form-control" placeholder="0.00">
                               </h1>

                               <h1>商品类别
                                <select name="gclass" id="">
                                  <?php if(is_array($gclass)): foreach($gclass as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" selected><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                                </select>
                              </h1>

                              <h1>商品库存
                                <input name="kucun" type="text" class="form-control ml-20" placeholder="库存">
                              </h1>

                              
                              <h1>商品关键字
                                <input name="keywords" type="text" class="form-control" placeholder="关键词，多个关键词以逗号隔开（选填）">
                              </h1>



                              <p class="product-detail-info">请勿发布虚假商品信息！ </p>
                              <!-- <a class="learn-more" href="#"><h3>MORE DETAILS</h3></a> -->

                            </div>
                          </div>
                          <div class="clear"> </div>
                        </div>
                         <!-- <div class="details-right">
                           <a href="#">SEE MORE</a>
                         </div> -->

                         <div class="clear"> </div>

                       </div>
            

                       <div class="product-reviwes">
                        <div class="wrap">

    <script>
        // $(function(){
            var ue = UE.getEditor('container',{
                serverUrl :'<?php echo U('Home/Web/ueditor');?>'
            });
        // })
    </script>
                         <script id="container" type="text/plain" name="content" style="height:500px;margin-bottom:20px;width:100%"></script>

                         <div class="loadmore-products">
                           <a href="javascript:fb()"  class="a-fb">发布商品</a>
                         </div>

                         <script type="text/javascript">
                          function fb(){
                            $("#form-fb").submit();
                          }



                        </script>


                      </div>





                    </div>




</div>
</form>

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