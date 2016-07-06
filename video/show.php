<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

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
<script language="javascript">   
        /*window.onbeforeunload = function() {   
            var n = window.event.screenX - window.screenLeft;   
            var b = n > document.documentElement.scrollWidth-20;   
            if(b && window.event.clientY < 0 || window.event.altKey){
                alert("这是一个关闭操作而非刷新");   
            }else{
                alert("这是一个刷新操作而非关闭");
                window.event.returnValue = "真的要刷新页面么？";
            }
        }  */
    </script>
</head>

<body>
<?php
    session_start();
    $gain = $_SESSION['user'];
    require_once './system/dbConn.php';
    $sqlrun=new sqlTool();
    $vid=$_GET['uid'];
    $sql="select * from videos where vid=$vid";
    $row=$sqlrun->execute_dql1($sql);
    $a_id=$row['uploadadmin'];
    $sql1="select adminname from admins where adminid=$a_id";
    $arow=$sqlrun->execute_dql1($sql1);
    $sql="select * from message where vid=$vid";
    $mrow=$sqlrun->execute_dql2($sql);
    //点击次数
    $num=$row['hittimes']+1;
    $sql2="update videos set hittimes=$num where vid=$vid";
//    $sqlrun->execute_dql($sql2);
?>
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
        <?php 
            if(!empty($_GET['uid'])) {
                for($a=1;$a<5;$a++){?>
            <li><a href='list.php?tid=<?php echo $a;?>'>
            <?php 
                switch ($a) {
                    case '1': echo "电影"; break;
                    case '2': echo "电视剧"; break;
                    case '3': echo "动漫"; break;
                    case '4': echo "教学视频"; break;
                }
            }
        }else{
            header('location:index.php');
        }
        ?></a></li>
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
            <?php 
                if(!isset($_SESSION['user'])){
                    echo "<li class='active'><a href>欢迎您访问本网站</a></li>";
                    echo "<li><a class='theme-login' href='javascript:;'>登录</a></li>";
                    echo "<li><a href='userReg.php'>注册</a></li>";
                }else{
                    echo "<li class='active'><a href='javascript:;'>欢迎".$gain['uname']."访问本网站</a></li>";
                    echo "<li><a href='logout.php'>注 销</a></li>";
                }
            ?>
        </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- /.navbar -->
