<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./favicon.ico">
    <title>只为你开放</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/offcanvas.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link type="text/css" rel="stylesheet" href="assets/css/style.css" />
</head>
<?php 
    session_start();
    $gain = $_SESSION['user'];
    require_once './system/dbConn.php';
    $sqlrun=new sqlTool();
    $sql="select videoname,pic,vid from videos where tid=1";
    $res=$sqlrun->execute_dql($sql);
    $sql="select videoname,pic,vid from videos where tid=2";
    $res1=$sqlrun->execute_dql($sql);
    $sql="select videoname,pic,vid from videos where tid=3";
    $res2=$sqlrun->execute_dql($sql);
    $sql="select videoname,pic,vid from videos where tid=4";
    $res3=$sqlrun->execute_dql($sql);
    $sql="select videoname,pic from videos order by hittimes desc limit 4";
    $res4=$sqlrun->execute_dql($sql);
?>
<body>
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
        <li><a href="index.php">首页 <span class="sr-only">(current)</span></a></li>
        <?php for($a=1;$a<5;$a++){ ?>
        <li><a href='list.php?tid=<?php echo $a;?>'>
        <?php 
            switch ($a) {
                case '1': echo "电影"; break;
                case '2': echo "电视剧"; break;
                case '3': echo "动漫"; break;
                case '4': echo "教学视频"; break;
            }
        }?></a></li>
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">原创 <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="#">喜剧</a></li>
                <li><a href="#">科幻</a></li>
                <li><a href="#">教育</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">其他</a></li>
            </ul>
        </li>
		</ul>
		<form class="navbar-form navbar-left" role="search" action="doSearch.php" method="post">
			<div class="form-group">
				<input type="text" class="form-control" name="search" placeholder="Search">
			</div>
			<button type="submit" class="btn btn-default">搜索</button>
		</form>
		<ul class="nav navbar-nav navbar-right">
			<?php 
			  	if(!isset($_SESSION['user'])){
			        echo "<li class='active'><a href>欢迎您访问本网站</a></li>";
			        echo "<li><a class='theme-login' href='javascript:;'>登录</a></li>";
			        echo "<li><a href='userReg.php'>注册</a></li>";
			    }else{
			        echo "<li class='active'><a href='javascript:;'>欢迎".$gain['uname']."访问本网站</a></li>";
			        echo "<li><a href='logout.php'>注 销</li>";
                    echo "<li><a href='logout.php'>用户中心</li>";
			    }
			?>
		</ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- /.navbar -->


<div class="container">
<!--幻灯片开始-->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item imgs active">
            <img src="assets/images/img4.jpg" class="img-responsive" alt="Apple iPhone 5S">
            <div class="carousel-caption">
                <h3>Apple iPhone 5S</h3>
            </div>
        </div>
        <div class="item imgs">
            <img src="assets/images/img1.jpg" class="img-responsive" alt="Samsung Galaxy Note 3">
            <div class="carousel-caption">
                <h3>Samsung Galaxy Note 3</h3>
            </div>
        </div>
        <div class="item imgs">
            <img src="assets/images/img3.jpg" class="img-responsive" alt="Samsung Galaxy Note 3">
            <div class="carousel-caption">
                <h3>Samsung Galaxy Note 3</h3>
            </div>
        </div>
        <div class="item imgs">
            <img src="assets/images/tengux.jpg" class="img-responsive" alt="Apple iPhone 5S">
            <div class="carousel-caption">
                <h3>Sony Xperia Z1</h3>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>
