<?php
namespace Home\Controller;
use Think\Controller;
/**
 * 后台登录控制器
 */
class LoginController extends Controller {

	/**
	 * 登录页面视图
	 */
	Public function index () {
		$this->display();
	}
   
   /**
    * 登录操作处理
    */
   Public function login () {
   	if (!IS_POST) {
   		E('页面不存在');
   	}
   	if (!isset($_POST['submit'])) {
   		return false;
   	}

   	//验证码对比
	$code = I('post.verify');
	$verify = new \Think\Verify();
	if(!$verify -> check($code,1)) {
		$this->error('验证码错误');
	}

	$name = I('post.uname');
	$pwd = md5(I('post.pwd'));
	$db = M('admin');
	$user = $db->where(array('username' => $name))->find();
	
	if (!user || $user['password'] !=$pwd) {
		$this->error('账号或密码错误');
	}

	$data = array(
		'id' => $user['id'],
		'logintime' => time(),
		'loginip' => get_client_ip()
	);
	$db->save($data);

	session('uid', $user['id']);
	session('username', $user['username']);
	session('logintime', date('Y-m-d:i', $user['logintime']));
	session('now', date('Y-m-d H:i', time()));
	session('loginip', $user['loginip']);
	session('admin', $user['admin']);
	$this->success('正在登录...',__APP__);

}

   /**
	 * 生成验证码
	 */
	Public function verify () {
		$config = array (
			'length' => 4,
		);
		$verify = new \Think\Verify ($config);
		$verify -> entry (1);
	}

}