<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>微博用户列表</title>
	<link rel="stylesheet" href="/Admin/Home/View/default/Public/Css/common.css" />
	<script type="text/javascript" src='/Admin/Home/View/default/Public/Js/jquery-1.8.2.min.js'></script>
	<script type="text/javascript" src='/Admin/Home/View/default/Public/Js/common.js'></script>
</head>
<body>
	<div class='status'>
		<span>评论检索</span>
	</div>
	<div style='width:600px;text-align:center;margin : 20px auto;'>
		<form action="/admin.php/Home/Weibo/sechComment" method='get'>
			检索关键字：
			<input type="text" name='sech'/>
			<input type="submit" value='' class='see'/>
		</form>
	</div>
	<table class="table">
		<?php if(isset($comment) && !$comment): ?><tr>
				<td align='center'>没有检索到相关的评论</td>
			</tr>
		<?php else: ?>
			<tr>
				<th>ID</th>
				<th>评论内容</th>
				<th>评论用户</th>
				<th>评论时间</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($comment)): foreach($comment as $key=>$v): ?><tr>
					<td width='50' align='center'><?php echo ($v["id"]); ?></td>
					<td><?php echo ($v["content"]); ?></td>
					<td width='100'><?php echo ($v["username"]); ?></td>
					<td width='100' align='center'><?php echo (date('y-m-d H:i', $v["time"])); ?></td>
					<td width='60'>
						<a href="<?php echo U('delComment', array('id' => $v['id'], 'wid' => $v['wid']));?>" class='del'></a>
					</td>
				</tr><?php endforeach; endif; endif; ?>
	</table>
</body>
</html>