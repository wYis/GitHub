<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>用户管理系统</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link href="assets/css/layout2.css" rel="stylesheet" />
    <link href="assets/plugins/flot/examples/examples.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/plugins/timeline/timeline.css" />
	<style type="text/css">
	.windowframe {
		width: 100%;
		height: 100%;
		border: 0;
	}
	</style>
</head>
<body class="padTop53" >
<?php
	session_start();
    $row=$_SESSION['row']; 
	if (!isset($_SESSION["row"])){
		header("location:./login.php");
	}
	require_once '../system/dbConn.php';
	$sqlrun=new sqlTool();
    require_once('template/top.php');
    require_once('template/menu.php');
    $ip = $_SERVER["HTTP_CLIENT_IP"];
echo $ip;
 
?>
 <!--    <div id="wrap" >
     <div id="top">
         <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
             <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                 <i class="icon-align-justify"></i>
             </a>
             <header class="navbar-header">
 
                 <a href="index.html" class="navbar-brand">
                 <img src="assets/img/logo.png" alt="" />
                     
                     </a>
             </header>
             <ul class="nav navbar-top-links navbar-right">
 
                 MESSAGES SECTION
                 <li class="dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                         <span class="label label-success">1</span>    <i class="icon-envelope-alt"></i>&nbsp; <i class="icon-chevron-down"></i>
                     </a>
                     <ul class="dropdown-menu dropdown-messages">
                         <li>
                             <a href="#">
                                 <div>
                                    <strong>系统提示</strong>
                                     <span class="pull-right text-muted">
                                         <em>刚刚</em>
                                     </span>
                                 </div>
                                 <div>欢迎登陆管理系统，请您的操作，避免给你带来损失。
                                     <br />
                                     <span class="label label-primary">温馨提示</span>
                                 </div>
                             </a>
                         </li>
                         <li class="divider"></li>
                         <li>
                             <a class="text-center" href="#">
                                 <strong>查看所有留言</strong>
                                 <i class="icon-angle-right"></i>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="chat-panel dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                         <span class="label label-info">8</span>   <i class="icon-comments"></i>&nbsp; <i class="icon-chevron-down"></i>
                     </a>
 
                     <ul class="dropdown-menu dropdown-alerts">
 
                         <li>
                             <a href="#">
                                 <div>
                                     <i class="icon-comment" ></i> New Comment
                                 <span class="pull-right text-muted small"> 4 minutes ago</span>
                                 </div>
                             </a>
                         </li>
                         <li class="divider"></li>
                         <li>
                             <a href="#">
                                 <div>
                                     <i class="icon-twitter info"></i> 3 New Follower
                                 <span class="pull-right text-muted small"> 9 minutes ago</span>
                                 </div>
                             </a>
                         </li>
                         <li class="divider"></li>
                         <li>
                             <a href="#">
                                 <div>
                                     <i class="icon-envelope"></i> Message Sent
                                 <span class="pull-right text-muted small" > 20 minutes ago</span>
                                 </div>
                             </a>
                         </li>
                         <li class="divider"></li>
                         <li>
                             <a href="#">
                                 <div>
                                     <i class="icon-tasks"></i> New Task
                                 <span class="pull-right text-muted small"> 1 Hour ago</span>
                                 </div>
                             </a>
                         </li>
                         <li class="divider"></li>
                         <li>
                             <a href="#">
                                 <div>
                                     <i class="icon-upload"></i> Server Rebooted
                                 <span class="pull-right text-muted small"> 2 Hour ago</span>
                                 </div>
                             </a>
                         </li>
                         <li class="divider"></li>
                         <li>
                             <a class="text-center" href="#">
                                 <strong>See All Alerts</strong>
                                 <i class="icon-angle-right"></i>
                             </a>
                         </li>
                     </ul>
 
                 </li>
                 END ALERTS SECTION
                 ADMIN SETTINGS SECTIONS
                 <li class="dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                         <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                     </a>
                     <ul class="dropdown-menu dropdown-user">
                         <li><a href="#"><i class="icon-user"></i> 个人中心 </a>
                         </li>
                         <li><a href="#"><i class="icon-gear"></i> 设置 </a>
                         </li>
                         <li class="divider"></li>
                         <li><a href="login.html"><i class="icon-signout"></i> 安全退出 </a>
                         </li>
                     </ul>
                 </li>
                 END ADMIN SETTINGS
             </ul>
         </nav>
     </div>
     END HEADER SECTION
     MENU SECTION
         <div id="left" >
         <div class="media user-media well-small">
             <a class="user-link" href="#">
                 <img class="media-object img-thumbnail user-img" alt="User Picture" style="
 width:80px;height:80px" src="assets/img/user.gif" />
             </a>
             <br />
             <div class="media-body">
                 <h5 class="media-heading"><?php echo $_SESSION["adminname"]; ?></h5>
                 <ul class="list-unstyled user-info">
                     <li>
                          <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> 在线
                     </li>
                 </ul>
             </div>
             <br />
         </div>
         <ul id="menu" class="collapse">
             li class="panel active">
                 <a href="index.html" >
                     <i class="icon-table">&nbsp;</i>视频类型管理
                 </a>                   
             </li
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
                             <a href="progress.html">&nbsp;&nbsp;<i class="icon-angle-right">&nbsp;&nbsp;</i>查询视频类别</a>
                         </li>
                     <li class="">
                             <a href="button.html">&nbsp;&nbsp;<i class="icon-angle-right">&nbsp;&nbsp;</i>添加视频类别</a>
                         </li>
                     <li class="">
                             <a href="icon.html">&nbsp;&nbsp;<i class="icon-angle-right">&nbsp;&nbsp;</i>删除视频类别</a>
                         </li>
                 </ul>
             </li>
             <li class="panel ">
                 <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav">
                     <i class="icon-pencil">&nbsp;&nbsp;</i>视频信息管理
                     <span class="pull-right">
                         <i class="icon-angle-left"></i>
                     </span> &nbsp; 
                         <span class="label label-success">5</span>&nbsp;
                 </a>
                 <ul class="collapse" id="form-nav">
                         <li class=""><a href="forms_validation.html"><i class="icon-angle-right"></i> 查询视频信息 </a></li>
                     <li class=""><a href="forms_general.html"><i class="icon-angle-right"></i> 添加视频信息 </a></li>
                     <li class=""><a href="forms_advance.html"><i class="icon-angle-right"></i> 修改视频信息 </a></li>
                         <li class=""><a href="forms_advance.html"><i class="icon-angle-right"></i> 删除视频信息 </a></li>
                 </ul>
             </li>
             <li class="panel">
                 <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#pagesr-nav">
                     <i class="icon-envelope"></i> 用户留言管理
                     <span class="pull-right">
                         <i class="icon-angle-left"></i>
                     </span>  &nbsp; 
                         <span class="label label-info">6</span>&nbsp;
                 </a>
                 <ul class="collapse" id="pagesr-nav">
                     <li><a href="pages_calendar.html"><i class="icon-angle-right"></i> 删除用户留言 </a></li>
                     <li><a href="pages_timeline.html"><i class="icon-angle-right"></i> 查看用户留言 </a></li>
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
                     <li><a href="userEdit.php"><i class="icon-angle-right"></i> 添加用户 </a></li>
                     
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
     END MENU SECTION
     PAGE CONTENT-->
    <div id="content">
        <div class="inner" style="min-height: 700px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1> 欢迎 <?php echo $row['adminname'];?> 进入管理 </h1>
                </div>
            </div>
            <hr/>
            <div id="cont">
            </div>
        </div>
    </div> 
	<?php
		$sql="select * from users";
		$res=mysql_num_rows($sqlrun->execute_dql($sql));
	?>
    <div id="right">
        <div class="well well-small">
            <ul class="list-unstyled">
                <li>游客 &nbsp; : <span>23,000</span></li>
                <li>用户 &nbsp; : <span><?php echo $res; ?></span></li>
                <li>Registrations &nbsp; : <span>3,000</span></li>
            </ul>
        </div>
        <div class="well well-small">
            <button class="btn btn-block"> Help </button>
            <button class="btn btn-primary btn-block"> Tickets</button>
            <button class="btn btn-info btn-block"> New </button>
            <button class="btn btn-success btn-block"> Users </button>
            <button class="btn btn-danger btn-block"> Profit </button>
            <button class="btn btn-warning btn-block"> Sales </button>
            <button class="btn btn-inverse btn-block"> Stock </button>
        </div>
    </div>
    <?php require_once 'template/footer.php'; ?>
 


 <!--    GLOBAL SCRIPTS
 <script src="assets/plugins/jquery-2.0.3.min.js"></script>
 <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
 <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
 END GLOBAL SCRIPTS
 
 PAGE LEVEL SCRIPTS
 <script src="assets/plugins/flot/jquery.flot.js"></script>
 <script src="assets/plugins/flot/jquery.flot.resize.js"></script>
 <script src="assets/plugins/flot/jquery.flot.time.js"></script>
 <script src="assets/plugins/flot/jquery.flot.stack.js"></script>
 <script src="assets/js/for_index.js"></script>
    
 END PAGE LEVEL SCRIPTS
     <script type="text/javascript">
         function cheak(url){
             var frame = document.createElement("iframe");
             var part=document.getElementById("content");
             part.appendChild(frame);
             frame.src = url;
             frame.className = "windowframe";
         frame.style ="height:700px;"
 
         }
     onclick="cheak('./userList.php')"
 </script> -->
    
