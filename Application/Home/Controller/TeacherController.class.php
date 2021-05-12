<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

/**
 * 教师相关操作
 * @author demontf
 *
 */
 
//允许跨域访问
header('Access-Control-Allow-Origin: *');

class TeacherController extends Controller {

	public function __call($method, $args){
		if (method_exists('TeacherController', $method)){
			$this->$method;
		}else{
			$response['STATUS'] = "error";
			$response['ERRMSG'] = "无该方法";
			$response['RESULT'] = array();
			$this->ajaxReturn($response);
		}
	}

    /**
     * 列出热度最高的教师
     * @param p 第几页
     * @param pageSize 页大小
     * 调用地址：/lookup/index.php/Home/Teacher/getsHot
     * @return {"STATUS":"success","ERRMSG":"","RESULT":{"count":1,"list":[]}}
     */
    public function getsHot(){
    		$p = I("param.p",1);
    		$pageSize = I("param.pageSize",10);
    		$page = ($p-1)*$pageSize;
    		$Model = new Model();
    		$query_count = "select t.id,t.good,t.bad,t.name,t.pic,t.school_name,t.description,t.academy,t.major,
    					count(c.examiner) as comment_num
    				    from examiner as t left join comment as c on c.examiner=t.id 
    				    group by t.id order by count(c.examiner)";
    		$all=$Model->query($query_count);
    		$count=count($all);
    		
    		$query = "select t.id, t.good,t.bad,t.name,t.pic,t.school_name,t.description,t.academy,t.major,
    					count(c.examiner) as comment_num
    				    from examiner as t left join comment as c on c.examiner=t.id 
    				    group by t.id order by count(c.examiner) desc limit ".$page.",".$pageSize;
    		$list=$Model->query($query);
    		if(empty($list))$list=array();
    		$response['STATUS'] = "success";
    		$response['ERRMSG'] = "";
    		$response['RESULT'] = array("count"=>$count,"list"=>$list);
    		$this->ajaxReturn($response);
    }
    
    
    /**
     * 搜索热度最高的教师
     * @param p 第几页
     * @param pageSize 页大小
     * @param key 关键字
     * 调用地址：/lookup/index.php/Home/Teacher/search
     * @return {"STATUS":"success","ERRMSG":"","RESULT":{"count":1,"list":[]}}
     */
    public function search(){
    	$p = I("param.p",1);
    	$pageSize = I("param.pageSize",10);
    	$page = ($p-1)*$pageSize;
    	$key = I('param.key/s',"");
   
    	$Model = new Model();
    	$query_count = "select t.id,t.good,t.bad,t.name,t.pic,t.school_name,t.description,t.academy,t.major,
    					count(c.examiner) as comment_num
    				    from examiner as t left join comment as c on c.examiner=t.id 
    				    where t.name like '%".$key."%' or t.school_name like '%".$key."%' group by t.id order by count(c.examiner)";
    	$all=$Model->query($query_count);
    	$count=count($all);
    
    	$query = "select t.id, t.good,t.bad,t.name,t.pic,t.school_name,t.description,t.academy,t.major,
    					count(c.examiner) as comment_num
    				    from examiner as t left join comment as c on c.examiner=t.id
    				     where t.name like '%".$key."%'  or t.school_name like '%".$key."%' group by t.id order by count(c.examiner) desc limit ".$page.",".$pageSize;
    	$list=$Model->query($query);
    	if(empty($list))$list=array();
    	$response['STATUS'] = "success";
    	$response['ERRMSG'] = "";
    	$response['RESULT'] = array("count"=>$count,"list"=>$list);
    	$this->ajaxReturn($response);
    }
    
    
    /**
     * 按学校列教师
     * @param p 第几页
     * @param pageSize 页大小
     * @param school 学校id
     * 调用地址：/lookup/index.php/Home/Teacher/getsBySchool
     * @return {"STATUS":"success","ERRMSG":"","RESULT":{"count":1,"list":[]}}
     */
    
    
    public function getsBySchool(){
	    	$p = I("param.p",1);
	    	$school = I("param.school/i",1);
	    	$pageSize = I("param.pageSize",10);
    		$page = ($p-1)*$pageSize;
    		if(!is_numeric($school)){
    			$response['STATUS'] = "success";
    			$response['ERRMSG'] = "";
    			$response['RESULT'] = array("count"=>0,"list"=>array());
    			$this->ajaxReturn($response);
    		}
    		$Model = new Model();
    		$query_count = "select t.id,t.good,t.bad,t.name,t.pic,t.school_name,t.description,t.academy,t.major,
    					count(c.examiner) as comment_num
    				    from examiner as t left join comment as c on c.examiner=t.id 
    				    where t.school=".$school." group by t.id order by count(c.examiner)";
    		$all=$Model->query($query_count);
    		$count=count($all);
    		$query = "select t.id,t.good,t.bad,t.name,t.pic,t.school_name,t.description,t.academy,t.major,
    					count(c.examiner) as comment_num
    				    from examiner as t left join comment as c on c.examiner=t.id 
    				    where t.school=".$school." group by t.id order by count(c.examiner) limit ".$page.",".$pageSize;
    		$list=$Model->query($query);
    		if(empty($list))$list=array();
	    	$response['STATUS'] = "success";
	    	$response['ERRMSG'] = "";
	    	$response['RESULT'] = array("count"=>$count,"list"=>$list);
	    	$this->ajaxReturn($response);
    }
    
    
    /**
     * 对人点赞
     * @param tid 教师的id
     * 调用地址：/lookup/index.php/Home/Teacher/good
     * @return {"STATUS":"error|success","ERRMSG":"参数错误|请重新登录|点赞失败","RESULT":[]}
     */
    public function good(){
	    	$tid = I('param.tid/s');
	    	$uuid=$this->validate();
	    	if(empty($uuid)){
	    		$response['STATUS'] = "error";
	    		$response['ERRMSG'] = "请重新登录";
	    		$response['RESULT'] = array();
	    		$this->ajaxReturn($response);
	    	}
	    	if(empty($tid)){
	    		$response['STATUS'] = "error";
	    		$response['ERRMSG'] = "参数错误";
	    		$response['RESULT'] = array();
	    		$this->ajaxReturn($response);
	    	}
	    	
	    	//检查是或否已点过
	    	$is_do=M('assent')->where("teacher=$tid and user='$uuid' and flag=1")->find();
	    	if(!empty($is_do)){
	    		$response['STATUS'] = "success";
	    		$response['ERRMSG'] = "已经点过";
	    		$response['RESULT'] = array();
	    		$this->ajaxReturn($response);
	    	}
	    	
	    $M=	M('examiner');
	    	$teacher = $M->where("id=$tid")->find();
	    	$M->startTrans();
	    	if(!empty($teacher)){
	    		$teacher['good']=$teacher['good']+1;
	    		$record['teacher']=$tid;
	    		$res_teacher = $M->save($teacher);
	    		$record['user']=$uuid;
	    		$record['flag']=1;
	    		$record['create_time']=date("Y-m-d H:i:s");
	    		$res=M('assent')->add($record);
	    		if($res && $res_teacher){
	    			$M->commit();
	    			$response['STATUS'] = "success";
	    			$response['ERRMSG'] = "";
	    			$response['RESULT'] = array();
	    			$this->ajaxReturn($response);
	    		}else{
	    			$M->rollback();
	    		}
	    	}
		    	$response['STATUS'] = "error";
		    	$response['ERRMSG'] = "点赞失败";
		    	$response['RESULT'] = array();
		    	$this->ajaxReturn($response);
    }
    
