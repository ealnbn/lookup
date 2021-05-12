<!doctype html>
<html class="no-js">
<?php include dirname(__FILE__).'/../head.php';?>
<body>
	<!--[if lte IE 9]>
	<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->
	<script
		src="<?php echo __ROOT__?>/Public/echarts/asset/js/echarts-all.js"></script>
<?php include dirname(__FILE__).'/../header.php';?>

<div class="am-cf admin-main">
		<!-- sidebar start -->
 	<?php include dirname(__FILE__).'/../sidebar.php';?>
  <!-- sidebar end -->

		<!-- content start -->
		<div class="admin-content">

			<div class="am-cf am-padding">
				<div class="am-fl am-cf">
					<strong class="am-text-primary am-text-lg">首页</strong> / <small>一些常用模块</small>
				</div>
			</div>

			

		</div>
		<!-- content end -->

	</div>

	<a href="#" class="am-show-sm-only admin-menu"
		data-am-offcanvas="{target: '#admin-offcanvas'}"> <span
		class="am-icon-btn am-icon-th-list"></span>
	</a>

	<footer>
		<hr>
		<p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT
			license.</p>
	</footer>



<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="<?php echo __ROOT__?>/Public/amaze/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

	<!--[if (gte IE 9)|!(IE)]><!-->
	<script
		src="<?php echo __ROOT__?>/Public/amaze/assets/js/jquery.min.js"></script>
	<!--<![endif]-->
	<script
		src="<?php echo __ROOT__?>/Public/amaze/assets/js/amazeui.min.js"></script>
	<script src="<?php echo __ROOT__?>/Public/amaze/assets/js/app.js"></script>
	
</body>
</html>
