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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">教师管理</strong> / <small>课程列表</small></div>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12 am-u-md-6">
        <div class="am-btn-toolbar">
          <div class="am-btn-group am-btn-group-xs">
            <button type="button" onclick="toAddNew()" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
            <button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 保存</button>
            <button type="button" class="am-btn am-btn-default"><span class="am-icon-archive"></span> 审核</button>
            <button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button>
          </div>
        </div>
      </div>
      <div class="am-u-sm-12 am-u-md-3">
        <div class="am-form-group">
          <select data-am-selected="{btnSize: 'sm'}">
            <option value="option1">所有类别</option>
            <option value="option2">IT业界</option>
            <option value="option3">数码产品</option>
            <option value="option3">笔记本电脑</option>
            <option value="option3">平板电脑</option>
            <option value="option3">只能手机</option>
            <option value="option3">超极本</option>
          </select>
        </div>
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
                <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th><th class="table-title">课程名字</th><th class="table-type">课程价格</th><th class="table-type">课程类型</th><th class="table-author am-hide-sm-only">上课方式</th><th class="table-author am-hide-sm-only">创建时间</th><th class="table-date am-hide-sm-only">课程描述</th><th class="table-date am-hide-sm-only">是否上架</th><th class="table-set">操作</th>
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
               <td class="am-hide-sm-only"><?php if($l['marketable']==1){echo "已上架";}else{echo "未上架";}?></td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <button type="button" data-id="<?php echo $l['id']?>"  data-size="<?php echo $l['size']?>" id="edit" class="am-btn am-btn-default am-btn-xs am-text-secondary" ><span class="am-icon-pencil-square-o"></span> 编辑</button>
                    <button type="button" data-id="<?php echo $l['id']?>"  id="delete" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o">删除</span></button>
                    <button type="button" data-id="<?php echo $l['id']?>"  id="market" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"><?php if($l['marketable']==1){echo "下架";}else{echo "上架";}?></span></button>
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
	function toAddNew(){
			window.location.href="<?php echo U('Lesson/toAdd');?>?tid="+<?php echo $tid?>;
		}
	$("button#edit").click(function(){
			var lid=$(this).attr('data-id');
			var size=$(this).attr('data-size');
			if(size==2){
				alert('说好的一对一不能修改，你还瞎点！！！');return;
			}
			window.location.href="<?php echo U('Lesson/toEdit');?>?lid="+lid;
		});
	$("button#market").click(function(){
		var lid=$(this).attr('data-id');
		window.location.href="<?php echo U('Lesson/marketable');?>?lid="+lid;
	});
	$("button#delete").click(function(){
		var res = confirm('骚年，这可不是闹着玩的！');
		if(res){
			var lid=$(this).attr('data-id');
			window.location.href="<?php echo U('Lesson/deleteLesson');?>?lid="+lid;
		}
	});
</script>
</body>
</html>
