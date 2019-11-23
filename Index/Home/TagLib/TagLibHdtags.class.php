<?php 
/**
* 自定义标签库文件
*/
namespace Home\TagLib;

use Think\Template\TagLib; // Template目录下的TagLib.class.php文件


Class TagLibHdtags extends TagLib {

	Protected $tags = array(
		'userinfo' => array('attr' => 'id','close' => 1),
		'maybe' => array('attr' => 'uid','close' => 1)
	);

	/**
	 * 读取用户信息标签
	 * @param  [type] $attr    [description]
	 * @param  [type] $content [description]
	 * @return [type]          [description]
	 */
	Public function _userinfo ($attr, $content) {
		$id = $attr['id'];
		
		$str = '';
		$str .= '<?php ';
		$str .= '$where = array("uid" => ' . $id . ');';
		$str .= '$field = array("username", "face80" => "face", "follow", "fans", "weibo", "uid");';
		$str .= '$userinfo = M("userinfo")->where($where)->field($field)->find();';
		$str .= 'extract($userinfo);';
		$str .= '?>';
		$str .= $content;

		return $str;
	}

	
	Public function _maybe ($attr, $content) {
		$uid = $attr['uid'];
		$str = '';
		$str .= '<?php ';
		$str .= '$uid = ' . $uid . ';';
		$str .= '$db = M("follow");';
		$str .= '$where = array("fans" => $uid);';
		$str .= '$follow = $db->where($where)->field("follow")->select();';
		$str .= 'foreach ($follow as $k => $v) :';
		$str .= '$follow[$k] = $v["follow"];';
		$str .= 'endforeach;';
		$str .= '$sql = "SELECT `uid`,`username`,`face50` AS `face`,COUNT(f.`follow`) AS `count` FROM `hd_follow` f LEFT JOIN `hd_userinfo` u ON f.`follow` = u.`uid` WHERE f.`fans` IN (" . implode(\',\', $follow) . ") AND f.`follow` NOT IN (" . implode(\',\',$follow) . ") AND f.`follow` <>" . session("uid") . " GROUP BY f.`follow` ORDER BY `count` DESC LIMIT 4";';
		$str .= '$friend = $db->query($sql);';
		$str .= 'foreach ($friend as $v) :';
		$str .= 'extract($v);?>';
		$str .= $content;
		$str .= '<?php endforeach;?>';
		
		return $str;
	}
}
?>