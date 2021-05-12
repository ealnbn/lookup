<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 用户相关操作
 * @author demontf
 *
 */
//允许跨域访问
header('Access-Control-Allow-Origin: *');

class UserController extends Controller {

	public function __call($method, $args){
		if (method_exists('UserController', $method)){
			$this->$method;
		}else{
			$response['STATUS'] = "error";
			$response['ERRMSG'] = "无该方法";
			$response['RESULT'] = array();
			$this->ajaxReturn($response);
		}
	}
	
	/**
	 * 获取验证码图片
	 * @param null
	 * 调用地址：/lookup/index.php/Home/User/getVertifyPic
	 * @return 图片流
	 */
    public function getVertifyPic(){
	    	$Verify = new \Think\Verify();
	    	$Verify->fontSize = 30;
	    	$Verify->length   = 4;
	    	$Verify->entry();
    }
    
    /**
     * 发送手机验证码
     * @param phone 
     * 调用地址：/lookup/index.php/Home/User/sendVertify
     * @return {"STATUS":"error|success","ERRMSG":"参数错误|超时|发送失败","RESULT":[]}
     */
    public function sendVertify(){
    		$phone =  I('param.phone/s',"");
    		$phone_flag = $phone."_flag";
    		
    		$time = S($phone_flag);
    		if (!empty($time) && $time-date("Y-m-d H:i:s")<120){
    			$response['STATUS'] = "error";
    			$response['ERRMSG'] = "请求过多，稍后再试";
    			$response['RESULT'] = array();
    			$this->ajaxReturn($response);
    		}
    		if(empty($phone)){
    			$response['STATUS'] = "error";
    			$response['ERRMSG'] = "参数错误";
    			$response['RESULT'] = array("phone"=>$phone);
    			$this->ajaxReturn($response);
    		}
    			$res_phone=M('user')->where("phone='$phone'")->find();
    			if(!empty($res_phone)){
    				$response['STATUS'] = "error";
    				$response['ERRMSG'] = "手机号已被注册";
    				$response['RESULT'] = array("phone"=>$phone);
    				$this->ajaxReturn($response);
    			}
    			$code=rand(100000,999999);
    			$res=sendMsg($phone,"权限验证码为:".$code);
    			//发送成功
    			if($res){
    				$response['STATUS'] = "success";
    				S($phone,$code."",180);
    				S($phone_flag,date("Y-m-d H:i:s"),120);
    				$response['ERRMSG'] = "";
    				$response['RESULT'] = array();
    				$this->ajaxReturn($response);
    			}else{
    				$response['STATUS'] = "error";
    				$response['ERRMSG'] = "发送失败";
    				$response['RESULT'] = array();
    				$this->ajaxReturn($response);
    			}
    		
    }
    
    /**
     * 注册
     * @param phone
     * @param password 密码
     * @param comfirm  确认密码
     * @param vertify 手机验证码
     * 调用地址：/lookup/index.php/Home/User/register
     * cookie 中放入uuid
     * @return {"STATUS":"error|success","ERRMSG":"参数错误|两次密码不一致|验证码过期或错误|注册失败","RESULT":[]}
     */
    public function register(){
    		$phone = I('param.phone/s');
    		$password = I('param.password/s');
    		$comfirm = I('param.comfirm/s');
    		$vertify = I('param.vertify/s');
    		$code = I('param.code/s',"");
    		if(empty($phone) || empty($password) || empty($comfirm) ||empty($vertify)){
    			$response['STATUS'] = "error";
    			$response['ERRMSG'] = "参数错误";
    			$response['RESULT'] = array();
    			$this->ajaxReturn($response);
    		}
    		$vertify_session=S($phone);
    		if(empty($vertify_session) || $vertify_session!==$vertify){
    			$response['STATUS'] = "error";
    			$response['ERRMSG'] = "验证码过期或错误";
    			$response['RESULT'] = array("vertify_session"=>$vertify_session,"vertify"=>$vertify);
    			$this->ajaxReturn($response);
    		}
    		if($password!==$comfirm){
    			$response['STATUS'] = "error";
    			$response['ERRMSG'] = "两次密码不一致";
    			$response['RESULT'] = array();
    			$this->ajaxReturn($response);
    		}
    		$user['phone']=$phone;
    		$user['ps']=md5($password);
    		$user['code']=$code;
    		$user['name']="牛逼的见友";
    		$user['create_time']=date('Y-m-d H:i:s');
    		$user['uuid']=md5($phone."maoku");
    		$rand=rand(1,17);
    		$user['pic']="Uploads/head/".$rand.".jpg";
    		$res=M('user')->add($user);
    		if($res){
    			$response['STATUS'] = "success";
    			//session('uuid',$user['uuid']);
    			$response['ERRMSG'] = "";
    			$response['RESULT'] = array("uuid"=>$user['uuid'],"pic"=>$user['pic'],"name"=>$user['name']);
    			$this->ajaxReturn($response);
    		}else{
    			$response['STATUS'] = "error";
    			$response['ERRMSG'] = "注册失败";
    			$response['RESULT'] = array();
    			$this->ajaxReturn($response);
    		}
    }
    
