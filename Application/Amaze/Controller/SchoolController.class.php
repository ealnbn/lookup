<?php
namespace Amaze\Controller;
use Think\Controller;
use Home\Service\ToolService;
use Think\Model;
class SchoolController extends Controller{


	/**
	 * 魔术方法，设置默认处理机制
	 * @param String $method
	 * @param String $args
	 */
	public function __call($method, $args){
		if (method_exists('SchoolController', $method)){
			$this->$method;
		}else{
			$response['STATUS'] = "error";
			$response['ERRMSG'] = "no method";
			$response['RESULT'] = array();
			$this->ajaxReturn($response);
		}
	}



	/**
	 * 加载教师资料
	 * */
	public function listSchool(){
		$M = new Model();
		$query = "select * from school";
		$school= $M->query($query);
		$this->assign("school",$school);
		$this->theme('admin')->display('admin-table');
	}

	//跳转至添加老师页面
	public function toAdd(){
		$this->theme('admin')->display('admin-school');
	}
	
	//新增老师
	public function addSchool(){
	
		$school = I('param.');
	
		$school['createtime']=date("Y-m-d h:i:s");
	
		$res=$school=M('school')->add($school);
		if(!empty($res)){
			$this->success('新增成功', 'listSchool');
		}
		$this->error('新增失败');
	}
	
	//保存修改的老师
	public function updateSchool(){
		$school = I('param.');
		$res=M('school')->where(array("id"=>$school['id']))->save($school);
		if(!empty($res)){
			$this->success('修改成功', 'listSchool');
		}
		$this->error('修改失败');
	}
	
	public function editSchool(){
		$sid = I("param.tid");
		$school = M('school')->where(array("id"=>$sid))->find();
		if(empty($school)){
			$this->error("无法编辑");
		}
		$this->assign("school",$school);
		$this->theme('admin')->display('admin-editSchool');
	}

}
?>
