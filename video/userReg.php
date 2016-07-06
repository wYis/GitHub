<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>用户注册</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css" />
	<link href="assets/css/style.css" rel="stylesheet">
	<script src="./assets/js/jquery.min.js"></script>
	<script src="./assets/js/bootstrap.min.js"></script>
	<script src="assets/js/ie-emulation-modes-warning.js"></script>
	
</head>
<body style="width:1145px;margin:58px auto 0px;">
<nav class="navbar navbar-fixed-top navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">首页 <span class="sr-only">(current)</span></a></li>
        <li><a href="list.html">电影</a></li>
        <li><a href="list.html">电视剧</a></li>
        <li><a href="list.html">动画片</a></li>
        <li><a href="list.html">体育</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">原创 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">喜剧</a></li>
            <li><a href="#">科幻</a></li>
            <li><a href="#">教育</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">其他</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search" action="search.html">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" data-toggle="modal" data-target="#myModal1">登录</a></li>
        <li><a href="userReg.php" >注册</a></li>
      
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div class="container-fluid" style="background:#fff;padding:60px;">
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
			<!-- <a class="btn-default"><input id="file-0a" class="file" name="pic" type="file" multiple data-min-file-count="1" /></a>
		 -->
		<input id="lefile" type="file" style="display:none">
		<div class="input-append">
			<input id="photoCover" class="input-large" type="text" style="height:30px;">
			<a class="btn btn-default" onclick="$('input[id=lefile]').click();">选择上传文件</a>
		</div>
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
<script type="text/javascript">
$('input[id=lefile]').change(function() {
$('#photoCover').val($(this).val());
});
</script>
</body>
</html>
