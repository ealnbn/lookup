<?php
namespace Amaze\Controller;
use Think\Controller;
use Think\Model;
class IndexController extends Controller{
	
	
	/**
	 * 魔术方法，设置默认处理机制
	 * @param String $method
	 * @param String $args
	 */
	public function __call($method, $args){
		if (method_exists('IndexController', $method)){
			$this->$method;
		}else{
			$response['STATUS'] = "error";
			$response['ERRMSG'] = "no method";
			$response['RESULT'] = array();
			$this->ajaxReturn($response);
		}
	}
	
	public function index(){
		$num = cookie("demontf");//秘钥
		$user = cookie("ekola");//用户名
		if(empty($num) ||  empty($user)){
			$this->theme('admin')->display('login');return;
		}else{
			if(abs($user-$num)!=5){
				$this->theme('admin')->display('login'); return;
			}
		}
		$this->theme('admin')->display('admin-index');
	}
	
	public function login(){
		$num = cookie("demontf");//秘钥
		$user = cookie("ekola");//用户名
		if(empty($num) ||  empty($user)){
			$this->theme('admin')->display('login');
		}else{
			if(abs($user-$num)!=5){
				$this->theme('admin')->display('login');
			}else{
				$this->success("登录成功",U('Index/index'));
			}
		}
	}
	
	
	public function log_in(){
		$username = I('param.username');
		$password = I('param.password');
		if(!empty($username) && !empty($password)){
			
			$M = M('sysadmin');
			$res = $M->where(array("name"=>$username,"psw"=>md5($password)))->find();
			if(empty($res)){
				$this->theme('admin')->display('login');return;
			}else{
				$r=rand();
				$user['type']=$res['type'];
				$user['realname']=$res['realname'];
				$user['id']=$res['id'];
				cookie("ekola",$r,array('expire'=>3600 * 24 ,'path'=>'/'));
				cookie("user",$user,array('expire'=>3600 * 24 ,'path'=>'/'));
				if($r>100){
					cookie("demontf",$r+5,array('expire'=>3600 * 24 ,'path'=>'/'));
				}else{
					cookie("demontf",$r-5,array('expire'=>3600 * 24 ,'path'=>'/'));
				}
				$res['lasttime']=date("Y-m-d H:i:s");
				$res['ip'] = $_SERVER["REMOTE_ADDR"];
				$M->save($res);
				$this->success("登录成功",U('Index/index'));return ;
			}
		}
		$this->theme('admin')->display('login');
	}
	
	/**
	 *  注销用户
	 */
	public function logout(){
		cookie('demontf',null);
		cookie('ekola',null);
		cookie('user',null);
		$this->theme('admin')->display('login');
	}
	

}
?>
