<!doctype html>
<html class="no-js">
<?php include dirname(__FILE__).'/../head.php';?>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<?php include dirname(__FILE__).'/../header.php';?>

<div class="am-cf admin-main">
  <!-- sidebar start -->
 	<?php include dirname(__FILE__).'/../sidebar.php';?>
  <!-- sidebar end -->

		<!-- content start -->
		<div class="admin-content">
			<div class="am-cf am-padding">
				<div class="am-fl am-cf">
					<strong class="am-text-primary am-text-lg">教师管理</strong> / <small>新增课程</small>
				</div>
			</div>

			<hr />

			<div class="am-g">
				<form id="lessonForm" class="am-form am-form-horizontal" method="post" enctype="multipart/form-data"
					action="<?php echo U('Lesson/addLesson')?>">
					<div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
						<div class="am-panel am-panel-default">
							<div class="am-panel-bd">
								<div class="am-g">
									<div class="am-u-md-4">
										<img class="am-img-circle am-img-thumbnail" id="prew"
											src="<?php echo __ROOT__?>/Public/amaze/assets/img/512.png"
											alt="" name="prew" />
									</div>
								</div>
							</div>
						</div>

					</div>
					<input id="start_time" name="start_time" style="display:none">
					<input id="end_time" name="end_time" style="display:none">
					<input name="tid" value="<?php echo $tid?>" style="display:none">
					<div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
						<div class="am-form-group">
							<label for="name" class="am-u-sm-3 am-form-label">课程名字</label>
							<div class="am-u-sm-5 am-u-end">
								<input type="text" id="name" name="name" placeholder="课程名字">
							</div>
						</div>

						<div class="am-form-group">
							<label for="size" class="am-u-sm-3 am-form-label">班型</label>
							<div class="am-u-sm-9">
								<div class="am-btn-group" data-am-button>
									<label class="am-btn am-btn-default am-btn-xs"> <input
										type="radio" name="size" value="0" id="size1">班课
									</label> <label class="am-btn am-btn-default am-btn-xs"> <input
										type="radio" name="size" value="1" id="size2">组课
									</label> <label class="am-btn am-btn-default am-btn-xs"> <input
										type="radio" name="size" value="2" id="size3" />一对一
									</label>
								</div>
								<small>&nbsp;&nbsp;一对一即是按次上,其他为按期上<small>
							
							</div>
						</div>

						<div class="am-form-group" id="countDiv" style="display: none;">
							<label for="max_count" class="am-u-sm-3 am-form-label">最大上课人数</label>
							<div class="am-u-sm-3 am-u-end">
								<input type="text" id="max_count" name="max_count" value=0
									placeholder="机构名称">
							</div>
							<small>&nbsp;&nbsp;预计报多少学生<small>
						
						</div>


						<div class="am-form-group">
							<label for="price" class="am-u-sm-3 am-form-label">价格</label>
							<div class="am-u-sm-3 am-u-end">
								<input type="text" id="price" name="price" placeholder="价格"> <small>填写数字,单位为元</small>
							</div>
						</div>

						<div class="am-form-group">
							<label for="address" class="am-u-sm-3 am-form-label">上课地点</label>
							<div class="am-u-sm-8 am-u-end">
								<input type="text" id="address" name="address"
									placeholder="上课地点"> <small>详细的上课地点</small>
							</div>
						</div>

						<div class="am-form-group">
							<label for="start_time" class="am-u-sm-3 am-form-label">上课时间</label>
							<div class="am-u-sm-9 ">
								<small>结束日期没有可以填一个很靠后的日期</small>
								<div class="am-alert am-alert-danger" id="my-alert"
									style="display: none">
									<p>开始日期应小于结束日期！</p>
								</div>
								<div class="am-g">
									<div class="am-u-sm-6">
										<button type="button"
											class="am-btn am-btn-default am-margin-right" id="my-start">开始日期</button>
										<span id="my-startDate">开始时间</span>
									</div>
									<div class="am-u-sm-6">
										<button type="button"
											class="am-btn am-btn-default am-margin-right" id="my-end">结束日期</button>
										<span id="my-endDate">若无选择下一年</span>
									</div>
								</div>
							</div>
						</div>
						
						<div class="am-form-group">
						 <div class="am-g">
							<label for="description" class="am-u-sm-3 am-form-label">上课具体时间</label>
							<div class="am-u-sm-3">
								<select id="hour" style="width:100px">
								<?php for($i=1;$i<=24;$i++){
										if($i < 10){
											$i = "0".$i;
										}
									?>
									<option><?php echo $i?></option>
								<?php }?>
								</select>
							</div>
							<label class="am-u-sm-1 am-form-label">时</label>
							<div class="am-u-sm-4">
								<select id="minute" style="width:100px">
								<?php for($i=1;$i<=60;$i++){
										if($i < 10){
											$i = "0".$i;
										}
									?>
									<option><?php echo $i?></option>
								<?php }?>
								</select>
							</div>
							<label class="am-u-sm-1 am-form-label">分</label>
						 </div>
						</div>

						<div class="am-form-group" id="calendarDiv" style="display: none;">
							<label class="am-u-sm-3 am-form-label">一对一日历</label>
							<div class="am-u-sm-9">
								<small>&nbsp;&nbsp; 没有的可以不填<small>
										<ul class="am-avg-sm-4 am-avg-md-4 am-avg-lg-4 am-thumbnails">
											<li><input name="aa" placeholder="周一" type="text"></li>
											<li><input name="ab" placeholder="周一" type="text"></li>
											<li><input name="ac" placeholder="周一" type="text"></li>
											<li><input name="ad" placeholder="周一" type="text"></li>

											<li><input name="ba" placeholder="周二" type="text"></li>
											<li><input name="bb" placeholder="周二" type="text"></li>
											<li><input name="bc" placeholder="周二" type="text"></li>
											<li><input name="bd" placeholder="周二" type="text"></li>

											<li><input name="ca" placeholder="周三" type="text"></li>
											<li><input name="cb" placeholder="周三" type="text"></li>
											<li><input name="cc" placeholder="周三" type="text"></li>
											<li><input name="cd" placeholder="周三" type="text"></li>

											<li><input name="da" placeholder="周四" type="text"></li>
											<li><input name="db" placeholder="周四" type="text"></li>
											<li><input name="dc" placeholder="周四" type="text"></li>
											<li><input name="dd" placeholder="周四" type="text"></li>

											<li><input name="ea" placeholder="周五" type="text"></li>
											<li><input name="eb" placeholder="周五" type="text"></li>
											<li><input name="ec" placeholder="周五" type="text"></li>
											<li><input name="ed" placeholder="周五" type="text"></li>

											<li><input name="fa" placeholder="周六" type="text"></li>
											<li><input name="fb" placeholder="周六" type="text"></li>
											<li><input name="fc" placeholder="周六" type="text"></li>
											<li><input name="fd" placeholder="周六" type="text"></li>

											<li><input name="ga" placeholder="周日" type="text"></li>
											<li><input name="gb" placeholder="周日" type="text"></li>
											<li><input name="gc" placeholder="周日" type="text"></li>
											<li><input name="gd" placeholder="周日" type="text"></li>
										</ul>
							
							</div>
						</div>


						<div class="am-form-group">
							<label for="description" class="am-u-sm-3 am-form-label">课程简介</label>
							<div class="am-u-sm-9">
								<textarea rows="10" id="desc" name="description"
									placeholder="输入课程简介" style="width: 700px; height: 300px;"></textarea>
							</div>
						</div>

						<div class="am-form-group">
							<div class="am-u-sm-9 am-u-sm-push-3">
								<button type="button"  onclick="saveLesson();" class="am-btn am-btn-primary">保存新建</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- content end -->

	</div>

	<a href="#"
		class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu"
		data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

	<footer>
		<hr>
		<p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT
			license.</p>
	</footer>

	<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
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
	<script charset="utf-8"
		src="<?php echo __ROOT__?>/Public/amaze/editor/kindeditor.js"></script>
	<script charset="utf-8"
		src="<?php echo __ROOT__?>/Public/amaze/editor/lang/zh_CN.js"></script>
	<script type="text/javascript">
	$(function(){
	  $("#size1").change(function(){
	  	$("#countDiv").show();
	  	$("#calendarDiv").hide();
	  });
	  $("#size2").change(function(){
		  	$("#countDiv").show();
		  	$("#calendarDiv").hide();
	  });
	  $("#size3").change(function(){
		  	$("#countDiv").hide();
		  	$("#calendarDiv").show();
	   });
	});

	function saveLesson(){
		$("#start_time").val($("#my-startDate").text()+" "+$("#hour").val()+":"+$("#minute").val());
		$("#end_time").val($("#my-endDate").text());
		$("#lessonForm").submit();
	}
	
	
</script>

<script>
  $(function() {
    var startDate = new Date(2014, 11, 20);
    var endDate = new Date(2014, 11, 25);
    var $alert = $('#my-alert');
    $('#my-start').datepicker().
      on('changeDate.datepicker.amui', function(event) {
        if (event.date.valueOf() > endDate.valueOf()) {
          $alert.find('p').text('开始日期应小于结束日期！').end().show();
        } else {
          $alert.hide();
          startDate = new Date(event.date);
          $('#my-startDate').text($('#my-start').data('date'));
        }
        $(this).datepicker('close');
      });

    $('#my-end').datepicker().
      on('changeDate.datepicker.amui', function(event) {
        if (event.date.valueOf() < startDate.valueOf()) {
          $alert.find('p').text('结束日期应大于开始日期！').end().show();
        } else {
          $alert.hide();
          endDate = new Date(event.date);
          $('#my-endDate').text($('#my-end').data('date'));
        }
        $(this).datepicker('close');
      });
  });
</script>
</body>
</html>