    /**
     * 对人点踩
     * @param tid 教师的id
     * 调用地址：/lookup/index.php/Home/Teacher/bad
     * @return {"STATUS":"error|success","ERRMSG":"参数错误|请重新登录|点踩失败","RESULT":[]}
     */
    public function bad(){
	    	$tid = I('param.tid/s');
	    	$uuid=$this->validate();
	    	if(empty($uuid)){
	    		$response['STATUS'] = "error";
	    		$response['ERRMSG'] = "请重新登录";
	    		$response['RESULT'] = array();
	    		$this->ajaxReturn($response);
	    	}
	    	if(empty($tid)){
	    		$response['STATUS'] = "error";
	    		$response['ERRMSG'] = "参数错误";
	    		$response['RESULT'] = array();
	    		$this->ajaxReturn($response);
	    	}
	    	
	    	//检查是或否已点过
	    $is_do=M('assent')->where("teacher=$tid and user='$uuid' and flag=2")->find();
	    	if(!empty($is_do)){
	    		$response['STATUS'] = "success";
	    		$response['ERRMSG'] = "已经点过";
	    		$response['RESULT'] = array();
	    		$this->ajaxReturn($response);
	    	}
	    	
	    	$M=	M('examiner');
	   	$teacher = $M->where("id=$tid")->find();
	    	$M->startTrans();
	    	if(!empty($teacher)){
	    		$teacher['bad']=$teacher['bad']+1;
	    		$record['teacher']=$tid;
	    		$res_comm = $M->save($teacher);
	    		$record['user']=$uuid;
	    		$record['flag']=2;
	    		$record['create_time']=date("Y-m-d H:i:s");
	    		$res=M('assent')->add($record);
	    		if($res && $res_comm){
	    			$M->commit();
	    			$response['STATUS'] = "success";
	    			$response['ERRMSG'] = "";
	    			$response['RESULT'] = array();
	    			$this->ajaxReturn($response);
	    		}else{
	    			$M->rollback();
	    		}
	    	}
	    	$response['STATUS'] = "error";
	    	$response['ERRMSG'] = "点踩失败";
	    	$response['RESULT'] = array();
	    	$this->ajaxReturn($response);
    }
    
