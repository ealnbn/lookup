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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">课程管理</strong> / <small>待审核课程列表</small></div>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12 am-u-md-6">
        <div class="am-btn-toolbar">
          <div class="am-btn-group am-btn-group-xs">
            <button type="button" class="am-btn am-btn-default" disabled><span class="am-icon-trash-o"></span> 删除</button>
          </div>
        </div>
      </div>
      <div class="am-u-sm-12 am-u-md-3">
      </div>
      <div class="am-u-sm-12 am-u-md-3">
        <div class="am-input-group am-input-group-sm">
          <input type="text" class="am-form-field">
          <span class="am-input-group-btn">
            <button class="am-btn am-btn-default" type="button">搜索</button>
          </span>
        </div>
      </div>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th><th class="table-author am-hide-sm-only">教师</th><th class="table-title">课程名字</th><th class="table-type">课程价格</th><th class="table-type">课程类型</th><th class="table-author am-hide-sm-only">创建时间</th><th class="table-date am-hide-sm-only">课程描述</th><th class="table-set">操作</th>
              </tr>
          </thead>
          <tbody>
          <?php 
          	foreach ($lesson as $l){
          ?>
            <tr>
              <td><input type="checkbox" /></td>
              <td><?php echo $l['id'];?></td>
              <td>
              	<a href="#"><?php echo $l['t_name'];?></a>
              	<img src="<?php echo __ROOT__?>/Uploads/<?php echo $l['pic']?>" alt="" class="am-comment-avatar" width="48" height="48">
              </td>
              <td>
              	<a href="#"><?php echo $l['name'];?></a>
              </td>
              <td class="am-hide-sm-only"><?php echo $l['price'];?></td>
              <td><?php 
              		if($l['size']==0){
              			echo '班课';
              		}else if($l['size']==1){
              			echo '组课';
					}else{
						echo '一对一';
					}?>
			</td>
			<td><?php 
              		if($l['type']==1){
              			echo '按每期';
              		}else if($l['type']==2){
              			echo '按每次';
					}else{
						echo '按全程';
					}?>
			</td>
              <td class="am-hide-sm-only"><?php echo $l['create_time'];?></td>
              <td class="am-hide-sm-only"><?php echo $l['description'];?></td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <button type="button" data-id="<?php echo $l['id']?>"  data-size="<?php echo $l['size']?>" id="edit" class="am-btn am-btn-default am-btn-xs am-text-secondary" ><span class="am-icon-pencil-square-o"></span> 详情</button>
                    <button type="button" data-id="<?php echo $l['id']?>"  data-size="<?php echo $l['size']?>" id="pass" class="am-btn am-btn-default am-btn-xs am-text-secondary" ><span class="am-icon-pencil-square-o"></span> 通过</button>
                    <button type="button" data-id="<?php echo $l['id']?>"  data-size="<?php echo $l['size']?>" id="deny" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o">未通过</span></button>
                  </div>
                </div>
              </td>
            </tr>
           <?php }?>
          </tbody>
        </table>
          <div class="am-cf">
  			共 <?php echo count($lesson);?> 条记录
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
			var lid=$(this).attr('data-id');
			var size=$(this).attr('data-size');
			if(size==2){
				alert('一对一课程详情查看暂未开放');return;
			}
			window.location.href="<?php echo U('Lesson/toDetail');?>?lid="+lid;
		});
	$("button#pass").click(function(){
		var lid=$(this).attr('data-id');
		window.location.href="<?php echo U('Lesson/passLesson');?>?lid="+lid;
	});
	$("button#deny").click(function(){
		var lid=$(this).attr('data-id');
		window.location.href="<?php echo U('Lesson/denyLesson');?>?lid="+lid;
//			$.post('',{flag:2,lid:lid},function(data){
// 				if('success' == data.STATUS){
// 					 totalCount = data.RESULT.pageCount;
// 					 data = data.RESULT.row;
// 					//设置支付事件
// 			},'json');						
//		}
	});
</script>
</body>
</html>
