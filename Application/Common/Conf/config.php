<?php
return array(
	//'配置项'=>'配置值'
	//数据库配置信息
	'DB_TYPE'   => 'mysql', // 数据库类型
	//'DB_HOST'   => 'qiyidian.mysql.rds.aliyuncs.com',//'123.57.220.225',//'localhost', qiyidian.mysql.rds.aliyuncs.com// 服务器地址
	'DB_HOST' =>'127.0.0.1',
	'DB_NAME'   => 'lookup', // 数据库名
	'DB_USER'   => 'root',//'root', // 用户名 ekola
	'DB_PWD'    => '',//'yq23lyc45j', // 密码 ekola123456
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => '', // 数据库表前缀
	'DB_CHARSET'=> 'utf8', // 字符集
	'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
	'TMPL_ENGINE_TYPE' =>'PHP',
	'DEFAULT_THEME'    =>    'default',
	'URL_MODEL' => 1,
	//配置模板后缀
	'TMPL_TEMPLATE_SUFFIX'=>'.php',
	 'SESSION_EXPIRE'=>'259200',
);