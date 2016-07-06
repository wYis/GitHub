<?php
	require_once '../system/dbConn.php';
	//$db=new dbConn();
	class SqlTool{

		//执行dql语句
		public function execute_dql($sql){
			$res=mysql_query($sql,connect()) or die(mysql_error());
			return $res;
		}

		//执行dql语句，但返回的是一个数组
		public function execute_dql2($sql){
			$arr=array();
			$res=mysql_query($sql,connect()) or die(mysql_error());
			//把$res中得到的结果集放进$arr数组中
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
		}
	}
?>