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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">提现管理</strong> / <small>资金变化列表</small></div>
    </div>

    <div class="am-g">
      
      
      <div class="am-u-sm-12 am-u-md-3">
      </div>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th><th class="table-title">教师</th><th class="table-type">操作金额</th><th class="table-author am-hide-sm-only">描述</th><th class="table-date am-hide-sm-only">操作时间</th><th class="table-date am-hide-sm-only">操作后安全账</th><th class="table-date am-hide-sm-only">操作后提现账</th><th class="table-set">操作人</th><th class="table-date am-hide-sm-only">操作ip</th>
              </tr>
          </thead>
          <tbody>
          <?php 
          	foreach ($operation as $o){
          ?>
            <tr >
              <td><input type="checkbox" /></td>
              <td><?php echo $o['id'];?></td>
              <td>
              	<a href="#"><?php echo $o['name'];?></a>
              	<img src="<?php echo __ROOT__?>/Uploads/<?php echo $o['pic']?>" alt="" class="am-comment-avatar" width="48" height="48">
              </td>
              <td class="am-hide-sm-only"><?php echo $o['price'];?></td>
              <td class="am-hide-sm-only"><?php echo $o['description'];?></td>
              <td class="am-hide-sm-only"><?php echo $o['create_time'];?></td>
              <td class="am-hide-sm-only"><?php echo $o['virtual_account'];?></td>
              <td class="am-hide-sm-only"><?php echo $o['account'];?></td>
              <td class="am-hide-sm-only"><?php echo $o['operators'];?></td>
              <td class="am-hide-sm-only"><?php  if(empty($o['opt_ip'])){echo "0.0.0.0";}else{echo $o['opt_ip'];}?></td>
            </tr>
           <?php }?>
          </tbody>
        </table>
          <div class="am-cf">
  			共 <?php echo count($operation);?> 条记录
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
	$("button#edit").click(function(){
			var res=confirm('注意注意 这是我们最后的底线！');
			if(res){
				var wid=$(this).attr('data-id');
				var tid=$(this).attr('data-tid');
				window.location.href="<?php echo U('Balance/dealWith');?>?wid="+wid+"&tid="+tid;
			}
		});
	$("button#touch").click(function(){
		var tel=$(this).attr('data-id');
		window.location.href="<?php echo U('Teacher/touchTeacher');?>?tel="+tel;
	});
</script>
</body>
</html>
