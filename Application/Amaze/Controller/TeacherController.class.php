<?php
namespace Amaze\Controller;
use Think\Controller;
use Home\Service\ToolService;
use Think\Model;
class TeacherController extends Controller{


	/**
	 * 魔术方法，设置默认处理机制
	 * @param String $method
	 * @param String $args
	 */
	public function __call($method, $args){
		if (method_exists('TeacherController', $method)){
			$this->$method;
		}else{
			$response['STATUS'] = "error";
			$response['ERRMSG'] = "no method";
			$response['RESULT'] = array();
			$this->ajaxReturn($response);
		}
	}

	/************************   教师基本信息 start      **************************/


	/**
	 * 加载教师资料
	 * */
	public function listUser(){
		$M = new Model();
		$query = "select t.id,t.major,t.academy,t.good,t.bad,t.name,t.pic,t.school_name,t.description,t.create_time,
    					count(c.examiner) as comment_num
    				    from examiner as t left join comment as c on c.examiner=t.id 
    				    group by t.id order by count(c.examiner)";
		$teacher= $M->query($query);
		$this->assign("teacher",$teacher);
		$this->theme('admin')->display('admin-table');
	}

	/**
	 * 搜索教师
	 * @param flag 0未激活 1激活 －1 默认全部
	 * */
	public function searchTeacher(){
		$M = new Model();
		$key = I("param.key");
		if(empty($key)){
			$this->error("关键词为空");
		}
		$data = $M->field("t.id,t.name,t.status,t.balance,t.virtual_balance,t.pic,t.order_flag,ad.name as admin_name,gr.name as group_name")
		->table('teacher as t,app_teacherinfo_admin as ad,app_teacherinfo_admin_group as gr')
		->where("t.editor = ad.id AND ad.gid=gr.id AND gr.status=1 AND t.name like '%$key%'")->select();
		$this->assign("teacher",$data);
		$this->theme('admin')->display('admin-table');
	}

	//跳转至添加老师页面
	public function toAdd(){
		$school=M('school')->order("create_time desc")->select();
		$this->assign("school",$school);
		$this->theme('admin')->display('admin-teacher');
	}

	//新增老师
	public function addTeacher(){
		
		$Form = M('examiner');
		$teacher = I('param.');
		
		$teacher['createtime']=date("Y-m-d h:i:s");
		$teacher['good']=0;
		$teacher['bad']=0;
		
		$school=M('school')->where(array("id"=>$teacher['school']))->find();
		$teacher['school_name']=$school['name'];
		//图片
		$info = upload();
		if($info){
			$pic = "Uploads/teacher/".$info['pic']['savepath'].$info['pic']['savename'];
		}
		if(empty($pic)){
			$pic = "";
		}
		$teacher['pic']=$pic;
		$res=$Form->add($teacher);
		if(!empty($res)){
			$this->success('新增成功', 'listUser');
		}
		$this->error('新增失败');
	}


	/**
	 * 后台修改用户图片
	 * 调用地址 qiyiquan.com.cn/ekl2/Amaze/Teacher/changeTeachePic
	 * @param $tid
	 *
	 **/
	public function changeTeachePic(){
		
		$tid = I('param.tid_pic');
		if(empty($tid)){
			$this->error('修改失败 tid错误');
		}
		$info = upload();
		if($info){
			$pic = "Uploads/teacher/".$info['pic']['savepath'].$info['pic']['savename'];
		}
		if(empty($pic)){
			$this->error('修改失败 上传失败');
		}

		$teacher_table = M('teacher');
		$teacher['id']=$tid;
		$teacher['pic']=$pic;
		$res = $teacher_table->save($teacher);

		if(empty($res)){
			$this->error('修改失败 保存失败');
		}
		$response['RESULT']=array();
		$response['ERRMSG']="";
		$response['STATUS']="success";
		$this->success('修改成功');
		//图片
	}

	

	//更新老师
	public function updateTeacher(){
		$Form = M('examiner');
		$teacher = $Form->where(array("id"=>I('param.id')))->find();
		if(empty($teacher)){
			$this->error('修改失败');
		}

		$teacher = I('param.');
		$res=$Form->save($teacher);
		if(!empty($res)){
			$this->success('修改成功', 'listUser');
		}
		$this->error('修改失败');
	}

	

	//查询需要编辑的老师
	public function editTeacher(){
		$tid=I('param.tid');
		$teacher_table = M('examiner');
		$teacher_data = $teacher_table->where(array("id"=>$tid))->find();
		if(!empty($teacher_data)){
			$this->assign("teacher",$teacher_data);
			$this->theme('admin')->display('admin-editTeacher');
		}else{
			$this->error('教师不存在');
		}

	}
	/************************   教师基本信息 end     **************************/


	//跳转到添加经历的页面
	public function listComment(){
		$tid=I('param.tid');
		
		$M = new Model();
		$t_e_data = $M->field('u.name, u.pic , c.content,c.good,c.bad,c.create_time,c.id')
					->table('comment as c, user as u')
					->where("examiner=$tid and u.id=c.user")->select();
		$this->assign("list",$t_e_data);
		$this->theme('admin')->display('admin-comment');
	}

	

}
?>
