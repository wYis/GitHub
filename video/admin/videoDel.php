<?php
	if(!empty($_GET['vid'])){
		$vid = $_GET['vid'];
		require_once '../system/dbConn.php';
    	$sqlrun = new sqlTool();
    	$sql = "select pic from videos where vid=$vid";
    	$res = $sqlrun -> execute_dql1($sql);
    	$file = './images/'.$res['pic'];
    	$sql = "delete from videos where vid=$vid";
    	$res = $sqlrun -> execute_dql($sql);
    	//删除文件
    	$del = @unlink($file);
    	if($res == true and $del == true){   		
    		echo "<script>alert('删除成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";	
    	}else{
    		echo "<script>alert('删除失败');</script>";
    	}
	}
?>