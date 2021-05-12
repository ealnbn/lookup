<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

/**
 * 评论相关操作
 * @author demontf
 *
 */

//允许跨域访问
header('Access-Control-Allow-Origin: *');

class CommentController extends Controller {

	public function __call($method, $args){
		if (method_exists('CommentController', $method)){
			$this->$method;
		}else{
			$response['STATUS'] = "error";
			$response['ERRMSG'] = "无该方法";
			$response['RESULT'] = array();
			$this->ajaxReturn($response);
		}
	}

    /**
     * 发布评论
     * @param eid 被评论的用户的id
     * @param content 评论内容
     * 调用地址：/lookup/index.php/Home/Comment/put
     * @return {"STATUS":"error|success","ERRMSG":"参数错误|请重新登录|评论失败","RESULT":[]}
     */
    public function put(){
    		$eid = I('param.eid/i');
    		$content = I('param.content/s');
    		$uuid=$this->validate();
    		if(empty($uuid)){
    			$response['STATUS'] = "error";
    			$response['ERRMSG'] = "请重新登录";
    			$response['RESULT'] = array();
    			$this->ajaxReturn($response);
    		}
	    	if(empty($eid) || empty($content)){
	    		$response['STATUS'] = "error";
	    		$response['ERRMSG'] = "参数错误";
	    		$response['RESULT'] = array();
	    		$this->ajaxReturn($response);
	    	}
		$user=M('user')->where("uuid='$uuid'")->find();
	    	$comment['content']=$content;
	    	$comment['good']=0;
	    	$comment['bad']=0;
	    	$comment['examiner']=$eid;
	    	$comment['user']=$user['id'];
	    	$comment['create_time']=date("Y-m-d H:i:s");
	    	
	    $res=M('comment')->add($comment);
	    	if($res){
	    		$response['STATUS'] = "success";
	    		$response['ERRMSG'] = "";
	    		$response['RESULT'] = array();
	    		$this->ajaxReturn($response);
	    	}else{
	    		$response['STATUS'] = "error";
	    		$response['ERRMSG'] = "评论失败";
	    		$response['RESULT'] = array();
	    		$this->ajaxReturn($response);
	    	}
    }
    /**
     * 对评论点赞
     * @param cid 评论记录的id
     * 调用地址：/lookup/index.php/Home/Comment/good
     * @return {"STATUS":"error|success","ERRMSG":"参数错误|请重新登录|点赞失败","RESULT":[]}
     */
    public function good(){
	    	$cid = I('param.cid/s');
	    	$uuid=$this->validate();
	    	if(empty($uuid)){
	    		$response['STATUS'] = "error";
	    		$response['ERRMSG'] = "请重新登录";
	    		$response['RESULT'] = array();
	    		$this->ajaxReturn($response);
	    	}
	    	if(empty($cid)){
	    		$response['STATUS'] = "error";
	    		$response['ERRMSG'] = "参数错误";
	    		$response['RESULT'] = array();
	    		$this->ajaxReturn($response);
	    	}
	    	
	    	//检查是或否已点过
	    	$is_do=M('assent')->where("comment=$cid and user='$uuid' and flag=1")->find();
	    	if(!empty($is_do)){
	    		$response['STATUS'] = "success";
	    		$response['ERRMSG'] = "已经点过";
	    		$response['RESULT'] = array();
	    		$this->ajaxReturn($response);
	    	}
	    	
	    $M=	M('comment');
	    	$comment = M('comment')->where("id=$cid")->find();
	    	$M->startTrans();
	    	if(!empty($comment)){
	    		$comment['good']=$comment['good']+1;
	    		$record['comment']=$comment['id'];
	    		$res_comm = $M->save($comment);
	    		$record['user']=$uuid;
	    		$record['flag']=1;
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
		    	$response['ERRMSG'] = "点赞失败";
		    	$response['RESULT'] = array();
		    	$this->ajaxReturn($response);
    }
    
    /**
     * 对评论点踩
     * @param cid 评论记录的id
     * 调用地址：/lookup/index.php/Home/Comment/bad
     * @return {"STATUS":"error|success","ERRMSG":"参数错误|请重新登录|点踩失败","RESULT":[]}
     */
    public function bad(){
    	$cid = I('param.cid/s');
    	$uuid=$this->validate();
    	if(empty($uuid)){
    		$response['STATUS'] = "error";
    		$response['ERRMSG'] = "请重新登录";
    		$response['RESULT'] = array();
    		$this->ajaxReturn($response);
    	}
    	if(empty($cid)){
    		$response['STATUS'] = "error";
    		$response['ERRMSG'] = "参数错误";
    		$response['RESULT'] = array();
    		$this->ajaxReturn($response);
    	}
    	
    	//检查是或否已点过
    	$is_do=M('assent')->where("comment=$cid and user='$uuid' and flag=2")->find();
    	
    	if(!empty($is_do)){
    		$response['STATUS'] = "success";
    		$response['ERRMSG'] = "已经点过";
    		$response['RESULT'] = array();
    		$this->ajaxReturn($response);
    	}
    	
    	$M=	M('comment');
    	$comment = M('comment')->where("id=$cid")->find();
    	$M->startTrans();
    	if(!empty($comment)){
    		$comment['bad']=$comment['bad']+1;
    		$record['comment']=$comment['id'];
    		$res_comm = $M->save($comment);
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
     * 根据老师加载评论
     * @param p 第几页
     * @param pageSize 页大小
     * @param tid 老师id
     * 调用地址：/lookup/index.php/Home/Comment/gets
     * @return {"STATUS":"error|success","ERRMSG":"参数错误或者请登录|请重新登录|点踩失败","RESULT":[]}
     */
    public function gets(){
    		$p = I("param.p",1);
    		
    		$pageSize = I("param.pageSize",5);
    		$page = ($p-1)*$pageSize;
    		$uuid=$this->validate();
    		$tid = I('param.tid');
    		
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
    		
    		$M = new Model();
    		$query_count = "select a.*, sum(b.flag) from ( 
    				SELECT u.name as user_name, u.pic as user_pic, c.content, c.good, c.bad, c.create_time, c.id
    					from user as u, comment as c where c.user = u.id and c.examiner = ".$tid." ) as a 
    				left join ( SELECT u.uuid, u.id, a.comment, a.flag from user as u, assent as a 
    				where a.user = u.uuid and u.uuid = '".$uuid."' and a.comment != '' ) as b on b.comment = a.id GROUP by a.id";
    		$count_res=$M->query($query_count);
    		$count=count($count_res);
    		$query="select a.*, sum(b.flag) as flag from ( 
    				SELECT u.name as user_name, u.pic as user_pic, c.content, c.good, c.bad, c.create_time, c.id
    					from user as u, comment as c where c.user = u.id and c.examiner = ".$tid." ) as a 
    				left join ( SELECT u.uuid, u.id, a.comment, a.flag from user as u, assent as a 
    				where a.user = u.uuid and u.uuid = '".$uuid."' and a.comment != '' ) as b on b.comment = a.id GROUP by a.id order by a.create_time desc 
    				 limit ".$page.", ".$pageSize;
    		
    		$comments=$M->query($query);
    		
    		if(empty($comments)){
    			$comments=array();
    		}
    		
    		foreach ($comments as $key => $value){
    			if(empty($value['flag'])){
    				$comments[$key]['is_good']=true;
    				$comments[$key]['is_bad']=true;
    			}else if($value['flag']==1){
    				$comments[$key]['is_good']=false;
    				$comments[$key]['is_bad']=true;
    			}else if($value['flag']==2){
    				$comments[$key]['is_good']=true;
    				$comments[$key]['is_bad']=false;
    			}else{
    				$comments[$key]['is_good']=false;
    				$comments[$key]['is_bad']=false;
    			}
    		}
    		$response['STATUS'] = "success";
    		$response['ERRMSG'] = "";
    		$response['RESULT'] = array("comments"=>$comments,"count"=>$count);
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
