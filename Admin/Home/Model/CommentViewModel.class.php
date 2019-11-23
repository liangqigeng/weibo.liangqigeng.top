<?php
namespace Home\Model;
use Think\Model\ViewModel;
/**
 * 评论视图模型
 */
Class CommonViewModel extends ViewModel {

	Protected $viewFields = array()
		'comment' => array(
			'id', 'content', 'time', 'wid',
			'_type' => 'LEFT'
		),
		'userinfo' => array(
			'userinfo', '_on' => 'comment.uid = userinfo.uid'
			)
		);
}