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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">积分管理</strong> / <small>积分商品列表</small></div>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12 am-u-md-6">
        <div class="am-btn-toolbar">
          <div class="am-btn-group am-btn-group-xs">
            <button type="button" onclick="toAddNew()" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
            <button type="button" onclick="filterMarketable()" class="am-btn am-btn-default"><span class="am-icon-save"></span>已上架</button>
            <button type="button" onclick="filterUnMarketable()" class="am-btn am-btn-default"><span class="am-icon-archive"></span>已下架</button>
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
                <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th><th class="table-title">商品名字</th><th class="table-type">商品价格</th><th class="table-author am-hide-sm-only">总个数</th><th class="table-author am-hide-sm-only">剩余个数</th><th class="table-author am-hide-sm-only">排序</th><th class="table-author am-hide-sm-only">创建时间</th><th class="table-set">操作</th>                                 
              </tr>
          </thead>
          <tbody>
          <?php 
          	foreach ($product as $p){
          ?>
            <tr id="<?php $p['id']?>">
              <td><input type="checkbox" /></td>
              <td><?php echo $p['id'];?></td>
              <td>
              	<a href="#"><?php echo $p['name'];?></a>
              	<img src="<?php echo __ROOT__?>/Uploads/Product/<?php echo $p['pic'];?>" alt="" class="am-comment-avatar" width="48" height="48">
              </td>
              <td><?php echo $p['score']?>
			        </td>
              <td class="am-hide-sm-only"><?php echo $p['max_num'];?></td>
              <td class="am-hide-sm-only"><?php echo $p['max_num']-$p['now_num'];?></td>
              <td class="am-hide-sm-only"><?php echo $p['order_flag'];?></td>
              <td class="am-hide-sm-only" ><?php echo $p['create_time'];?></td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <button type="button" data-id="<?php echo $p['id']?>" id="edit" class="am-btn am-btn-default am-btn-xs am-text-secondary" ><span class="am-icon-pencil-square-o"></span> 编辑</button>
                  
                    <button type="button" data-status="<?php echo $p['is_marketable']?>" data-tid="<?php echo $p['id']?>"  id="activation" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" >
                    <span class="am-icon-trash-o">
                    		<?php if($p['is_marketable']==0){
                    			echo "上架";
                    		}else if($p['is_marketable']==1){
                    			echo "下架";
                    		}?>
                    </span> 
                    	</button>
            
                  </div>
                </div>
              </td>
            </tr>
           <?php }?>
          </tbody>
        </table>
          <div class="am-cf">
  			共 <?php echo count($product);?> 条记录
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
			window.location.href="<?php echo U('Score/toAdd');?>";
		}
	function filterMarketable(){
		window.location.href="<?php echo U('Score/listMarketable');?>";
	}
	function filterUnMarketable(){
		window.location.href="<?php echo U('Score/listUnMarketable');?>";
	}
	
	$("button#edit").click(function(){
			var pid=$(this).attr('data-id');
			window.location.href="<?php echo U('Score/editProduct');?>?pid="+pid;
		});

	

	$("button#searchButton").click(function(){
		var key=$("#searchKey").val();
		window.location.href="<?php echo U('Score/searchProduct');?>?key="+key;
	});
	
	
	 $('button#activation').on('click', function() {
		  var is_marketable=$(this).attr('data-status');
 		  var pid=$(this).attr('data-tid');
 			if(is_marketable==1){
 				//下架
				window.location.href="<?php echo U('Score/unMarketProduct');?>?pid="+pid;
      }else{
 				window.location.href="<?php echo U('Score/marketProduct');?>?pid="+pid;
 			}
	  });

</script>

</body>
</html>