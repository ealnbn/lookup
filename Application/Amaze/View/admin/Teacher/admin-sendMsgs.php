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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">教师管理</strong> / <small>发送短信</small></div>
    </div>

    <hr/>

    <div class="am-g">
	<form class="am-form am-form-horizontal"  method="post" enctype="multipart/form-data" >
      <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">

<!--         <div class="am-panel am-panel-default"> -->
<!--           <div class="am-panel-bd"> -->
<!--             <div class="user-info"> -->
<!--               <p>等级信息</p> -->
<!--               <div class="am-progress am-progress-sm"> -->
                <div class="am-progress-bar" style="width: 60%"></div>
<!--               </div> -->
<!--               <p class="user-info-order">当前等级：<strong>LV8</strong> 活跃天数：<strong>587</strong> 距离下一级别：<strong>160</strong></p> -->
<!--             </div> -->
<!--             <div class="user-info"> -->
<!--               <p>信用信息</p> -->
<!--               <div class="am-progress am-progress-sm"> -->
                <div class="am-progress-bar am-progress-bar-success" style="width: 80%"></div>
<!--               </div> -->
<!--               <p class="user-info-order">信用等级：正常当前 信用积分：<strong>80</strong></p> -->
<!--             </div> -->
<!--           </div> -->
<!--         </div> -->

      </div>
      <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
          <div class="am-form-group">
            <label for="msg" class="am-u-sm-2 am-form-label">发送短信</label>
            <div class="am-u-sm-3 am-u-end">
              <textarea  rows="10" id="msg" name="msg"  style="width:570px;height:120px;"></textarea>
            </div>
          </div>
		
          <div class="am-form-group">
            <div class="am-u-sm-9 am-u-sm-push-3">
              <button type="button" id="send" class="am-btn am-btn-primary">发送短信</button>
            </div>
          </div>
      </div>
      </form>
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
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="<?php echo __ROOT__?>/Public/amaze/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="<?php echo __ROOT__?>/Public/amaze/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="<?php echo __ROOT__?>/Public/amaze/assets/js/amazeui.min.js"></script>

<script src="<?php echo __ROOT__?>/Public/amaze/assets/js/app.js"></script>
<script charset="utf-8" src="<?php echo __ROOT__?>/Public/amaze/editor/kindeditor.js"></script>
<script charset="utf-8" src="<?php echo __ROOT__?>/Public/amaze/editor/lang/zh_CN.js"></script>
<script >
$("button#send").click(function(){
	var res=confirm('请核对好信息无误！确认发送么');
	if(res){
		var msg=$("#msg").val();
		window.location.href="<?php echo U('Teacher/sendMsgs');?>?msg="+msg;
	}
});

</script>
</body>
</html>
