<?php
function checkRight(){
	$Auth = new \Think\Auth();
	//需要验证的规则列表,支持逗号分隔的权限规则或索引数组
	$name = CONTROLLER_NAME . '/' . ACTION_NAME;
	//当前用户id
	$user = cookie('user');
	$uid = $user['id'];
	//分类
	$type = CONTROLLER_NAME;
	//执行check的模式
	$mode = 'url';
	//'or' 表示满足任一条规则即通过验证;
	//'and'则表示需满足所有规则才能通过验证
	$relation = 'and';
// 	dump($Auth);
// 	dump($name);
// 	dump($uid);
// 	dump($Auth->check($name, $uid, $type, $mode, $relation));die();
	return $Auth->check($name, $uid, $type, $mode, $relation);
}