    /**
     * 登录
     * @param phone
     * @param password 密码
     * cookie 中放入uuid
     * 调用地址：/lookup/index.php/Home/User/login
     * @return {"STATUS":"error|success","ERRMSG":"参数错误|用户名密码错误","RESULT":[]}
     */
    public function login(){
    		$phone = I('param.phone/s');
    		$password = I('param.password/s');
	    	if(empty($phone) || empty($password)){
	    		$response['STATUS'] = "error";
	    		$response['ERRMSG'] = "参数错误";
	    		$response['RESULT'] = array();
	    		$this->ajaxReturn($response);
	    	}
	    	$user=M('user')->where("phone='$phone'")->find();
	    	
	    	if(!empty($user) && md5($password)===$user['ps']){
	    		//session('uuid',$user['uuid']);
	    		$response['STATUS'] = "success";
	    		$response['ERRMSG'] = "";
	    		$response['RESULT'] = array("uuid"=>$user['uuid'],"pic"=>$user['pic'],"name"=>$user['name'],"dd"=>$test);
	    		$this->ajaxReturn($response);
	    	}else{
	    		$response['STATUS'] = "error";
	    		$response['ERRMSG'] = "用户名密码错误";
	    		$response['RESULT'] = array();
	    		$this->ajaxReturn($response);
	    	}
    }
    
     /**
     * 获取用户详情
     * @param null
     * 调用地址：/lookup/index.php/Home/User/get
     * @return {"STATUS":"error|success","ERRMSG":"参数错误|未找到该用户","RESULT":["pic":sss,"name":sss]}
     */
    public function get(){
    		$uuid = $this->validate();
	    	if(empty($uuid)){
	    		$response['STATUS'] = "error";
	    		$response['ERRMSG'] = "请重新登录";
	    		$response['RESULT'] = array();
	    		$this->ajaxReturn($response);
	    	}
	    	$user=M('user')->where("uuid='$uuid'")->find();
	    	if(empty($user)){
	    		$response['STATUS'] = "error";
	    		$response['ERRMSG'] = "未找到该用户";
	    		$response['RESULT'] = array();
	    		$this->ajaxReturn($response);
	    	}
	    	
	    $good=M('assent')->where("user='$uuid' and (teacher !='' or teacher != null) and flag=1")->count();
	    $bad=M('assent')->where("user='$uuid' and (teacher !='' or teacher != null) and flag=2")->count();
	    
    		$response['STATUS'] = "success";
    		$response['ERRMSG'] = "";
    		$response['RESULT'] = array("uuid"=>$user['uuid'],"pic"=>$user['pic'],"name"=>$user['name'],"good"=>$good,"bad"=>$bad);
    		$this->ajaxReturn($response);
	    	
    }
    
    /**
     * 修改用户名字
     * @param name
     * 调用地址：/lookup/index.php/Home/User/modifyName
     * @return {"STATUS":"error|success","ERRMSG":"参数错误|未找到该用户","RESULT":["pic":sss,"name":sss]}
     */
    public function modifyName(){
	    	$uuid = $this->validate();
	    	if(empty($uuid)){
	    		$response['STATUS'] = "error";
	    		$response['ERRMSG'] = "请重新登录";
	    		$response['RESULT'] = array();
	    		$this->ajaxReturn($response);
	    	}
	    	
	    	$name = I('param.name/s');
	    	if(empty($name)){
	    		$response['STATUS'] = "error";
	    		$response['ERRMSG'] = "参数错误";
	    		$response['RESULT'] = array();
	    		$this->ajaxReturn($response);
	    	}
	    	$user=M('user')->where("uuid='$uuid'")->find();
	    	if(empty($user)){
	    		$response['STATUS'] = "error";
	    		$response['ERRMSG'] = "未找到该用户";
	    		$response['RESULT'] = array();
	    		$this->ajaxReturn($response);
	    	}else{
	    		$user['name']=$name;
	    		M('user')->save($user);
	    		$response['STATUS'] = "success";
	    		$response['ERRMSG'] = "";
	    		$response['RESULT'] = array("pic"=>$user['pic'],"name"=>$user['name']);
	    		$this->ajaxReturn($response);
	    	}
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
    
    public function test(){
    	//     		$_SESSION['iuu']='nihao ';
    	//     		session('ss',"s",array("expire"=>100));
    	dump($_SESSION);
    }
}
