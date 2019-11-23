<?php
namespace Home\Controller;
use Think\Controller;
/**
 * 微博管理控制器
 */

Class WeiboController extends Controller {

	public function index () {
		$where = array('isturn' => 0);
		$count = M('weibo')->where($where)->count();
		$page = new \Think\Page($count,20);
		$limit = $page->firstRow . ',' . $page->listRows;

		$weibo = D('WeiboView')->where($where)->limit($limit)->order('time DESC')->select();
		$this->weibo = $weibo;
		$this->page = $page->show();
		$this->display();
	}

	/**
	 * 删除微博
	 */
	Public function delWeibo () {
		$id = intval(I('get.id'));
		$uid = intval(I('get.uid'));

		//删除微博
		if (D('WeiboRelation')->relation(true)->delete($id)) {
			//用户发布的微博数减一
			M('userinfo')->where(array('uid' => $uid))->setDec('weibo');
				$this->success('删除成功', U('index'));
		} else {
			$this->error('删除失败,请重试...');
		}
	}

		/**
		 * 转发微博列表
		 */
		Public function turn () {
			$where = array('isturn' => array('GT',0));
			$count = M('weibo')->where($where)->count();
			$page = new \Think\Page($count, 20);
			$limit = $page->firstRow . ',' . $page->listRows;

			$db = D('weibo');
			unset($db->viewFields['picture']);
			$turn = $db->where($where)->limit($limit)->order('time DESC')->select();
			$this->turn = $turn;
			$this->page = $page->show();
			$this->display();
		}

	/**
	 *微博检索
	 */
	Public function sechWeibo () {
		if (isset($_GET['sech'])) {
			$where = array('content' => array('LIKE', '%' . I('get.sech') . '%'));
			$weibo-> D('WeiboView')->where($where)->order('time DESC')->select();
			$this->weibo = $weibo ? $weibo : false;
		}
		$this->display();
	}

	/**
	 * 评论列表
	 */
	Public function comment () {
			$count = M('comment')->count();
			$page = new \Think\Page($count, 20);
			$limit = $page->firstRow . ',' . $page->listRows;

			$comment = D('weibo')->limit($limit)->order('time DESC')->select();
			$this->comment = $comment;
			$this->page = $page->show();
			$this->display();
	}

	//删除评论
	Public function delComment () {
		$id = intval(I('get.id'));
		$wid = intval(I('get.wid'));
	
	if (M('comment')->delete($id)) {
		//用户评论的微博数减一
		M('comment')->where(array('uid' => $uid))->setDec('comment');
			$this->success('删除成功', $_SERVER['HTTP_REFERER']);
	} else {
		$this->error('删除失败,请重试...');
	}
}
	/**
	 * 评论检索
	 */
	Public function sechComment () {
		if (isset($_GET['sech'])) {
			$where = array('content' => array('LIKE', '%' . I('get.sech') . '%'));
			$weibo-> D('CommentView')->where($where)->order('time DESC')->select();
			$this->comment = $comment ? $comment : false;
		}
		$this->display();
	}
}