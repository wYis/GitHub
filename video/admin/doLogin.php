<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>处理管理员登录页面</title>
</head>
<body>
	<?php
		require_once '../system/dbConn.php';
		$adminname=$_POST["uname"];
		$passwd=$_POST["passw"];
		$sql="select * from admins where adminname='$adminname' and passwd=md5('$passwd')";
		$sqltool=new sqlTool();
		$res=$sqltool->execute_dql($sql);
		$row=mysql_fetch_assoc($res);
		//$res=mysql_query($sql,$conn);
		if(!$res){
			die("查询失败".mysql_error());
		}
		$num=mysql_num_rows($res);
		if($num>0){
			session_start();//启动session
    		$_SESSION["row"]=$row;
			//echo "登录成功！2秒钟后将跳转到userList.php页面...";
			header('location:index.php');
			//header("refresh:2;url='userList.php'");
		}else{
			echo "登录失败";
			header("location:index.php?msg=用户名或密码错误");
		}
		/*$mysqli = new mysqli('localhost','root','123','usermng') or die("数据库连接失败！"); 

		if (mysqli_connect_errno()) {
		    printf("Connect failed: %s\n", mysqli_connect_error());
		    exit();
		}
		$result = $mysqli->query("select * from admins where adminname='$adminname' and passwd=md5('$passwd')");
		if(!$result){
			die("查询失败".mysql_error());
		}else{
			echo "查询成功123";
		}

		$result->close();

		$mysqli->query("DROP TABLE Language");

		$mysqli->close();*/
		
	?>
</body>
</html>