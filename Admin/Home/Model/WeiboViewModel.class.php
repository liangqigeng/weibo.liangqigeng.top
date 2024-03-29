<?php
namespace Home\Model;
use \Think\Model\ViewModel;
/**
 * 微博视图模型
 */
Class WeiboViewModel extends ViewModel {

	Public $viewFields = array(
		'weibo' => array(
			'id','content`','isturn','time','turn', 'keep', 'comment',
			'_type' => 'LEFT'
		),
		'picture' => array(
			'max' => 'pic',
			'_on' => 'weibo.id = picture.wid',
			'_type' => 'LEFT'
		),
		'userinfo' => array(
			'username', '_on' => 'weibo.uid = userinfo.uid'
		)
	);
}