<?php
return array(
	//数据库配置
	'DB_HOST' => '127.0.0.1',	//数据库服务器地址
	'DB_USER' => 'root',	//数据库连接用户名
	'DB_PWD' => '',	//数据库连接密码
	'DB_NAME' => 'weibo', //使用数据库名称
	'DB_PREFIX' => 'hd_',	//数据库表前缀

	'DEFAULT_THEME' => 'default',	//默认主题模版
	'URL_MODEL' => 1,	//默认URL模式使用PATHINFO
	'DB_TYPE' => 'mysql', // 数据库类型
 	'DB_PORT' => 3306, // 端口
	//自定义模板规则
	'TMPL_PARSE_STRING' => array(
		'__PUBLIC__' => __ROOT__ . '/Admin/Home/View/default/Public',
	
	),
);