<!--幻灯片结束-->


    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
            <div class="row text-center">
                <div class="col-xs-12 col-lg-12 mlist">
                    <h2>电影专栏</h2>
                    <ul class="list-inline row text-center">
                    <?php 
                        while($row=mysql_fetch_assoc($res)){
                    ?>
                        <li class="col-xs-4 col-sm-3 col-lg-2">
                            <img src="./admin/images/<?php echo $row['pic']; ?>" class="responsive img-thumbnail " id='link'/>
                            <p><a href="show.php?uid=<?php echo $row['vid']; ?>"><?php echo $row['videoname']; ?></a></p>
                        </li>
                        <?php } ?>
                    </ul>

                    <p><a class="btn btn-default" href="list.php?tid=1" role="button">更多 &raquo;</a></p>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-xs-12 col-lg-12 mlist">
                    <h2>电视剧专栏</h2>
                    <ul class="list-inline row text-center">
                        <?php 
                            while($row=mysql_fetch_assoc($res1)){
                        ?>
                        <li class="col-xs-4 col-sm-3 col-lg-2">
                            <img src="./admin/images/<?php echo $row['pic']; ?>" class="responsive img-thumbnail"/>
                            <p><a href="show.php?uid=<?php echo $row['vid']; ?>"><?php echo $row['videoname']; ?></a>
                            </p>
                        </li>
                        <?php } ?>
                    </ul>
                    <p><a class="btn btn-default" href="list.php?tid=2" role="button">更多 &raquo;</a></p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-xs-12 col-lg-12 mlist">
                    <h2>动漫专栏</h2>
                    <ul class="list-inline row text-center">
                        <?php 
                            while($row=mysql_fetch_assoc($res2)){
                        ?>
                        <li class="col-xs-4 col-sm-3 col-lg-2">
                            <img src="./admin/images/<?php echo $row['pic']; ?>" class="responsive img-thumbnail"/>
                            <p><a href="show.php?uid=<?php echo $row['vid']; ?>"><?php echo $row['videoname']; ?></a>
                            </p>
                        </li>
                        <?php } ?>
                    </ul>
                    <p><a class="btn btn-default" href="list.php?tid=3" role="button">更多 &raquo;</a></p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-xs-12 col-lg-12 mlist">
                    <h2>教学视频专栏</h2>
                    <ul class="list-inline row text-center">
                        <?php 
                            while($row=mysql_fetch_assoc($res3)){
                        ?>
                        <li class="col-xs-4 col-sm-3 col-lg-2">
                            <img src="./admin/images/<?php echo $row['pic']; ?>" class="responsive img-thumbnail"/>
                            <p><a href="show.php?uid=<?php echo $row['vid']; ?>"><?php echo $row['videoname']; ?></a>
                            </p>
                        </li>
                        <?php } ?>
                    </ul>
                    <p><a class="btn btn-default" href="list.php?tid=4" role="button">更多 &raquo;</a></p>
                </div>
            </div>
            <!--/row-->
        </div>
        <!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group text-center">
                <h2 style="color:white;" >排行榜</h2>
                <ul class="list-inline row text-center">
                    <?php 
                        while($row=mysql_fetch_assoc($res4)){
                    ?>
                    <li class="col-xs-12 col-lg-6">
                        <img src="./admin/images/<?php echo $row['pic']; ?>" class="responsive img-thumbnail"/>
                        <p><a href="show.php?uid=<?php echo $row['vid']; ?>"><?php echo $row['videoname']; ?></a>
                        </p>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <!--/.sidebar-offcanvas-->
        <!--出层效果  登录开始-->
        <div class="theme-popover">
            <div class="theme-poptit">
                <a href="javascript:;" title="关闭" class="close">×</a>
                <h3 style="margin-top: 10px; margin-bottom: 5px; color:#B87070"><strong>登录</strong> 是一种荣誉</h3>
            </div>
            <div class="col-xs-12">
                <form action="dologin.php" method="post" class="form-signin">
                    <input type="hidden" name="url" value="index.php" />
                    <br/><input type="text" name="uname" placeholder="请输入用户名" class="form-control" required/><br/>
                    <input type="password" name="passw" placeholder="请输入用户密码" class="form-control" required/><br/>
                    <button class="btn btn-primary col-lg-7" type="submit">登&nbsp;录</button>
                    <button class="btn btn-success col-sm-offset-1 col-lg-4" type="submit">免费注册</button>
                    <b style="color:red;"><?php echo $_GET['msg'];?></b>
                </form>
            </div>
        </div>
        <div class="theme-popover-mask"></div>
        <!--出层效果  登录结束-->
    </div>
    <!--/row-->
<!--/.container-->
 <hr>
<?php
$str = "这是一个测试字符串如果可以请正确输出";
echo strlen($str);
echo mb_substr($str, 0, 7, 'utf-8');
?>
<footer>
    <p>王进升&copy;网络13001班 2016</p>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>



<script src="offcanvas.js"></script>
<script>
    $('.carousel').carousel({
        interval: 3000 //changes the speed
    })
</script>

<?php
/*$c=mysql_query("UPDATE message SET count=count+1 WHERE id=".$_GET['id']);
//大概这样就行了吧,另,直接这样用$_GET['id']真的可以么...
$sql="select * from message where id=$_GET[id]"; 


$id = $_GET['id']; //接收ID值 
$sql = "UPDATE database SET hit=hit+'1' WHERE id = '$id'"; //执行更新点击数的语句 
$result = mysql_query($sql); //执行语句 
$url = "detail.php?id={$id}"; //执行更新后要跳转的地址,就是去文章页面 
header("location: $url"); //执行跳转 
*/
?>
        <!--出层效果  登录开始-->
<script>
jQuery(document).ready(function($) {
    $('.theme-login').click(function(){
        $('.theme-popover-mask').fadeIn(100);
        $('.theme-popover').slideDown(200);
    })
    $('.theme-poptit .close').click(function(){
        $('.theme-popover-mask').fadeOut(100);
        $('.theme-popover').slideUp(200);
    })

})
</script>
<!-- 视频播放 
https://stackoverflow.com/questions/18622508/bootstrap-3-and-youtube-in-modal -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <iframe width="570" height="340" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
</div>

<script>window.jQuery || document.write('<script src="js/jquery-1.10.1.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<script>
    $('#link').click(function () {
        var src = './video/aaaa.mp4';
        $('#myModal').modal('show');
        $('#myModal iframe').attr('src', src);
    });

    $('#myModal button').click(function () {
        $('#myModal iframe').removeAttr('src');
    });
</script>
</body>
</html>
