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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">统计管理</strong> / <small>平台服务费</small></div>
    </div>

    <div class="am-g">
      
      <div class="am-u-sm-8 am-u-md-8">
				 
			<div class="am-u-sm-6">
				<span class="am-badge am-badge-success am-text-lg">服务费收入:<?php echo $data['money']?>元</span>
			</div>
			<div class="am-u-sm-6">
    				<span class="am-badge am-badge-warning am-text-lg">当前比例:<?php echo $data['ratio']?>%</span>
			</div>
					
	  </div>
    </div>
    <br>
    <div class="am-g">
    		<div class="am-u-sm-12">
	  		<form id="ratioForm" action="<?php echo U('Statistics/changeRatio')?>"  method="post">
				<div class="am-form-group">
			      <label for="ratio">设置比率:</label>
			      <input type="text" id="ratio" name="ratio" placeholder="设置比率1-99">
			      <button type="button" id="touch" class="am-btn am-btn-primary">提交</button>
			    </div>
			</form>
		</div>
	  </div>
	<br>
    <div class="am-g">
      <div class="am-u-sm-12">
      	<label>距离我们的目标1亿：</label>
       	<div class="am-progress">
				<div class="am-progress-bar" style="width: 10%">10%</div>
		</div>
      </div>

    </div>
    
    <div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th><th class="table-title">收入来源</th><th class="table-type">收入金额</th><th class="table-author am-hide-sm-only">时间</th>
              </tr>
          </thead>
          <tbody>
          <?php 
          	foreach ($record as $r){
          ?>
            <tr id="<?php $r['id']?>">
              <td><input type="checkbox" /></td>
              <td><?php echo $r['id'];?></td>
              <?php if($r['status']==2){?>
              <td>
              	教师账户
              </td>
              <?php }else{?>
              <td>
              	分成推广
              </td>
              <?php }?>
              <td><?php echo $r['real_money']?>
			</td>
              <td class="am-hide-sm-only"><?php echo $r['create_time'];?></td>
            </tr>
           <?php }?>
          </tbody>
        </table>
          <div class="am-cf">
  			共 <?php echo count($record);?> 条记录
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
	function isInteger(x) {
	    return x % 1 === 0;
	}
	$("button#touch").click(function(){
		var ratio=$("#ratio").val();
		if(!isInteger(ratio) || ratio>99 || ratio<1){
			alert("输入参数有误");
		}else{
			var type="<?php $user=cookie('user');echo $user['id'];?>";
			if(type!=3){
				 if(confirm("检测到您无操作权限（建议取消）,继续么？"))
				 {
					 $("#ratioForm").submit();return;
				 }
			}else{
				$("#ratioForm").submit();
			}
		}
		
		
	});
</script>
<script>
  
</script>
</body>
</html>
