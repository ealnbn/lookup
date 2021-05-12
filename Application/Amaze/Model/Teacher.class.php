<?php 
namespace Amaze\Teacher;
use Think\Model;

class Teacher extends Model{
	protected $pk = 'id';
	protected $_validate = array(
			array('name','require','教师姓名为空'), //默认情况下用正则进行验证
			array('level','number','教师等级为空'),
			array('gen','number','性别为空'),
			array('school','require','毕业学校为空'),
			//array('pic','require','头像为空'),
			array('profile','require','教师简介为空'),
			array('addr','require','地址为空'),
			array('order_flag','number','排序为空'),
			array('belong','number','是否属于机构为空'),
			array('lesson_age','number','教龄为空'),
			array('subject','require','教学科目为空'),
			array('type','require','授课类型为空')
	);
}

?>