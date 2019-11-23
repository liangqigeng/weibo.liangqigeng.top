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
		<span>网站设置</span>
	</div>
	<form action="<?php echo U('runEdit');?>" method='post'>
		<table class="table">
			<tr>
				<td width='45%' align='right'>网站名称：</td>
				<td>
					<input type="text" name='webname' value='<?php echo ($config["WEBNAME"]); ?>'/>
				</td>
			</tr>
			<tr>
				<td align='right'>版权信息：</td>
				<td>
					<input type="text" name='copy' class='input-long' value='<?php echo ($config["COPY"]); ?>'/>
				</td>
			</tr>
			<tr>
				<td align='right'>是否开启注册：</td>
				<td height='30'>
					<input type="radio" name='regis_on' value='1' class='radio' <?php if($config["REGIS_ON"]): ?>checked='checked'<?php endif; ?>/>&nbsp;开启&nbsp;&nbsp;
					<input type="radio" name='regis_on' value='0' class='radio'<?php if(!$config["REGIS_ON"]): ?>checked='checked'<?php endif; ?>/>&nbsp;暂停
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