<div id="left" >
	<div class="media user-media well-small">
		<a class="user-link" href="#">
			<img class="media-object img-thumbnail user-img" alt="User Picture" style="
width:80px;height:80px" src="assets/img/user.gif" />
		</a>
		<br />
		<div class="media-body">
			<h5 class="media-heading"><?php echo $row["adminname"]; ?></h5>
			<ul class="list-unstyled user-info">
				<li>
					 <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> 在线
				</li>
			</ul>
		</div>
		<br />
	</div>
	<ul id="menu" class="collapse">
		<li class="panel">
			<a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
				<i class="icon-tasks">&nbsp;&nbsp;</i>视频类别管理
				<span class="pull-right">
					<i class="icon-angle-left"></i>
				</span>&nbsp; 
				<span class="label label-default">3</span>&nbsp;
			</a>
			<ul class="collapse" id="component-nav">
				<li class="">
					<a href="./video_list.php">&nbsp;&nbsp;<i class="icon-angle-right">&nbsp;&nbsp;</i>查询视频类别</a>
				</li>
				<li class="">
					<a href="videoEdit.php">&nbsp;&nbsp;<i class="icon-angle-right">&nbsp;&nbsp;</i>添加视频类别</a>
				</li>
				<li class="">
					<a href="videoDel.php">&nbsp;&nbsp;<i class="icon-angle-right">&nbsp;&nbsp;</i>删除视频类别</a>
				</li>
			</ul>
		</li>
		<li class="panel ">
			<a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav">
				<i class="icon-pencil">&nbsp;&nbsp;</i>视频信息管理
				<span class="pull-right">
					<i class="icon-angle-left"></i>
				</span> &nbsp; 
				<span class="label label-success">2</span>&nbsp;
			</a>
			<ul class="collapse" id="form-nav">
				<li class=""><a href="videoList.php"><i class="icon-angle-right"></i> 查询视频信息 </a></li>
				<li class=""><a href="./videoReg.php"><i class="icon-angle-right"></i> 添加视频信息 </a></li>
			</ul>
		</li>
		<li class="panel">
			<a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#pagesr-nav">
				<i class="icon-envelope"></i> 用户留言管理
				<span class="pull-right">
					<i class="icon-angle-left"></i>
				</span>  &nbsp; 
				<span class="label label-info">2</span>&nbsp;
			</a>
			<ul class="collapse" id="pagesr-nav">
				<li><a href="message.php"><i class="icon-angle-right"></i> 查看用户留言 </a></li>
				<li><a href="delmessage.php"><i class="icon-angle-right"></i> 删除用户留言 </a></li>
				
			</ul>
		</li>
		<li class="panel">
			<a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav">
				<i class="icon-bar-chart"></i> 注册用户管理
				<span class="pull-right">
					<i class="icon-angle-left"></i>
				</span> &nbsp; 
				<span class="label label-danger">4</span>&nbsp;
			</a>
			<ul class="collapse" id="chart-nav">
				<li><a href="userList.php"><i class="icon-angle-right"></i> 查看用户</a></li>
				<li><a href="userReg.php"><i class="icon-angle-right"></i> 添加用户 </a></li>
			</ul>
		</li>
		<li class="panel">
			<a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#error-nav">
				<i class="icon-warning-sign"></i> 错误信息管理

				<span class="pull-right">
					<i class="icon-angle-left"></i>
				</span>
				  &nbsp; <span class="label label-warning">5</span>&nbsp;
			</a>
			<ul class="collapse" id="error-nav">
				<li><a href="errors_403.html"><i class="icon-angle-right"></i> 错误 403  </a></li>
				<li><a href="errors_404.html"><i class="icon-angle-right"></i> 错误 404  </a></li>
				<li><a href="errors_405.html"><i class="icon-angle-right"></i> 错误 405  </a></li>
				<li><a href="errors_500.html"><i class="icon-angle-right"></i> 错误 500  </a></li>
				<li><a href="errors_503.html"><i class="icon-angle-right"></i> 错误 503  </a></li>
			</ul>
		</li>
		<li><a href="grid.html"><i class="icon-check-empty"></i> 用户密码修改</a></li>
		<li><a onclick="javascript:window.location.href='logout.php'"> <i class="icon-signin"></i> 安全退出 </a></li>
	</ul>
</div>
