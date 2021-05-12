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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">教师管理</strong> / <small>添加教师身份认证</small></div>
    </div>

    <hr/>

    <div class="am-g">
	<form class="am-form am-form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo U('Certify/addCertify')?>">
      <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
        <div class="am-panel am-panel-default">
          <div class="am-panel-bd">
            <div class="am-g">
              <div class="am-u-md-4">
                <img class="am-img-circle am-img-thumbnail" id="prew_head" src="<?php echo __ROOT__?>/Public/amaze/assets/img/512.png" alt="" name="prew_head"/>
              </div>
              <div class="am-u-md-8">
                <p>你好，请上传教师身份证正面 </p>
                  <div class="am-form-group">
                    <input type="file" id="pic_head" name="pic_head">
                    <p class="am-form-help">请选择要上传的文件...</p>
                  </div>
              </div>
            </div>
          </div>
          
         
        </div>
			<div class="am-panel am-panel-default">
				 <div class="am-panel-bd">
	            	<div class="am-g">
	              <div class="am-u-md-4">
	                <img class="am-img-circle am-img-thumbnail" id="prew_back" src="<?php echo __ROOT__?>/Public/amaze/assets/img/512.png" alt="" name="prew_back"/>
	              </div>
	              <div class="am-u-md-8">
	                <p>你好，请上传教师身份证背面 </p>
	                  <div class="am-form-group">
	                    <input type="file" id="pic_back" name="pic_back">
	                    <p class="am-form-help">请选择要上传的文件...</p>
	                  </div>
	              </div>
	            </div>
	            </div>
			</div>
      </div>

      <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
          <div class="am-form-group">
            <label for="name" class="am-u-sm-3 am-form-label">教师id</label>
            <div class="am-u-sm-5 am-u-end">
              <input type="text" id="tid"  name="tid" placeholder="教师id" >
              <small>这个很重要哦~~你可以打开两个窗口，教师列表前的编号就是老师的id啦~~</small>
            </div>
          </div>

<!--           <div class="am-form-group"> -->
<!--             <label for="level" class="am-u-sm-3 am-form-label">教师等级</label> -->
<!--             <div class="am-u-sm-9"> -->
<!-- 	            <div class="am-btn-group" data-am-button> -->
<!-- 	              <label class="am-btn am-btn-default am-btn-xs"> -->
<!-- 	                <input type="radio" name="level" value="1" id="level1"> 教师资格认证 -->
<!-- 	              </label> -->
<!-- 	              <label class="am-btn am-btn-default am-btn-xs"> -->
<!-- 	                <input type="radio" name="level" value="2" id="level2"> 2 -->
<!-- 	              </label> -->
<!-- 	              <label class="am-btn am-btn-default am-btn-xs"> -->
<!-- 	                <input type="radio" name="level" value="3" id="level3" /> 叁 -->
<!-- 	              </label> -->
<!-- 	          </div> -->
<!-- 	          <small>&nbsp;&nbsp;加入评论功能就不用你填啦~ 忍忍吧</small> -->
<!--             </div> -->
<!--           </div> -->
		
          <div class="am-form-group">
            <div class="am-u-sm-9 am-u-sm-push-3">
              <button type="submit" class="am-btn am-btn-primary">保存修改</button>
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
<script type="text/javascript">
	
	document.querySelector('#pic_head').addEventListener('change', function(){
	    var reader1 = new FileReader();
	    reader1.onload = function(e) {
	        document.querySelector('#prew_head').src = e.target.result;
	    }
	    reader1.readAsDataURL(this.files[0]);
	});

	document.querySelector('#pic_back').addEventListener('change', function(){
	    var reader2 = new FileReader();
	    reader2.onload = function(e) {
	        document.querySelector('#prew_back').src = e.target.result;
	    }
	    reader2.readAsDataURL(this.files[0]);
	});
	
</script>

</body>
</html>
