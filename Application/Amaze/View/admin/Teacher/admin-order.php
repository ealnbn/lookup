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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">教师管理</strong> / <small>教师列表</small></div>
    </div>

      
   

    <div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th><th class="table-title">教师姓名</th><th class="table-type">状态</th><th class="table-author am-hide-sm-only">安全余额</th><th class="table-author am-hide-sm-only">可提现余额</th><th class="table-author am-hide-sm-only">排序</th><th class="table-set">操作</th>
              </tr>
          </thead>
          <tbody>
          <?php 
          	foreach ($teacher as $t){
          ?>
            <tr id="<?php $t['id']?>">
              <td><input type="checkbox" /></td>
              <td><?php echo $t['id'];?></td>
              <td>
              	<a href="#"><?php echo $t['name'];?></a>
              	<img src="<?php echo __ROOT__?>/Uploads/<?php echo $t['pic']?>" alt="" class="am-comment-avatar" width="48" height="48">
              </td>
              <td><?php 
              		if($t['status']==1){
              			echo '正常';
              		}else if($t['status']==0){
              			echo '未激活';
					}else{
						echo '异常';
					}?>
			</td>
              <td class="am-hide-sm-only"><?php echo $t['virtual_balance'];?></td>
              <td class="am-hide-sm-only"><?php echo $t['balance'];?></td>
              <td class="am-hide-sm-only"><?php echo $t['order_flag'];?></td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <button type="button" data-id="<?php echo $t['id']?>" id="order" class="am-btn am-btn-default am-btn-xs am-text-secondary" ><span class="am-icon-pencil-square-o"></span> Ta的订单</button>
                  </div>
                </div>
              </td>
            </tr>
           <?php }?>
          </tbody>
        </table>
          <div class="am-cf">
  			共 <?php echo count($teacher);?> 条记录
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
	$("button#order").click(function(){
			var tid=$(this).attr('data-id');
			window.location.href="<?php echo U('Order/listTeacherOrder');?>?tid="+tid;
		});
</script>
</body>
</html>
