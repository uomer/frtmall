<?php
/**
数据类：对数据库的操作类。

**/
class mydb {
	//只能内部调用的数据连接方法
	static private function connect(){
		return new mysqli("localhost","root","111111","frtm");
	}
	
	public function select($sql){
		$db = self::connect();
		$db->query('set names gbk');
		$re = $db->query($sql);
		$array = array();
		while($row = $re->fetch_assoc()){
			$array[]=$row;
		}
		$db->close();
		if (count($array) > 0){
			return $array;
		}else{
			return false;
		}
	}
	public function insert($tab,$col,$val){
		$db = self::connect();
		$db->query('set names gbk');
		$sql = 'insert into '.$tab.' ('.$col.') values ('.$val.')';
		//echo $sql;
		$bool = $db->query($sql);
		$db->error;
		$db->close();
		if ($bool == true){
			return $bool;
		}else{
			echo '没有成功操作...<br />';
			
			return false;
		}
	}
	public function query($sql) {
		$db = self::connect();
		$db->query('set names gbk');
		$bool = $db->query($sql);
		$db->close();
		if ($bool == true){
			return $bool;
		}else{
			echo '没有成功操作...<br />';
		}
	}
	public function del($tab,$whe){
		$db = self::connect();
		$db->query('set names gbk');
		$sql = "delete from {$tab} {$whe}";
		$bool = $db->query($sql);
		if ($bool == true){
			return $bool;
		}else{
			echo '没有成功操作...<br />';
		}
	}
	public function update($tab,$cols,$vals,$whe) {
		$db = self::connect();
		$db->query('set names gbk');
		$set = '';
		for ($i=0; $i < count($cols); $i++) {
			$set .="{$cols[$i]}={$vals[$i]}";
			if ($i < count($cols) - 1){
				$set .= ',';
			}
		}
		$sql = "update {$tab} set {$set} {$whe}";
		//echo $sql;
		$bool = $db->query($sql);
		$db->close();
		return $bool;
	}
}
$db = new mydb();
