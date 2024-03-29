<?php
namespace Home\Controller;
use Think\Controller;
/**
 * 用户管理控制器
 */
Class UserController extends Controller {

	/**
	 * 微博用户列表
	 */
	public function index () {
		$count = M('user')->count();
		$page = new \Think\Page($count, 20);
		$limit = $page->firstRow . ',' . $page->listRows;

		$this->users = D('UserView')->limit($limit)->select();
		$this->page = $page->show();
		$this->display();
	}

	/**
	 * 锁定用户
	 */
	Public function lockUser () {
		$data = array(
			'id' => intval('get.id'),
			'lock' => intval('get.lock')
		);
			$msg = $data['lock'] ? '锁定' : '解锁';
			if (M('user')->save($data)) {
				$this->success($msg . '成功', U('index'));
			} else {
				$this->error($msg . '失败,请重试...');
			}
	}

	/**
	 * 微博用户检索
	 */
	Public function sechUser () {
		if (isset($_GET['sech']) && isset($_GET['type'])) {
			$where = $_GET['type'] ? array('id' => intval(I('get.sech'))) : array('username' => array('LIKE', '%' . I('get.sech') . '%'));
			$user = D('UserView')->where($where)->select();
			$this->user = $user ? $user : false;
		}
		$this->display();
	}

	/**
	 * 后台管理员列表
	 */
	Public function admin () {
		$this->admin = M('admin')->select();
		$this->display();
	}

	/**
	 * 添加后台管理员
	 */
	Public function addAdmin () {
		$this->display();
	}

	/**
	 * 锁定后台管理员
	 */
	Public function lockAdmin () {
		$data = array(
		'id' => intval('get.id'),
		'lock' => intval('get.lock')
		);

		$msg = $data['lock'] ? '镇定' : '解锁';
		if (M('admin')->save($data)) {
			$this->success($msg . '成功'. U('admin'));
		} else {
			$this->error($msg . '失败,请重试...');
		}
	}

	/**
	 * 删除后台管理员
	 */
	Public function delAdmin () {
		$id = intval(I('get.id'));

		if (M('admin')->delete($id)) {
			$this->success('删除成功', U('admin'));
		} else {
			$this->error('删除失败,请重试...');
		}
	}

	/**
	 * 执行添加管理员操作
	 */
	Public function runAddAdmin () {
		if ($_POST['pwd'] != $_POST['pwded']) {
			$this->error('两次密码不一致');
		}

		$data = array(
			'username' => I('post.username'),
			'password' => md5(I('post.pwd')),
			'logintime' => time(),
			'loginip' => get_client_ip(),
			'admin' => intval(I('post.admin'))
			);
			
		if (M('admin')->data($data)->add()) {
			$this->success('添加成功', U('admin'));
		} else {
			$this->error('添加失败,请重试...');
		}
	}

	/**
	 * 修改密码视图
	 */
	Public function editPwd () {
		$this->display();
	}

	/**
	 * 修改密码操作
	 */
	Public function runEditPwd () {
		$db = M('admin');
		$old = $db->where(array('id' => session('uid')))->getField('password');

		if ($old != md5($_POST['old'])) {
			$this->error('旧密码错误');
		}

		if ($_POST['pwd'] != $_POST['pwded']) {
			$this->error('两次密码不一致');
		}

		$data = array(
			'id' => session('uid'),
			'password' => md5(I('post.pwd'))
		);

		if ($db->save($data)) {
			$this->success('修改成功', U('Index/copy'));
		} else {
			$this->error('修改失败,请重试...');
		}
	}
}