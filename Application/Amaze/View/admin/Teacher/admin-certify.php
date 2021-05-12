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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">教师管理</strong> / <small>认证审核</small></div>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12 am-u-md-6">
        <div class="am-btn-toolbar">
          <div class="am-btn-group am-btn-group-xs">
            <button type="button" id="toCertifyEdu" data-id="1" class="am-btn am-btn-default"><span class="am-icon-plus"></span>学历认证</button>
            <button type="button" id="toCertifyIde" data-id="2" class="am-btn am-btn-default"><span class="am-icon-save"></span>身份认证</button>
            <button type="button" id="toCertifyTeacher" data-id="3" class="am-btn am-btn-default"><span class="am-icon-archive"></span>教师资格认证</button>
          </div>
        </div>
      </div>
      
    </div>

    <div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th><th class="table-title">教师姓名</th><th class="table-type">类别</th><th class="table-author am-hide-sm-only">状态</th><th class="table-author am-hide-sm-only">时间</th><th class="table-author am-hide-sm-only">正面</th><th class="table-author am-hide-sm-only">反面</th><th class="table-set">操作</th>
              </tr>
          </thead>
          <tbody>
          <?php 
          	foreach ($certifys as $c){
          ?>
            <tr id="certifyid">
              <td><input type="checkbox" /></td>
              <td><?php echo $c['id'];?></td>
              <td>
              	<a href="#"><?php echo $c['t_name'];?></a>
              	<img src="<?php echo __ROOT__?>/Uploads/<?php echo $c['pic']?>" alt="" class="am-comment-avatar" width="48" height="48">
              </td>
              <td>
              		<?php 
              		if($c['c_type']==1){
              			echo '学历认证';
              		}else if($c['c_type']==2){
              			echo '身份认证';
					}else if($c['c_type']==3){
						echo '教师资格认证';
					}?>
					
			</td>
              <td class="am-hide-sm-only">
              		<?php 
              		if($c['status']==0){
              			echo '待审核';
              		}else if($c['status']==1){
              			echo '通过';
					}else if($c['status']==2){
						echo '未通过';
					}?>
              </td>
              <td class="am-hide-sm-only"><?php echo $c['create_time'];?></td>
              <td class="am-hide-sm-only"><a id="lookpic" title="" href="<?php echo __ROOT__?>/Uploads/<?php echo $c['c_name']?>"><img alt="" src="<?php echo __ROOT__?>/Uploads/<?php echo $c['c_name']?>" style="width: 35px;"/></a>
              <td class="am-hide-sm-only"><a id="lookpic" title="" href="<?php echo __ROOT__?>/Uploads/<?php echo $c['name_back']?>"><img alt="" src="<?php echo __ROOT__?>/Uploads/<?php echo $c['name_back']?>" style="width: 35px;"/></a>
  			</td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <button type="button" data-id="<?php echo $c['id']?>" id="pass" class="am-btn am-btn-default am-btn-xs am-text-secondary" ><span class="am-icon-pencil-square-o"></span>通过</button>
                    <button type="button" data-id="<?php echo $c['id']?>" id="deny" class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span class="am-icon-copy"></span>拒绝</button>
                  </div>
                </div>
              </td>
            </tr>
           <?php }?>
          </tbody>
        </table>
          <div class="am-cf">
  			共 <?php echo count($certifys);?> 条记录
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

<div class="am-modal am-modal-prompt" tabindex="-1" id="my-prompt">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">认证管理</div>
    <div class="am-modal-bd">
      认证填写拒绝理由
      <input type="text" class="am-modal-prompt-input">
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn" data-am-modal-confirm>提交</span>
    </div>
  </div>
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
// 		$(document).ready(function() {
// 			$("#example1-1").imgbox();

// 			$("#example1-2").imgbox({
// 			    'zoomOpacity'	: true,
// 				'alignment'		: 'center'
// 			});

// 			$("#example1-3").imgbox({
// 				'speedIn'		: 0,
// 				'speedOut'		: 0
// 			});
// 			$("#lookpic").imgbox({
// 				'speedIn'		: 0,
// 				'speedOut'		: 0,
// 				'alignment'		: 'center',
// 				'overlayShow'	: true,
// 				'allowMultiple'	: false
// 			});
// 		});
</script>

<script type="text/javascript">
	$("button#toCertifyEdu").click(function(){
			var flag=$(this).attr('data-id');
			window.location.href="<?php echo U('Teacher/listCertifys')?>?flag="+flag;
		});
	$("button#toCertifyIde").click(function(){
		var flag=$(this).attr('data-id');
		window.location.href="<?php echo U('Teacher/listCertifys')?>?flag="+flag;
	});

	$("button#toCertifyTeacher").click(function(){
		var flag=$(this).attr('data-id');
		window.location.href="<?php echo U('Teacher/listCertifys')?>?flag="+flag;
	});
	
	$("button#pass").click(function(){
			var cid=$(this).attr('data-id');
			window.location.href="<?php echo U('Teacher/passCertify');?>?cid="+cid;
		});

	
	  $('button#deny').on('click', function() {
	    $('#my-prompt').modal({
	      relatedTarget: this,
	      onConfirm: function(e) {
	    	  	  var cid=$('#deny').attr('data-id');
	    	  	  var msg = e.data;
	  		  window.location.href="<?php echo U('Teacher/denyCertify');?>?cid="+cid+"&msg="+msg;
	      },
	      onCancel: function(e) {
	        alert('不想说!');
	      }
	    });
	  });
</script>
</body>
</html>
