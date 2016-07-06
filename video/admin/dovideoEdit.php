 <!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>处理用户注册的页面</title>
</head>
<body>
<?php
	session_start();
    if (!isset($_SESSION["row"])){
        header("location:./login.php");
    }
	$vname=$_POST["vname"];
//	$vhobby=implode(",",$_POST["vhobby"]);
	$vintro=$_POST["vintro"];
	$vclass=$_POST["vclass"];
	$vuid=$_POST["uid"];
	if($_FILES['vpic']['error']>0){
		switch ($_FILES['vpic']['error']) {
			case '1': die("文件尺寸超过了配置文件的最大值");
				break;
			case '3': die("部分文件上传");
				break;
			case '4': die("未选择上传文件");
				break;
			default: die("未知错误");
		}
	}
	$filepath="./images/";
	$randname=date("Ymdhis").rand(100,999);
	$hz=substr($_FILES["vpic"]["name"],strrpos($_FILES["vpic"]["name"],"."));
	$allowtype=array('jpg','jpeg','png','gif','bmp');
	if(in_array($hz, $allowtype)){
		die("不是允许的图片类型！");
	}
	$pic=$randname.$hz;
	$conn=mysql_connect('localhost','root','123');
	mysql_select_db('neuvideo',$conn);
	mysql_query('set names utf8');
	$sql="select * from videos where videoname='$vname'";
	$res=mysql_query($sql,$conn);
	$num=mysql_num_rows($res);
	if($num>0){
		echo "用户名以存在";
		header("refresh:3;url='userReg.html'");
	}else{
		$tim=date('Y-m-d H:i:s');
		$sql="insert into videos (vid,videoname,tid,intro,pic,uploaddate,uploadadmin) values(null,'$vname','$vclass','$vintro','$pic','$tim','$vuid')";
		$res=mysql_query($sql,$conn);
		if($res){
			$pic=$filepath.$randname.$hz;
			move_uploaded_file($_FILES["vpic"]["tmp_name"],$pic);
			header("location:videoList.php");
		}else{
			echo "添加失败";
			header("refresh:3;url='videoEdit.php'");
		}
	}
?> 
</body>
</html>