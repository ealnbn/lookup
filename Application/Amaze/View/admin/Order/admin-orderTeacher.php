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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">教师管理</strong> / <small>教师订单</small></div>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12 am-u-md-6">
        <div class="am-btn-toolbar">
          <div class="am-btn-group am-btn-group-xs">
            <button type="button" onclick="readyToPay()" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 待支付</button>
            <button type="button" onclick="payed()" class="am-btn am-btn-default" ><span class="am-icon-save"></span> 已支付</button>
            <button type="button" onclick="expire()" class="am-btn am-btn-default" ><span class="am-icon-archive"></span> 过期</button>
            <button type="button" onclick="deleted()" class="am-btn am-btn-default" ><span class="am-icon-trash-o"></span> 已删除</button>
          </div>
          <div class="am-u-sm-4">
				<span class="am-badge am-badge-success am-text-lg">总成交量:<?php echo $total_sum?>元</span>
			</div>
        </div>
      </div>

    <div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th><th class="table-title">教师姓名</th><th class="table-type">课程名字</th><th class="table-author am-hide-sm-only">金额</th><th class="table-author am-hide-sm-only">数量</th><th class="table-author am-hide-sm-only">学生</th>
                <th class="table-author am-hide-sm-only">日期</th><th class="table-author am-hide-sm-only">状态</th>
              </tr>
          </thead>
          <tbody>
          <?php
          	foreach ($data as $d){
          ?>
            <tr>
              <td><input type="checkbox" /></td>
              <td><?php echo $d['order_sn']?></td>
              <td>
              	<a href="#"><?php echo $d['t_name'];?></a>
              	<img src="<?php echo __ROOT__?>/Uploads/<?php echo $d['t_pic']?>" alt="" class="am-comment-avatar" width="48" height="48">
              </td>
              <td class="am-hide-sm-only"><?php echo $d['lesson_name'];?></td>
              <td class="am-hide-sm-only"><?php echo $d['total_amount'];?></td>
              <td class="am-hide-sm-only"><?php echo $d['num'];?></td>
              <td>
              	<a href="#"><?php echo $d['s_name'];?></a>
              	<img src="<?php echo $d['s_pic']?>" alt="" class="am-comment-avatar" width="48" height="48">
              </td>
              <td class="am-hide-sm-only"><?php echo $d['create_time'];?></td>
              <td class="am-hide-sm-only">
              	<?php
              		if($d['status']==0){
              			echo "待支付";
              		}else if($d['status']==1){
              			if($d['virtual']==1){
              				echo "已支付-完成确认付款";
              			}else{
              				echo "已支付-未确认付款";
              			}
              		}else if($d['status']==2){
              			echo "过期未支付";
              		}else if($d['status']==3){
              			echo "已删除";
              		}else{
              			echo "异常";
              		}
          		?>
          	</td>
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
	function readyToPay(){
			window.location.href="<?php echo U('Order/listTeacherOrder');?>?flag=0&tid=<?php echo $tid?>";
		}
	function payed(){
		window.location.href="<?php echo U('Order/listTeacherOrder');?>?flag=1&tid=<?php echo $tid?>";
	}
	function expire(){
		window.location.href="<?php echo U('Order/listTeacherOrder');?>?flag=2&tid=<?php echo $tid?>";
	}
	function deleted(){
		window.location.href="<?php echo U('Order/listTeacherOrder');?>?flag=3&tid=<?php echo $tid?>";
	}

</script>
</body>
</html>