<div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-12">
            <div class="row box">
                <div class="col-md-4 text-center">
                    <!-- <div id="carousel-example-generic" class="carousel slide">
                        Indicators
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
                        </ol>
                        Wrapper for slides
                        <div class="carousel-inner">
                            <div class="item">
                                <img class="img-responsive img-full" src="assets/images/slide-1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="assets/images/slide-2.jpg" alt="">
                            </div>
                            <div class="item active">
                                <img class="img-responsive img-full" src="assets/images/slide-3.jpg" alt="">
                            </div>
                        </div>
                        Controls
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                    <h1 class="brand-name">海底总动员</h1> -->
                    <img src="./admin/images/<?php echo $row['pic']?>" width="200px" height="270px" />
                    <h3 class="brand-name"><?php echo $row['videoname']?></h3>

                </div>
                <div class="col-md-8 text-center">
                    <h3>电影简介</h3><hr/>
                    <table class="table table-hover">
                        <tr>
                            <td>专栏</td>
                            <td>
                            <?php
                            switch ($row['tid']) {
                                case '1': echo "电影";
                                    break;
                                case '2': echo "电视剧";
                                    break;
                                case '3': echo "动漫";
                                    break;
                                case '4': echo "教学视频";
                                    break;
                                default: die("其他视频");
                            }
                            ?></td>
                        </tr>
                        <tr>
                            <td>上传时间</td>
                            <td><?php echo $row['uploaddate']?></td>
                        </tr>
                        <tr>
                            <td>点击次数</td>
                            <td><?php echo $row['hittimes']?></td>
                        </tr>
                        <tr>
                            <td>上传人</td>
                            <td><?php echo $arow['adminname']?></td>
                        </tr>
                        <tr>
                            <td>下载次数</td>
                            <td><?php echo $row['downtimes']?></td>
                        </tr>
                        <tr>
                            <td>有事找站长</td>
                            <td><a href="Mailto:211078168@qq.com">给站长发信</a></td>
                        </tr>
                        <tr>
                            <td>下载地址</td>
                            <td><a href="down.php?vid=<?php echo $vid; ?>">点击下载视频</a></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!--/row-->
            <div class="row box">
                <div class="col-lg-12">
                    <h2 class="intro-text text-center">内容简介</h2><hr/>
                    <?php echo "<p>".$row['intro']."</p>"; ?>
                </div>
            </div>
            <div class="row box">
                <div class="col-lg-12">
                    <h2 class="intro-text text-center">留言板</h2><hr/>
                    <?php
                        foreach ($mrow as $v) {
                            $uid = $v['uid'];
                            $sql = "select * from users where uid=$uid";
                            $urow=$sqlrun->execute_dql1($sql);
                            $cont = $v['content'];
                            $tim = $v['retime'];
                    ?>
                        <div class="col-lg-12 thumbnail">
                            <div class="" style="width: 90px;height: 120px; float: left; margin-bottom: 0px;">
                                <img src="./admin/images/<?php echo $urow['pic']?>" class="thumbnail" width="90px" height="90px" style="margin-bottom: 0px;">
                                <h4 class="text-center"><?php echo $urow['uname']?></h4>
                            </div>
                            <div class="col-lg-10" style="height: 90px">
                                <p class="alert"><?php echo $cont; ?></p>
                                <div class="col-lg-offset-7 col-lg-4">
                                	<p><?php echo $tim; ?></p>
                                </div>
                            </div>

                        </div>
                    <?php } ?>
                    <form class="form-horizontal" action="doManager.php" method="POST">
                    <?php 
                    if(!isset($_SESSION['user'])){?>
                        <div class="col-lg-10">
                            <div class="manager">
                                <div class="manager-center">
                                    <a class='theme-login' href='javascript:;'>登录</a>以后可以留言
                                </div>
                            </div>
                            <textarea class='form-control' cols="35" rows="5" placeholder="请输入留言信息"></textarea>
                        </div>
                        <div class="col-lg-2">
                            <input type="submit" class="btn btn-default col-lg-12 thumbnail" value="提&nbsp;交&nbsp;留&nbsp;言" disabled/>
                            <input type="reset" class="btn btn-default col-lg-12 thumbnail" value="重&nbsp;置" disabled/>
                        </div>
                    <?php
                    }else{
                    ?>
                    <hr/>
                        <input type="hidden" name="url" value="show.php?uid=" />
                        <div class="col-lg-10">
                            <input type="hidden" name="vid" value="<?php echo $row['vid'];?>" />
                            <textarea class="form-control col-lg-10" name="content" cols="35" rows="5" placeholder="请输入留言信息"></textarea>
                        </div>
                        <div class="col-lg-2">
                            <input type="submit" class="btn btn-default col-lg-12 thumbnail" value="提&nbsp;交&nbsp;留&nbsp;言"/>
                            <input type="reset" class="btn btn-default col-lg-12 thumbnail" value="重&nbsp;置"/>
                        </div>
                    <?php }?>
                    </form>
                </div>
        	</div> 
        </div>
        <!--/.col-xs-12.col-sm-12-->
        <div class="theme-popover">
            <div class="theme-poptit">
                <a href="javascript:;" title="关闭" class="close">×</a>
                <h3 style="margin-top: 10px; margin-bottom: 5px; color:#B87070"><strong>登录</strong> 是一种荣誉</h3>
            </div>
            <div class="col-xs-12">
                <form action="dologin.php" method="post" class="form-signin">
                    <input type="hidden" name="url" value="show.php?uid=<?php echo $row['vid']; ?>" />
                    <br/><input type="text" name="uname" placeholder="请输入用户名" class="form-control" required/><br/>
                    <input type="password" name="passw" placeholder="请输入用户密码" class="form-control" required/><br/>
                    <button class="btn btn-primary col-lg-7" type="submit">登&nbsp;录</button>
                    <button class="btn btn-success col-sm-offset-1 col-lg-4" type="submit">免费注册</button>
                    <b style="color:red;"><?php echo $_GET['msg'];?></b>
                </form>
            </div>
        </div>
        <div class="theme-popover-mask"></div>
       
    </div>
    <!--/row-->

    
<hr>
    <footer>
        <p>王进升&copy;网络13001班 2016</p>
    </footer>
</div>
<!--/.container-->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>

<script src="offcanvas.js"></script>
<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 3000 //changes the speed
    })
</script>
<script>
var t9 = new PopupLayer({trigger:"#ele9",popupBlk:"#blk9",closeBtn:"#close9",
useOverlay:true,useFx:true,offsets:{x:0,y:-41}});
t9.doEffects = function(way){
    if(way == "open"){
        this.popupLayer.css({opacity:0.3}).show(400,function(){
            this.popupLayer.animate({
                left:($(document).width() - this.popupLayer.width())/2,
                top:(document.documentElement.clientHeight -
                    this.popupLayer.height())/2 + $(document).scrollTop(),
                opacity:0.8
            },1000,function(){this.popupLayer.css("opacity",1)}.binding(this));
        }.binding(this));
    }
    else{
        this.popupLayer.animate({
            left:this.trigger.offset().left,
            top:this.trigger.offset().top,
            opacity:0.1
        },{duration:500,complete:function(){
            this.popupLayer.css("opacity",1);this.popupLayer.hide()}.binding(this)});
    }
}
</script>
<!--script> 返回并刷新  alert('删除成功');window.location = \"".$page."\";</script-->
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
</body>
</html>