    /**
     * 获得教师详细信息
     * @param tid 教师的id
     * 调用地址：/lookup/index.php/Home/Teacher/get
     * @return {"STATUS":"error|success","ERRMSG":"参数错误|请重新登录|为找到","RESULT":[]}
     */
    public function get(){
	    	$tid = I('param.tid/s');
	    	$uuid=$this->validate();
	    	if(empty($uuid)){
	    		$response['STATUS'] = "error";
	    		$response['ERRMSG'] = "请重新登录";
	    		$response['RESULT'] = array();
	    		$this->ajaxReturn($response);
	    	}
	    	if(empty($tid)){
	    		$response['STATUS'] = "error";
	    		$response['ERRMSG'] = "参数错误";
	    		$response['RESULT'] = array();
	    		$this->ajaxReturn($response);
	    	}
	    	
	    $teacher=M('examiner')->where("id=$tid")->find();
	   	if(empty($teacher)){
	   		$response['STATUS'] = "error";
	   		$response['ERRMSG'] = "未找到";
	   		$response['RESULT'] = array();
	   		$this->ajaxReturn($response);
	   	}
	   	
    		//检查是或否已点赞
	    	$is_good=M('assent')->where("teacher=$tid and user='$uuid' and flag=1")->find();
	    	//检查是或否已点踩
	    	$is_bad=M('assent')->where("teacher=$tid and user='$uuid' and flag=2")->find();
	    	$is_good=empty($is_good)?true:false;//true 可以点
	    	$is_bad=empty($is_bad)?true:false;
	    	
	   	$response['STATUS'] = "success";
	   	$response['ERRMSG'] = "";
	   	$response['RESULT'] = array("teacher"=>$teacher,"good"=>$is_good,"bad"=>$is_bad);
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
