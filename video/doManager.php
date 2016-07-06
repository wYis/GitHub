<?php
    session_start();
    $gain = $_SESSION['user'];
    $vid = $_POST['vid'];
    $content = $_POST['content'];
    $uid = $gain['uid'];
    $url = $_POST['url'];
    $url=$url.$vid;
    require_once './system/dbConn.php';
    $sqlrun=new sqlTool();
    $tim=date('Y-m-d H:i:s');
    $sql = "insert into message (cid,content,retime,uid,vid) values(null,'$content','$tim','$uid','$vid')";
    $res=$sqlrun->execute_dml($sql);
    if($res){
		echo "留言成功";
		header("location:$url");
	}else{
		echo "留言失败";
		header("location:$url");
	}
?>