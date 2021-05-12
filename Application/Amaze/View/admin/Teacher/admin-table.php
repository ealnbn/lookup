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
      <div class="am-u-sm-12 am-u-md-6">
        <div class="am-btn-toolbar">
          <div class="am-btn-group am-btn-group-xs">
            <button type="button" onclick="toAddNew()" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
          </div>
        </div>
      </div>

      <div class="am-u-sm-12 am-u-md-3">
        <div class="am-input-group am-input-group-sm">
          <input type="text" id="searchKey" class="am-form-field">
          <span class="am-input-group-btn">
            <button class="am-btn am-btn-default" id="searchButton" type="button">搜索</button>
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
                <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th><th class="table-title">教师姓名</th><th class="table-author am-hide-sm-only">被赞</th><th class="table-author am-hide-sm-only">被踩</th><th class="table-author am-hide-sm-only">学校</th><th class="table-author am-hide-sm-only">学院</th><th class="table-author am-hide-sm-only">专业</th><th class="table-author am-hide-sm-only">称谓</th><th class="table-author am-hide-sm-only">评论数</th><th class="table-author am-hide-sm-only">创建时间</th><th class="table-set">操作</th>
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
              	<img src="<?php echo __ROOT__?>/<?php echo $t['pic']?>" alt="" class="am-comment-avatar" width="48" height="48">
              </td>
              
              <td class="am-hide-sm-only"><?php echo $t['good'];?></td>
              <td class="am-hide-sm-only"><?php echo $t['bad'];?></td>
              <td class="am-hide-sm-only"><?php echo $t['school_name'];?></td>
              <td class="am-hide-sm-only"><?php echo $t['academy'];?></td>
              <td class="am-hide-sm-only"><?php echo $t['major'];?></td>
              <td class="am-hide-sm-only"><?php echo $t['description'];?></td>
              <td class="am-hide-sm-only"><?php echo $t['comment_num'];?></td>
              <td class="am-hide-sm-only"><?php echo $t['create_time'];?></td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <button type="button" data-id="<?php echo $t['id']?>" id="edit" class="am-btn am-btn-default am-btn-xs am-text-secondary" ><span class="am-icon-pencil-square-o"></span> 编辑</button>
                    <button type="button" data-id="<?php echo $t['id']?>" id="comment" class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span class="am-icon-copy"></span> 评论列表</button>
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
<script src="<?php echo __ROOT__?>/Public/amaze/assets/js/jquery.imgbox.pack.js"></script>
<script type="text/javascript">
	function toAddNew(){
			window.location.href="<?php echo U('Teacher/toAdd');?>";
		}

	$("button#edit").click(function(){
			var tid=$(this).attr('data-id');
			window.location.href="<?php echo U('Teacher/editTeacher');?>?tid="+tid;
		});

	
	$("button#comment").click(function(){
			var tid=$(this).attr('data-id');
			window.location.href="<?php echo U('Teacher/listComment');?>?tid="+tid;
	});
	
	$("button#searchButton").click(function(){
		var key=$("#searchKey").val();
		window.location.href="<?php echo U('Teacher/searchTeacher');?>?key="+key;
	});



	  
</script>


</body>
</html>
