<?php
/**
 * 设置返回数据
 */
function response($status,$errMsg,$result){
	return array('STATUS'=>$status,'ERRMSG'=>$errMsg,'RESULT'=>$result);
}
/**
 * 上传文件
 */
function upload(){
	    $upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     5242880 ;// 设置附件上传大小
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	    $upload->rootPath  =     './Uploads/teacher/'; // 设置附件上传根目录
	    $upload->savePath  =     ''; // 设置附件上传（子）目录
		$upload->autoSub = true;
		$upload->subName = array('date','Ymd');	    
	    // 上传文件 
	    return $upload->upload();
	 }
/**
 * 根据id，商城ID，客户ID
 * 生成订单号
 */
 function makeOrderCode($id,$sid,$cid){
 	return $id.substr($sid,-3,2).substr($cid,-3,2);
 }
/**
 * 生成学号
 * 学号由2位的年份，2位报名的月份，2位日期，学籍编号，
 */
 function idGenetator($id){
 	return date('ymd').$id;
 }
 /**
  * 根据表名称从数据库中查询下一个自增ID
  */
  function getNextId($tableName){
  	 $M = M();
	 return $M->query("SHOW TABLE STATUS LIKE '$tableName' ")[0]['auto_increment'];
  }
  /**
   * curl远程请求
   * @param $url 请求地址
   * @param $data 请求参数，若为null则使用get方式，否则使用post方式
   * @return $res 请求结果
   */
  function httpRequest($url,$data = null){
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,$url);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
				curl_setopt($ch, CURLOPT_HEADER, FALSE);
				if(!empty($data)){
						curl_setopt($ch,CURLOPT_POST, true);
						curl_setopt($ch,CURLOPT_POSTFIELDS,$data);	
				}
				$res = curl_exec($ch);
				curl_close( $ch);
				return $res;		
	}	
	
	
	
	/**
	 * 发送短信方法
	 * @param  $phone 目标电话
	 * @param  $msg	信息内容
	 * @return boolean
	 */
 function sendMsg($phone,$msg){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://sms-api.luosimao.com/v1/send.json");
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_HTTPAUTH , CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD  , 'api:key-2a05e75284f85920914dcbe4db17cb1b');
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, array("mobile"=>$phone,"message"=>$msg."【艺考拉客服】"));
		$res = curl_exec( $ch );
		curl_close( $ch );
		$response = json_decode($res);
		return $response->msg == 'ok';
	}