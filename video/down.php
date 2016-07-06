<?php
 include_once('./system/dbConn.php');
  //连接数据库		
  connect();
$vid=$_GET["vid"];
$sqld="select * from videos where vid=$vid";
$rsd=mysql_query($sqld) or die('查询1失败！'.mysql_error());   
$rowd=mysql_fetch_assoc($rsd);
//更新下载量
$down=$rowd["downtimes"];
$down++;
$sqld2="update videos set downtimes=$down where vid=$vid";
mysql_query($sqld2) or die('查询2失败！'.mysql_error());   
//为下载文件重命名
$arr=explode(".",$rowd["address"]);
$hz=$arr[count($arr)-1];
$videoname=$rowd["videoname"].".".$hz;
//下载文件
header("Content-Transfer-Encoding:binary");
header("Content-Disposition:attachment;filename=$videoname");
ob_clean();
flush();
readfile($rowd["address"]);
?>