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
		<span>修改密码</span>
	</div>
	<form action="<?php echo U('runEditPwd');?>" method='post'>
		<table class="table">
			<tr>
				<td width='45%' align='right'>旧密码：</td>
				<td>
					<input type="password" name='old'/>
				</td>
			</tr>
			<tr>
				<td align='right'>新密码：</td>
				<td>
					<input type="password" name='pwd'/>
				</td>
			</tr>
			<tr>
				<td align='right'>确认密码：</td>
				<td>
					<input type="password" name='pwded'/>
				</td>
			</tr>
			<tr>
				<td colspan='2'>
					<input type="submit" value='保存修改' class='big-btn'/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>