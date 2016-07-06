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
	$sql="select * from users";
	
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
				<h1> 添加用户 </h1>
			</div>
			<div class="col-lg-5" style="margin-top:25px;">
				<form class="form-horizontal" action="doSearch.php" method="POST">
					<label><input class="form-control" type="text" name="search" value=""/></label>
					<label><input class="btn btn-default" type="submit" value="搜索用户" /></label>
				</form>
			</div>
		</div>
		<hr/>
		<div class="col-md-12">
			<form class="form-horizontal" action="doUserReg.php" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">用户名：</label>
				<div class="col-sm-10">
					<input type="text"  name="username" required class="form-control" id="name" placeholder="name" required="required"/>
				</div>
			</div>
			<div class="form-group">
				<label for="pwd" class="col-sm-2 control-label">密　码：</label>
				<div class="col-sm-10">
					<input type="password" name="password" class="form-control" id="pwd" placeholder="Password">
				</div>
			</div>
			<div class="form-group">
					<label class="col-sm-2 control-label">生　日：</label>
					<div class="col-sm-10">
						<input type="date" name="birth" class="form-control" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">性　别：</label>
				<div class="col-sm-10">
					<div class="radio">
						<label><input type="radio" id="gender" name="gender" value="0" checked/>男</label>
						<label><input type="radio" id="gender" name="gender" value="1"/>女</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">爱　好：</label>
				<div class="col-sm-10">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="hobby[]" value="旅游" checked/>旅游
						</label>
						<label>
							<input type="checkbox" name="hobby[]" value="登山" disabled/>登山
						</label>
						<label>
							<input type="checkbox" name="hobby[]" value="健身"/>健身
						</label>
						<label>
							<input type="checkbox" name="hobby[]" value="上网"/>上网
						</label>
						<label>
							<input type="checkbox" name="hobby[]" value="游戏"/>游戏
						</label>
						<label>
							<input type="checkbox" name="hobby[]" value="游泳"/>游泳
						</label>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">学　历：</label>
				<div class="col-sm-10">
					<select class="form-control" name="degree">
						<option value="0">请选择</option>
						<option value="1">高中</option>
						<option value="2">大学</option>
						<option value="3">研究生</option>
						<option value="4">博士</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">自我介绍：</label>
				<div class="col-sm-10">
					<textarea class="form-control" name="intro" cols="45" rows="5" placeholder="我是"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">头　像：</label>
				<div class="col-sm-10">
					<a class="btn-default"><input type="file" name="pic"></input></a>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<input type="submit" class="btn btn-default" value="提&nbsp;交"/>
					<input type="reset" class="btn btn-default" value="重&nbsp;置"/>
				</div>
			</div>
		</form>
	</div>
<script>
    $('.carousel').carousel({
        interval: 3000 //changes the speed
    })
</script>
<?php require_once 'template/footer.php'; ?>