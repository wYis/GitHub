<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PWD', '123');
define('DB_CHARSET', 'UTF8');
define('DB_DBNAME', 'neuvideo');
function connect (){ 
//连接mysql
$link=@mysql_connect(DB_HOST,DB_USER,DB_PWD) or die ('数据库连接失败<br/>ERROR '.mysql_errno().':'.mysql_error());
//设置字符集
mysql_set_charset(DB_CHARSET);
//打开指定的数据库
mysql_select_db(DB_DBNAME) or die('指定的数据库打开失败'.mysql_error());
return $link;
}
/*
class dbConn{
	public $conn;
	public $host="localhost";
	public $dbname="neuvideo";
	public $username="root";
	public $passwd="123";

	//连接选择数据库
	public function __construct(){
	$this->conn=mysql_connect($this->host,$this->username,$this->passwd) or die("连接失败".mysql_error());
	mysql_select_db($this->dbname,$this->conn);
	mysql_query("set name utf8");
	}
}*/


	class SqlTool{

		//执行dql语句
		public function execute_dql($sql){
			$res=mysql_query($sql,connect()) or die(mysql_error());
			return $res;
			mysql_free_result($res);
		}

		public function execute_dql1($sql){
			$res=mysql_query($sql,connect()) or die(mysql_error());
			//把$res中得到的结果集放进$arr数组中
			$row=mysql_fetch_assoc($res);
			return $row;
			//释放资源
			mysql_free_result($res);
		}

		//执行dql语句，但返回的是一个数组
		public function execute_dql2($sql){
			$arr=array();
			$res=mysql_query($sql,connect()) or die(mysql_error());
			//把$res中得到的结果集放进$arr数组中
			if(isset($res))
			while($row=mysql_fetch_assoc($res)){
				$arr[]=$row;
			}
			//释放资源
			mysql_free_result($res);
			return $arr;
		}

		public function execute_dml($sql){
			$res=mysql_query($sql,connect()) or die(mysql_error());
			return $res;
			mysql_free_result($res);
		}
	}
 ?>
