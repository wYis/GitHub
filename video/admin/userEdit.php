<?php
	require_once('template/header.php');
	session_start();
    $row=$_SESSION['row']; 
	if (!isset($_SESSION["row"])){
		header("location:./login.php");
	}
	require_once '../system/dbConn.php';
	$sqlrun=new sqlTool();
	$uid=$_GET["uid"];
	$sql="select * from users where uid=$uid";
	$res=$sqlrun->execute_dql($sql);
	$row=mysql_fetch_assoc($res);
	require_once('template/top.php');
	require_once('template/menu.php');
?>
<div id="content">
	<div class="inner" style="min-height: 500px;">
		<div class="row">
			<div class="col-lg-7">
				<h1> 用户信息修改 </h1>
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
			<form class="form-horizontal" action="doUpdate.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="uid" value="<?php echo "$row[uid]";?>" />
				<div class="form-group">
					<label for="name" class="col-sm-2 control-label">用户名：</label>
					<div class="col-sm-10">
						<input type="text"  name="username" required class="form-control" id="name" placeholder="<?php echo $row["uname"];?>"  required="required"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">生　日：</label>
					<div class="col-sm-10">
						<input type="date" name="birth" class="form-control" value="<?php echo $row["birthdate"];?>" required/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">性　别：</label>
					<div class="col-sm-10">
						<div class="radio">
							<label><input type="radio" id="gender" name="gender" value="0"<?php if($row["gender"]==0) echo "checked";?>/>男</label>
							<label><input type="radio" id="gender" name="gender" value="1" <?php if($row["gender"]==1) echo "checked";?>/>女</label>
						</div>
					</div>
				</div>
				<?php
					$arr=explode(",", $row["hobby"]);
				?>
				<div class="form-group">
					<label class="col-sm-2 control-label">爱　好：</label>
					<div class="col-sm-10">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="hobby[]" value="旅游" <?php if(in_array("旅游", $arr)) echo "checked";?>/>旅游
							</label>
							<label>
								<input type="checkbox" name="hobby[]" value="登山" <?php if(in_array("登山", $arr)) echo "checked";?>/>登山
							</label>
							<label>
								<input type="checkbox" name="hobby[]" value="健身" <?php if(in_array("健身", $arr)) echo "checked";?>/>健身
							</label>
							<label>
								<input type="checkbox" name="hobby[]" value="上网" <?php if(in_array("上网", $arr)) echo "checked";?>/>上网
							</label>
							<label>
								<input type="checkbox" name="hobby[]" value="游戏" <?php if(in_array("游戏", $arr)) echo "checked";?>/>游戏
							</label>
							<label>
								<input type="checkbox" name="hobby[]" value="游泳" <?php if(in_array("游泳", $arr)) echo "checked";?>/>游泳
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">学　历：</label>
					<div class="col-sm-10">
						<select class="form-control" name="degree">
							<option value="0" <?php if($row["degree"]==0) echo "selected";?>>请选择</option>
							<option value="1" <?php if($row["degree"]==1) echo "selected";?>>高中</option>
							<option value="2" <?php if($row["degree"]==2) echo "selected";?>>大学</option>
							<option value="3" <?php if($row["degree"]==3) echo "selected";?>>研究生</option>
							<option value="4" <?php if($row["degree"]==4) echo "selected";?>>博士</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">自我介绍：</label>
					<div class="col-sm-10">
						<textarea class="form-control" name="intro" cols="45" rows="5" placeholder="<?php echo $row["intro"]?>"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">头　像：</label>
					<div class="col-sm-10">
						<input type="file" class="btn-default col-sm-6" name="pic"><img src="./images/<?php echo $row['pic'];?>" width="80" height="80" class="col-sm-2"></input>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" class="btn btn-default" value="更新"/>
						<input type="reset" class="btn btn-default" value="重置"/>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php require_once 'template/footer.php'; ?>