<?php
	require_once('template/header.php');
	
	session_start();
    $row=$_SESSION['row']; 
	if (!isset($_SESSION["row"])){
		header("location:./login.php");
	}
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
	$sql="select uid from users";
	$sqltool=new SqlTool();
	$rs=$sqltool->execute_dql($sql);
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
				<h1> 用户管理 </h1>
			</div>
			<div class="col-lg-5" style="margin-top:25px;">
				<form class="form-horizontal" action="search.php" method="POST">
					<label><input class="form-control" type="text" name="vname" value=""/></label>
					<label><input class="btn btn-default" type="submit" value="搜索用户" /></label>
				</form>
			</div>
		</div>
		
		<hr/>
		<div class="col-md-12">
			<table class="table table-bordered table-striped">
				<tr>
					<th width="10%">用户编号</th>
					<th width="10%">用户名</th>
					<th width="10%">性别</th>
					<th width="10%">生日</th>
					<th width="10%">学历</th>
					<th width="10%">爱好</th>
					<th width="10%">头像</th>
					<th width="10%">操作</th>
					<th width="10%">密码修改</th>
				</tr>
				<?php
					$sql1="select * from users limit $start,$rowsperpage";
					$result1=$sqlrun->execute_dql($sql1);
					while($row=mysql_fetch_assoc($result1))
					{
				?>
				<tr>
					<td><?php  echo $row["uid"]; ?></td>
					<td><?php  echo $row["uname"]; ?></td>
					<td> 
						<?php  
							if($row["gender"]==0)
								echo "男"; 
							else
								echo "女";
						?>
					</td>
					<td><?php  echo $row["birthdate"]; ?></td>
					<td>
						<?php  
							switch ($row["degree"]) {
								case '1':	
									echo "高中";
									break;
								case '2':	
									echo "大学";
									break;
								case '3':	
									echo "硕士生";
									break;
								case '4':	
									echo "博士生";
									break;
								default:
									echo "未选择学历";
									break;
							}
						?>
					</td>
					<td><?php  echo $row["hobby"]; ?></td>
					<td><img src="./images/<?php echo $row['pic'];?>" width="60" height="60" ></td>
					<td>
						<a href="userEdit.php?uid=<?php echo $row['uid'];?>">修改</a>
						<a href="userDelete.php?uid=<?php echo $row['uid'];?>" onclick="return confirm('确认删除吗？')">删除</a>
					</td>
					<td><a href="chpasswd.php?uid=<?php echo $row['uid'];?>" onclick="return confirm('确定要修改密码?')">密码修改</a></td>
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
							echo "  <a href='userList.php?page=1'>首页</a>  ";
							if ($forward>0) {
							  echo "<a href='userList.php?page=$forward'>上一页</a>  ";
							}
							for ($i=1; $i<=$totalpages ;$i++) { 
								echo "  <a href='userList.php?page=$i'>第{$i}页</a>  ";
							}
								if ($next<=$totalpages) {
								   echo "  <a href='userList.php?page=$next'>下一页</a>  ";
							}
								echo "  <a href='userList.php?page=$totalpages'>尾页</a>  ";
						 ?>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<?php require_once 'template/footer.php'; ?>