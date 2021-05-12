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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">积分商品管理</strong> / <small>新增商品</small></div>
    </div>

    <hr/>

    <div class="am-g">
	<form class="am-form am-form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo U('Score/addScoreProduct')?>">
      <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
        <div class="am-panel am-panel-default">
          <div class="am-panel-bd">
            <div class="am-g">
              <div class="am-u-md-4">
                <img class="am-img-circle am-img-thumbnail" id="prew" src="<?php echo __ROOT__?>/Public/amaze/assets/img/512.png" alt="" name="prew"/>
              </div>
              <div class="am-u-md-8">
                <p>你好，请上传商品列表页图片300*300，这样显得更牛逼！！！ </p>
                  <div class="am-form-group">
                    <input type="file" id="pic" name="pic">
                    <p class="am-form-help">请选择要上传的文件...</p>
                  </div>
              </div>
            </div>

            <div class="am-g">
              <div class="am-u-md-4">
                <img class="am-img-circle am-img-thumbnail" id="prew_detail" src="<?php echo __ROOT__?>/Public/amaze/assets/img/512.png" alt="" name="prew"/>
              </div>
              <div class="am-u-md-8">
                <p>你好，请上传商品详情页图片600*210，这样显得更牛逼！！！ </p>
                  <div class="am-form-group">
                    <input type="file" id="pic_detail" name="pic_detail">
                    <p class="am-form-help">请选择要上传的文件...</p>
                  </div>
              </div>
            </div>
          </div>
        </div>

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
            <label for="name" class="am-u-sm-3 am-form-label">商品名称</label>
            <div class="am-u-sm-5 am-u-end">
              <input type="text" id="name"  name="name" placeholder="商品名称" >
              <small>老王说：商品名称很重的！！</small>
            </div>
          </div>


          <div class="am-form-group">
            <label for="is_marketable" class="am-u-sm-3 am-form-label">是否上架</label>
            <div class="am-u-sm-9">
	            <div class="am-btn-group" data-am-button>
	              <label class="am-btn am-btn-default am-btn-xs">
	                <input type="radio" name="is_marketable" value="0" id="is_marketable1"> 不上架
	              </label>
	              <label class="am-btn am-btn-default am-btn-xs">
	                <input type="radio" name="is_marketable" value="1" id="is_marketable2"> 上架
	              </label>
	          </div>
	          <small>&nbsp;&nbsp;我默认是不会让上架的哦</small>
            </div>
          </div>
		
        <div class="am-form-group" id="score" >
            <label for="score" class="am-u-sm-3 am-form-label">价格</label>
            <div class="am-u-sm-6 am-u-end">
              <input type="text" id="score"  name="score" placeholder="消耗积分">
            </div>
         </div>

	
		    <div class="am-form-group" id="max_num" >
            <label for="max_num" class="am-u-sm-3 am-form-label">库存</label>
            <div class="am-u-sm-6 am-u-end">
              <input type="text" id="max_num"  name="max_num" placeholder="商品个数">
            </div>
         </div>
         
          
          <div class="am-form-group">
            <label for="order_flag" class="am-u-sm-3 am-form-label">排序</label>
            <div class="am-u-sm-6 am-u-end">
              <input type="text" id="order_flag"  value="1" name="order_flag" placeholder="排序" >
              <small>你要不知道这是干啥的就不要瞎改这个 默认1</small>
            </div>
          </div>
          
          <div class="am-form-group">
              <label for="expire_time" class="am-u-sm-3 am-form-label">过期时间</label>
               <div class="am-u-sm-9 ">
                <div class="am-g">
                  <div class="am-u-sm-6">
                    <input type="text" class="am-form-field" name="expire_time" placeholder="日历组件" data-am-datepicker="{theme: 'success'}" readonly/>
                    <span >如果商品不自动下架 可以不填</span>
                  </div>
                </div>
              </div> 
            
            </div>

          <div class="am-form-group">
            <label for="description" class="am-u-sm-3 am-form-label">商品描述</label>
            <div class="am-u-sm-9">
              <textarea  rows="10" id="description" name="description" placeholder="描述" style="width:700px;height:300px;"></textarea>
              <small>请输入普通文本信息...</small>
            </div>
          </div>

		      <div class="am-form-group">
            <label for="notice" class="am-u-sm-3 am-form-label">注意事项</label>
            <div class="am-u-sm-9">
              <textarea  rows="10" id="notice" name="notice" placeholder="注意事项" style="width:700px;height:300px;"></textarea>
              <small>请输入普通文本信息...</small>
            </div>
          </div>	
		
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
	$(function(){
	  $("#belong1").change(function(){
	  	$("#institutionDiv").show();
	  });
	  $("#belong2").change(function(){
	    $("#institutionDiv").hide();
	   });
	});
	
	document.querySelector('#pic').addEventListener('change', function(){
	    var reader = new FileReader();
	    reader.onload = function(e) {
	        document.querySelector('#prew').src = e.target.result;
	    }
	    reader.readAsDataURL(this.files[0]);
	});

  document.querySelector('#pic_detail').addEventListener('change', function(){
      var reader = new FileReader();
      reader.onload = function(e) {
          document.querySelector('#prew_detail').src = e.target.result;
      }
      reader.readAsDataURL(this.files[0]);
  });
	
</script>
<script>
  // 

</script>
</body>
</html>
