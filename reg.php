<?php
header("Content-type:text/html; charset=gbk");
?>
<html>
<head>
<meta http-equiv="refresh" 
content="10;url=http://
www.frtmall.com">
</head>
<body>
<?php
require("mydb_class.php");
define('TABLE','frtm_reg');
date_default_timezone_set("Asia/Shanghai");
$stt = <<< STT
	<div id="count" style="text-align:center;height=50px;line-height:50px;font-size:12px;"></div>
<script type="text/javascript">
var cout = document.getElementById("count");
var i = 9;
function ts(){
	cout.innerHTML = i+"秒后返回！";
	i--;
	if(i < 1){
		clearInterval(tt)
	}
}
var tt = self.setInterval("ts()",1000);
</script>
STT;
$userName = isset($_POST['userName'])?$_POST['userName']:'';
$sex = isset($_POST['sex'])?$_POST['sex']:'';
$tel = isset($_POST['tel'])?$_POST['tel']:'';
$weiXin = isset($_POST['weiXin'])?$_POST['weiXin']:'';
$address = isset($_POST['address'])?$_POST['address']:'';
$homeState = isset($_POST['homeState'])?$_POST['homeState']:'';
$homeArea = isset($_POST['homeArea'])?$_POST['homeArea']:'';

$userName = addslashes($userName);
$sex = addslashes($sex);
$tel = addslashes($tel);
$weiXin = addslashes($weiXin);
$address = addslashes($address);
$homeState = addslashes($homeState);
$homeArea = addslashes($homeArea);
$regtime = time();
if ($tel == ''){
	echo '<div style="text-align:center;margin-top:100px;">报名失败</div>';
	echo $stt;
	exit();
}
if ($db->select("select tel from ".TABLE." where tel = '".$tel."'")){
	echo '<div style="text-align:center;margin-top:100px;">您已报过名了</div>';
	echo $stt;
	exit();
}
$col = "name,sex,tel,weixin,address,home,area,regtime";
$val = '\''.$userName.'\',\''.$sex.'\',\''.$tel.'\',\''.$weiXin.'\',\''.$address.'\','.$homeState.','.$homeArea.','.$regtime;
//echo $col,'<br />';
//echo $val,'<br />';
if ($db->insert(TABLE,$col,$val)){
	echo '<div style="text-align:center;margin-top:100px;">报名成功</div>';
	echo $stt;
}else{
	echo '<div style="text-align:center;margin-top:100px;">报名失败</div>';
	echo $stt;
}