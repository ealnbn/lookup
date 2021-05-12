<?php
namespace Amaze\Service;
use Think\Model;
class StatisticsService{

	/**
	 * 返回 每月按日统计 销售个数num_items, 销售金额prices
	 */
	public function getMonthSales(){
 		$M = new Model();
		//$M=M('lesson_order');
		//$firstday = date("Y-m-01 00:00:00",strtotime(date("Y-m-d H:i:s")));
		$date = I("param.date");
		if (empty($date)) {
			$firstday = date("Y-m-01 00:00:00",strtotime(date("Y-m-d H:i:s")));
		}else{
			$firstday = date("Y-m-01 00:00:00",strtotime($date));
		}
		$lastday = date("Y-m-d 23:59:59",strtotime("$firstday +1 month -1 day"));
		$sql = "select  DATE_FORMAT(l.pay_time,'%Y-%m-%d') as pay_time, count(*) as num_items,sum(l.price) as prices
				from lesson_order as l where l.status=1
				and l.pay_time <= '".$lastday."'
				and l.pay_time >= '".$firstday."'
			    group by DATE_FORMAT(l.pay_time,'%Y-%m-%d')";
		$data=$M->query($sql);


// 		dump("ss");
// 		$data=$M->where("status=1 AND pay_time<='$lastday' AND pay_time>='$firstday'")->field(array(
// 				"SUM(price)"=>"prices",
// 				"count(*)"=>"num_items",
// 				"order_id",
// 				"pay_time"
// 		))->group('pay_time')->select();
// 		dump($M->getError());
		$days = ceil((strtotime($lastday)-strtotime($firstday))/(60*60*24));
		$day_list = array();
		//初始化 数据x y1 y2
		for($i=0;$i<$days;$i++){
			$index=date("Y-m-d",(strtotime($firstday)+60*60*24*$i));
			$day_list[$index]=array(
					"prices"=>0,
					"num_items"=>0,
					"pay_time"=>$index
			);
		}
		foreach ($data as $item => $value){
			$day_list[$value['pay_time']]=$value;
		}
		return $day_list;
	}

	/**
	 * 获得每月按日统计提现次数num_items 和 提现金额prices
	 */
	public function getMonthWithdraw(){
		$M = new Model();
		$date = I("param.date");
		if (empty($date)) {
			$firstday = date("Y-m-01 00:00:00",strtotime(date("Y-m-d H:i:s")));
		}else{
			$firstday = date("Y-m-01 00:00:00",strtotime($date));
		}
		
		//$firstday = date("Y-m-01 00:00:00",strtotime(date("Y-m-d H:i:s")));
		$lastday = date("Y-m-d 23:59:59",strtotime("$firstday +1 month -1 day"));
		$w_sql = "select  DATE_FORMAT(w.update_time,'%Y-%m-%d') as update_time, count(*) as num_items,sum(w.money) as prices
				from teacher_withdraw as w where w.status=1
				and w.update_time <= '".$lastday."'
				and w.update_time >= '".$firstday."'
			    group by DATE_FORMAT(w.update_time,'%Y-%m-%d')";
		$w_data= $M->query($w_sql);
		$days = ceil((strtotime($lastday)-strtotime($firstday))/(60*60*24));
		$day_list = array();
		//初始化 数据x y1 y2
		for($i=0;$i<$days;$i++){
			$index=date("Y-m-d",(strtotime($firstday)+60*60*24*$i));
			$day_list[$index]=array(
					"prices"=>0,
					"num_items"=>0,
					"update_time"=>$index
			);
		}
		foreach ($w_data as $item => $value){
			$day_list[$value['update_time']]=$value;
		}
		return $day_list;
	}

	/**
	 * 获得开启分成推广教师 分成比例均值
	 */
	public function getTeacherAvgCommission(){
	    $M = M('teacher');
	    $data=$M->where(array("has_commission"=>0))->avg('ratio');
	    return $data;
	}

	/**
	 * 获取人物关系图
	 */
	public function getForceMap(){
		$M = new Model();
		//获取订单列表
		$data = $M->distinct(true)->field(array('t.name'=>'teacher','RIGHT(a.wxid,6)'=>'student'))
				->table('lesson_order as o,teacher as t,account as a')
				->where("o.status=2 AND o.teacher=t.id AND a.wxid=o.student")->select();
		//dump($data);die();

		$teacher = array();
		$student = array();

		foreach ($data as $key=>$value){
		    array_push($teacher,$value['teacher']);
		    array_push($student,$value['student']);
		}
// 		$teacher=array_unique($teacher);
// 		$student=array_unique($student);

		$nodes =array();
		foreach($teacher as $t){
			$temp['category']=1;
			$temp['name']=$t;
			$temp['value']=1;//默认 后期可以计算数量
			array_push($nodes,$temp);
		}

		foreach ($student as $s){
			$temp['category']=2;
			$temp['name']=$s;
			$temp['value']=1;//默认 后期可以计算数量
			array_push($nodes,$temp);
		}
		//dump($nodes);die();
		//拼接关系 师生关系
		$data=$this->array_unique_fb($data);
		$links=array();
		foreach ($data as $l){
			$link['source']=$l[0];
			$link['target']=$l[1];
			$link['weight']=1;//默认 后期重新计算权重
			array_push($links,$link);
		}

		//教师间关系
		$market=$M->distinct(true)->field('t1.name as source,t2.name as target')
		  ->table('market_promotion as m,teacher as t1,teacher as t2')
		  ->where("m.status in(2,3) and t1.id=m.presentee and t2.id=m.presenter")->fetchSql(true)->select();
		foreach ($market as $mar){
			$link['source']=$mar['source'];
			$link['target']=$mar['target'];
			$link['weight']=1;//默认 后期重新计算权重
			array_push($links,$link);
		}

		$response['nodes']=$nodes;
		$response['links']=$links;
	 	return $response;
	}


	//二维数组去掉重复值
	private function array_unique_fb($array2D)
	{
		foreach ($array2D as $v)
		{
			$v = join(",",$v); //降维,也可以用implode,将一维数组转换为用逗号连接的字符串
			$temp[] = $v;
		}
		$temp = array_unique($temp); //去掉重复的字符串,也就是重复的一维数组
		foreach ($temp as $k => $v)
		{
			$temp[$k] = explode(",",$v); //再将拆开的数组重新组装
		}
		return $temp;
	}

}

?>
