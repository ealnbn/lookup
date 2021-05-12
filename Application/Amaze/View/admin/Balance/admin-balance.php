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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">提现管理</strong> / <small>提现列表</small></div>
    </div>

    <div class="am-g">


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
                <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th><th class="table-title">教师</th><th class="table-title">Tel</th><th class="table-type">提现金额</th><th class="table-author am-hide-sm-only">状态</th><th class="table-date am-hide-sm-only">持卡人姓名</th><th class="table-date am-hide-sm-only">账号</th><th class="table-date am-hide-sm-only">开户行</th><th class="table-date am-hide-sm-only">申请时间</th><th class="table-set">操作</th>
              </tr>
          </thead>
          <tbody>
          <?php
          	foreach ($withdraw as $w){
          ?>
            <tr class="<?php if($w['is_first']<=1){echo 'am-warning';}else{echo $w['is_first'];}?>">
              <td><input type="checkbox" /></td>
              <td><?php echo $w['withdraw_id'];?></td>
              <td>
              	<a href="#"><?php echo $w['name'];?></a>
              	<img src="<?php echo __ROOT__?>/Uploads/<?php echo $w['pic']?>" alt="" class="am-comment-avatar" width="48" height="48">
              </td>
              <td class="am-hide-sm-only"><?php echo $w['tel'];?></td>
              <td class="am-hide-sm-only"><?php echo $w['money'];?></td>
              <td><?php
              		if($w['status']==1){
              			echo '已处理';
              		}else if($w['status']==0){
              			echo '未处理';
					}else{
						echo '异常';
					}?>
			</td>
			  <td class="am-hide-sm-only"><?php echo $w['holder_name'];?></td>
              <td class="am-hide-sm-only"><?php echo $w['card_num'];?></td>
               <td class="am-hide-sm-only"><?php echo $w['bank_name']."-".$w['bank_detail'];?></td>
               <td class="am-hide-sm-only"><?php echo $w['create_time'];?></td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <button type="button" data-id="<?php echo $w['withdraw_id']?>" data-tid="<?php echo $w['id']?>" id="edit" data-am-popover="{content: '短信将会自动发送，如发送失败请手工发送！', trigger: 'hover focus'}" class="am-btn am-btn-default am-btn-xs am-text-secondary" <?php if($w['status']!=0){echo "disabled";}?> >
                    		<span class="am-icon-pencil-square-o">
                    		<?php
                    			if($w['status']==0){
                    				echo "完成转账";
                    			}else {
                    				echo "不可操作";
                    			}
                    		?>
                    		</span>
                    </button>
                    <button type="button" data-id="<?php echo $w['tel']?>"  id="touch" class="am-btn am-btn-default am-btn-xs am-text-secondary" ><span class="am-icon-pencil-square-o"></span>联系Ta</button>
                  	<button type="button" data-id="<?php echo $w['withdraw_id']?>"  id="fire" class="am-btn am-btn-default am-btn-xs am-text-secondary" ><span class="am-icon-pencil-square-o"></span>作废</button>
                  </div>
                </div>
              </td>
            </tr>
           <?php }?>
          </tbody>
        </table>
          <div class="am-cf">
  			共 <?php echo count($withdraw);?> 条记录
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
	$("button#fire").click(function(){
		var res=confirm('作废意味着该笔费用已转入公司账户或者就是看着不爽');
		if(res){
			var wid=$(this).attr('data-id');
			window.location.href="<?php echo U('Balance/fireRecord');?>?wid="+wid;
		}
	});
	$("button#touch").click(function(){
		var tel=$(this).attr('data-id');
		window.location.href="<?php echo U('Teacher/touchTeacher');?>?tel="+tel;
	});
</script>
</body>
</html>
