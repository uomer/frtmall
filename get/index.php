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
			����Ա��<input type="text" name="admin" size="24" /><br />
			��&nbsp;�룺<input type="password" name="passwd" size="24" />
			<input type="submit" name="submit" value="��¼" />
		</form>
	</div>
	<?php
	exit();
}
$re = $db->select("select name,sex,tel,weixin,address,home,area,regtime from ".TABLE." order by id desc limit 0,20");
?>
<table border="1px" cellspacing="0" cellpadding="5px">
	<tr>
		<th>����</th>
		<th>�Ա�</th>
		<th>�ֻ�</th>
		<th>΢��</th>
		<th>��ַ</th>
		<th>�·�</th>
		<th>���</th>
		<th>ע��ʱ��</th>
	</tr>
	<?php
if ($re != false){
	foreach ($re as $n){ ?>
	<tr>
	<?php foreach ($n as $k => $v){
	if ($k == 'sex') {
		if ($v == '0') {
			$v = '��';
		}else if ($v == '1') {
			$v = 'Ů';
		}
	}
	if ($k == 'home') {
		if ($v == '1') {
			$v = '�ַ�';
		}else if ($v == '0') {
			$v = 'δ��';
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