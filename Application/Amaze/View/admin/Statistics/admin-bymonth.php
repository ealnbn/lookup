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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">统计管理</strong> / <small>按月统计</small></div>
    </div>

    <div class="am-g">
      
      
      <div class="am-u-sm-8 am-u-md-8">
				 <form id="dateForm" action="<?php echo U('Statistics/listByMonth')?>"  method="post">
				 	<input id="start_date" name="start_date" style="display: none">
				 	<input id="end_date" name="end_date" style="display: none">
					<div class="am-input-group am-input-group-sm">
						<div class="am-alert am-alert-danger" id="my-alert"
							style="display: none">
							<p>开始日期应小于结束日期！</p>
						</div>
						<div class="am-g">
							<div class="am-u-sm-12">
								<button type="button"
									class="am-btn am-btn-default am-margin-right" id="my-start">开始日期</button>
								<span id="my-startDate"></span>
								<button type="button"
									class="am-btn am-btn-default am-margin-right" id="my-end">结束日期</button>
								<span id="my-endDate"></span>
								<button type="button"  onclick="dateQuery();" class="am-btn am-btn-primary" >查询</button>
							</div>
								
						</div>
						
					</div>
				</form>
					<div class="am-u-sm-6">
						<a href="<?php echo U('Statistics/listByMonth?flag=1')?>" class="am-text-danger"><br/>总收入<br/><?php echo $in_total?></a>
					</div>
					<div class="am-u-sm-6">
	    					<a href="<?php echo U('Statistics/listByMonth?flag=2')?>" class="am-text-danger"><br/>总支出<br/><?php echo $out_total;?></a>
					</div>
				</div>
	
    </div>

    <div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th><th class="table-title">教师</th><th class="table-type">收支</th><th class="table-author am-hide-sm-only">金额</th><th class="table-date am-hide-sm-only">时间</th>
              </tr>
          </thead>
          <tbody>
          <?php 
          	foreach ($data as $d){
          ?>
            <tr >
              <td><input type="checkbox" /></td>
              <td><?php echo $d['id'];?></td>
              <td>
              	<a href="#"><?php echo $d['name'];?></a>
              	<img src="<?php echo __ROOT__?>/Uploads/<?php echo $d['pic']?>" alt="" class="am-comment-avatar" width="48" height="48">
              </td>
              <td><?php 
              		if(empty($d['flag'])){
              			echo '收入';
					}else{
						echo '提现/支出';
					}?>
			  </td>
              <td class="am-hide-sm-only"><?php echo $d['money'];?></td>
              
              <td class="am-hide-sm-only"><?php echo $d['time'];?></td>
            </tr>
           <?php }?>
          </tbody>
        </table>
          <div class="am-cf">
  			共 <?php echo count($data);?> 条记录
<!--   <div class="am-fr"> -->
<!--     <ul class="am-pagination"> -->
<!--       <li class="am-disabled"><a href="#">«</a></li> -->
<!--       <li class="am-active"><a href="#">1</a></li> -->
<!--       <li><a href="#">2</a></li> -->
<!--       <li><a href="#">3</a></li> -->
<!--       <li><a href="#">4</a></li> -->
<!--       <li><a href="#">5</a></li> -->
<!--       <li><a href="#">»</a></li> -->
<!--     </ul> -->
<!--   </div> -->
</div>
          <hr />
          <p>注：.....</p>
        </form>
      </div>

    </div>
  </div>
  <!-- content end -->
</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
  <hr>
  <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="<?php echo __ROOT__?>/Public/amaze/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="<?php echo __ROOT__?>/Public/amaze/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="<?php echo __ROOT__?>/Public/amaze/assets/js/amazeui.min.js"></script>
<script src="<?php echo __ROOT__?>/Public/amaze/assets/js/app.js"></script>
<script type="text/javascript">
	$("button#touch").click(function(){
		var tel=$(this).attr('data-id');
		window.location.href="<?php echo U('Teacher/touchTeacher');?>?tel="+tel;
	});
</script>
<script>
  $(function() {
    var startDate = new Date();
    var endDate = new Date();
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
<script>
	function dateQuery(){
		if($("#my-startDate").text()=="" || $("#my-startDate").text()==null){
				alert('请选择日期');return;
			}
		$("#start_date").val($("#my-startDate").text());
		$("#end_date").val($("#my-endDate").text());
		$("#dateForm").submit();
	}

	
</script>
</body>
</html>
