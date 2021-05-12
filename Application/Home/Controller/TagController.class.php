<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

/**
 * 标签相关操作
 * @author demontf
 *
 */

//允许跨域访问
header('Access-Control-Allow-Origin: *');

class TagController extends Controller {

	public function __call($method, $args){
		if (method_exists('TagController', $method)){
			$this->$method;
		}else{
			$response['STATUS'] = "error";
			$response['ERRMSG'] = "无该方法";
			$response['RESULT'] = array();
			$this->ajaxReturn($response);
		}
	}

   
    /**
     * 获得老师标签列表
     * @param tid
     * @param uuid
     * 调用地址：/lookup/index.php/Home/Tag/gets
     * @return {"STATUS":"success","ERRMSG":"","RESULT":[k,]}
     */
    public function gets(){
	    	$tid = I('param.tid',0);
	    	$this->validate();
	    $tags=M('tag')->where(array("teacher"=>$tid))->select();
	   	$response['STATUS'] = "success";
	   	$response['ERRMSG'] = "";
	   	$response['RESULT'] = array("tags"=>$tags);
	   	$this->ajaxReturn($response);
    }
    
    /**
     * 为老师添加标签
     * @param tid 教师id
     * @param uuid 
     * @param tagid 标签id(可以为空 表示新建)
     * @param name 标签名字
     * 调用地址：/lookup/index.php/Home/Tag/put
     * @return {"STATUS":"success|error","ERRMSG":"参数错误|请登录","RESULT":[k,]}
     */
    public function put(){
    		$tid = I('param.tid');
    		$uuid = $this->validate();
    		$tagid=I('param.tagid');
    		$name = I('param.name');
    		
    		if(empty($tid) || empty($name)){
    			$response['STATUS'] = "error";
    			$response['ERRMSG'] = "参数错误";
    			$response['RESULT'] = array();
    			$this->ajaxReturn($response);
    		}
    		
    		if(empty($uuid)){
    			$response['STATUS'] = "error";
    			$response['ERRMSG'] = "请登录";
    			$response['RESULT'] = array();
    			$this->ajaxReturn($response);
    		}
    		if(empty($tagid)){//新建标签
    			$tag['teacher']=$tid;
    			$tag['content']=$name;
    			$tag['number']=1;
    			$tag['create_time']=date("Y-m-d H:i:s");
    			$res_tag=M('tag')->add($tag);
    			if(empty($res_tag)){
    				$response['STATUS'] = "error";
    				$response['ERRMSG'] = "添加失败";
    				$response['RESULT'] = array();
    				$this->ajaxReturn($response);
    			}
    			//添加记录
    			$record['tagid']=$res_tag;
    			$record['teacherid']=$tid;
    			$record['uuid']=$uuid;
    			$record['content']=$name;
    			$record['create_time']=date("Y-m-d H:i:s");
    			$res_record=M('user_tag')->add($record);
    		}else{//已有标签
    			$tag=M('tag')->where(array("id"=>$tagid))->find();
    			if(empty($tag)){
    				$response['STATUS'] = "error";
    				$response['ERRMSG'] = "无此标签";
    				$response['RESULT'] = array();
    				$this->ajaxReturn($response);
    			}
    			$tag['number']=$tag['number']+1;
    			M('tag')->save($tag);
    			//添加记录
    			$record['tagid']=$tag['id'];
    			$record['teacherid']=$tid;
    			$record['uuid']=$uuid;
    			$record['content']=$name;
    			$record['create_time']=date("Y-m-d H:i:s");
    			$res_record=M('user_tag')->add($record);
    		}
    		if(empty($res_record)){
    			$response['STATUS'] = "error";
    			$response['ERRMSG'] = "添加失败";
    			$response['RESULT'] = array();
    			$this->ajaxReturn($response);
    		}
    		
    		$response['STATUS'] = "success";
    		$response['ERRMSG'] = "添加成功";
    		$response['RESULT'] = array();
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
