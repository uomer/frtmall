<?php
header("Content-type:text/html; charset=gbk");
require("../mydb_class.php");
define('TABLE','frtm_reg');
date_default_timezone_set("Asia/Shanghai");
function clearCookies() {
	setcookie('admin');
}
if (!isset($_COOKIE['admin']) && !$_POST){
	?>
	<div>
		<form name="login" method="post" action="">
			管理员：<input type="text" name="admin" size="24" /><br />
			密&nbsp;码：<input type="password" name="passwd" size="24" />
			<input type="submit" name="submit" value="登录" />
		</form>
	</div>
	<?php
	exit();
}
$re = $db->select("select name,sex,tel,weixin,address,home,area,regtime from ".TABLE." order by id desc limit 0,20");
?>
<table border="1px" cellspacing="0" cellpadding="5px">
	<tr>
		<th>姓名</th>
		<th>性别</th>
		<th>手机</th>
		<th>微信</th>
		<th>地址</th>
		<th>新房</th>
		<th>面积</th>
		<th>注册时间</th>
	</tr>
	<?php
if ($re != false){
	foreach ($re as $n){ ?>
	<tr>
	<?php foreach ($n as $k => $v){
	if ($k == 'sex') {
		if ($v == '0') {
			$v = '男';
		}else if ($v == '1') {
			$v = '女';
		}
	}
	if ($k == 'home') {
		if ($v == '1') {
			$v = '现房';
		}else if ($v == '0') {
			$v = '未交';
		}
	}
	if ($k == 'regtime') {
		$v = date('Y-m-d H:i:s',$v);
	}?>
		<td><?php echo $v; ?></td>
	<?php } ?>
	</tr>
	<?php }
}	?>
</table>