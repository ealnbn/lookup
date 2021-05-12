<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

/**
 * 学校相关操作
 * @author demontf
 *
 */

//允许跨域访问
header('Access-Control-Allow-Origin: *');

class SchoolController extends Controller {

	public function __call($method, $args){
		if (method_exists('SchoolController', $method)){
			$this->$method;
		}else{
			$response['STATUS'] = "error";
			$response['ERRMSG'] = "无该方法";
			$response['RESULT'] = array();
			$this->ajaxReturn($response);
		}
	}

   
    /**
     * 获得学校列表
     * 调用地址：/lookup/index.php/Home/School/gets
     * @return {"STATUS":"error|success","ERRMSG":"参数错误|请重新登录|为找到","RESULT":[]}
     */
    public function gets(){
	    	
	    $school=M('school')->select();
	   	if(empty($school)){
	   		$response['STATUS'] = "error";
	   		$response['ERRMSG'] = "未找到";
	   		$response['RESULT'] = array();
	   		$this->ajaxReturn($response);
	   	}
	   	$response['STATUS'] = "success";
	   	$response['ERRMSG'] = "";
	   	$response['RESULT'] = array("school"=>$school);
	   	$this->ajaxReturn($response);
    }
    
    
	private function validate(){
    		$uuid=I('param.uuid');
	   	$user=M('examiner')->where(array("uuid"=>$uuid))->find();
	    	if(empty($user)){
	    		return null;
	    	}else{
	    		return $uuid;
	    	}
    }
}
