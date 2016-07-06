 <!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>处理用户注册的页面</title>
</head>
<body>
<?php
	require_once './system/dbConn.php';
	$uname=$_POST["username"];
	$passwd=$_POST["password"];
	$gender=$_POST["gender"];
	$birth=$_POST["birth"];
	$hobby=implode(",",$_POST["hobby"]);
	$degree=$_POST["degree"];
	$intro=$_POST["intro"];

	
	if($_FILES['pic']['error']>0){
		switch ($_FILES['pic']['error']) {
			case '1': die("文件尺寸超过了配置文件的最大值");
				break;
			case '3': die("部分文件上传");
				break;
			case '4': die("未选择上传文件");
				break;
			default: die("未知错误");
		}
	}
	$filepath="./admin/images/";
	$randname=date("Ymdhis").rand(100,999);
	$hz=substr($_FILES["pic"]["name"],strrpos($_FILES["pic"]["name"],"."));
	$allowtype=array('jpg','jpeg','png','gif','bmp');
	if(in_array($hz, $allowtype)){
		die("不是允许的图片类型！");
	}
	$sqltool=new sqlTool();
	$sql="select * from users where uname='$uname'";
	$num=$sqltool->execute_dql($sql);
	if(!isset($num)){
		echo "用户名以存在";
		header("refresh:3;url='userReg.html'");
	}else{
		$pic=$randname.$hz;
		$sql="insert into users values(null,'$uname',md5('$passwd'),'$gender','$birth','$hobby','$degree','$intro','$pic')";
		$res=$sqltool->execute_dql($sql);
		if($res){
			$pic=$filepath.$randname.$hz;
			move_uploaded_file($_FILES["pic"]["tmp_name"],$pic);
			header("refresh:3;url='index.php'");
		}else{
			header("refresh:3;url='userReg.html'");
			echo "注册用户失败";
		}
	}
?> 
</body>
</html>