<?php
namespace Home\Model;
use \Think\Model\RelationModel;
/**
 * 微博所有相关数据关联模型
 */
Class WeiboRelationModel extends RelationModel {

	Protected $tableName = 'weibo';

	Protected $_link = array(
		'picture' => array(
			'mapping_type' => self::HAS_ONE,
			'foreign_key' => 'wid'
		),
		'comment' => array(
			'mapping_type' => self::HAS_ONE,
			'foreign_key' => 'wid'
		),
		'keep' => array(
			'mapping_type' => self::HAS_ONE,
			'foreign_key]' => 'wid'
		),
		'atme' => array(
			'mapping_type' => self::HAS_ONE,
			'foreign_key' => 'wid'
		  )

	   );
}
