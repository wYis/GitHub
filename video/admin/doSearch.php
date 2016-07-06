<?php
	session_start();
    $row=$_SESSION['row']; 
	if (!isset($_SESSION["row"])){
		header("location:./login.php");
	}
	require_once('template/header.php');
	if(empty($_POST['search'])){
		header("location:./videoList.php");
	}
	$search = $_POST['search'];
    require_once '../system/dbConn.php';
	$sqlrun=new sqlTool();
	
	//当前的页号$page
	if (!isset($_GET["page"])) {
		$page=1;
	}else
		$page=$_GET["page"];
	//每页显示多少条记录$rowsperpage
		$rowsperpage=5;
	//总共有多少条记录$totalrows
	$sql="select count(*) from videos where videoname like '%$search%'";
	$rs=$sqlrun->execute_dql($sql);
	if(!$rs)
	{
		die('查询数据库失败：'.mysql_error());
	}
	$totalrows=mysql_num_rows($rs);
	//总共分多少页$totalpages
	if ($totalrows%$rowsperpage==0) {
		$totalpages=$totalrows/$rowsperpage;
	}else
		$totalpages=ceil($totalrows/$rowsperpage);
	//每页的起始记录$start
		$start=($page-1)*$rowsperpage;
	require_once('template/top.php');
	require_once('template/menu.php');
?>
<div id="content">
	<div class="inner" style="min-height: 500px;">
		<div class="row">
			<div class="col-lg-7">
				<h1> 视频搜索结果 </h1>
			</div>
			<div class="col-lg-5" style="margin-top:25px;">
				<form class="form-horizontal" action="doSearch.php" method="POST">
					<label><input class="form-control" type="text" name="search" value=""/></label>
					<label><input class="btn btn-default" type="submit" value="搜索视频" /></label>
				</form>
			</div>
		</div>
		
		<hr/>
		<div class="col-md-12">
			<table class="table table-bordered table-striped">
				<tr>
					<th width="10%">视频ID</th>
					<th width="10%">视频名</th>
					<th width="10%">视频类别</th>
					<th width="10%">视频介绍</th>
					<th width="10%">视频图片</th>
					<th width="10%">修改视频信息</th>
					<th width="10%">删除视频</th>
				</tr>
				<?php
					$sql1="select * from videos where videoname like '%$search%' limit 0,4;";
					$result1=$sqlrun->execute_dql($sql1);
					while($row=mysql_fetch_assoc($result1))
					{
				?>

				<tr>
					<td><?php  echo $row["vid"]; ?></td>
					<td><?php  echo $row["videoname"]; ?></td>
					<td>
						<?php  
							switch ($row["tid"]) {
								case '1':	
									echo "电影";
									break;
								case '2':	
									echo "电视剧";
									break;
								case '3':	
									echo "动漫";
									break;
								case '4':	
									echo "教学视频";
									break;
								default:
									echo "视频类型未选择";
									break;
							}
						?>
					</td>
					<td><?php  echo $row["intro"]; ?></td>
					<td><img src="./images/<?php echo $row['pic'];?>" width="100" height="80" ></td>
					<td>
						<a href="videoEdit.php?vid=<?php echo $row['vid'];?>">修改视频信息</a>
						
					</td>
					<td><a href="videoDel.php?vid=<?php echo $row['vid'];?>" onclick="return confirm('确认删除吗？')">删除视频</a></td>
				</tr>
				<?php
					}
				?>
				<tr>
					<td colspan="9" align="center">
						<?php 
							echo "总共分".$totalpages."页";
							$next=$page+1;
							$forward=$page-1;
							echo "  <a href='videoList.php?page=1'>首页</a>  ";
							if ($forward>0) {
							  echo "<a href='videoList.php?page=$forward'>上一页</a>  ";
							}
							for ($i=1; $i<=$totalpages ;$i++) { 
								echo "  <a href='videoList.php?page=$i'>第{$i}页</a>  ";
							}
								if ($next<=$totalpages) {
								   echo "  <a href='videoList.php?page=$next'>下一页</a>  ";
							}
								echo "  <a href='videoList.php?page=$totalpages'>尾页</a>  ";
						 ?>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<?php require_once 'template/footer.php'; ?>
