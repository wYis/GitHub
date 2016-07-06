<?php
	$vname=$_POST["vname"];
	$vhobby=implode(",",$_POST["vhobby"]);
	$vintro=$_POST["vintro"];
	$vclass=$_POST["vclass"];
	$vid=$_POST['vid'];

	$conn=mysql_connect('localhost','root','123');
	mysql_select_db('neuvideo');
	mysql_query('set names utf8');
	if($_FILES['pic']['error']==0){
		$filepath="./images/";
		$randname=date("Ymdhis").rand(100,999);
		$hz=substr($_FILES["pic"]["name"],strrpos($_FILES["pic"]["name"],"."));
		$allowtype=array('jpg','jpeg','png','gif','bmp');
		if(in_array($hz, $allowtype)){
			die("不是允许的图片类型！");
		}
		$pic=$randname.$hz;
		$sql="update videos set videoname='$vname',tid='$vclass',pic='$pic',intro='$vintro' WHERE vid=$vid";
	}else{
		$sql="update videos set videoname='$vname',tid='$vclass',intro='$vintro' WHERE vid=$vid";
	}
	$res=mysql_query($sql,$conn);
	if($res){
		echo "用户更新成功";
		$pic=$filepath.$randname.$hz;
		move_uploaded_file($_FILES["pic"]["tmp_name"],$pic);
		header("location:videoList.php");
	}else{
		echo "用户更新失败";
		header("refresh:3;url='videoEdit.php'");
	}
	
?> 