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
</head>

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
        <?php 
            if(!empty($_GET['tid'])) {
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
      <form class="navbar-form navbar-left" role="search" action="search.html">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" data-toggle="modal" data-target="#myModal1">登录</a></li>
        <li><a href="#" data-toggle="modal" data-target="#myModal">注册</a></li>
      
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- /.navbar -->
<?php 
    require_once './system/dbConn.php';
    $sqlrun=new sqlTool();
    //当前的页号$page
    if (!isset($_GET["page"])) {
        $page=1;
    }else
        $page=$_GET["page"];
    //每页显示多少条记录$rowsperpage
        $rowsperpage=3;
    //总共有多少条记录$totalrows
    $sql="select * from videos";
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
            $tid = $_GET['tid'];
    $sql="select vid,videoname,pic,uploaddate from videos where tid=$tid order by uploaddate desc limit $start,$rowsperpage";
    $res=$sqlrun->execute_dql($sql);
//    $sql1="select * from videos order by hittimes and tid=1 desc limit 4";
    $sql="select videoname,pic from videos where tid=$tid order by hittimes desc limit 4";
    require_once 'doSearch.php';
    $res4=$sqlrun->execute_dql($sql);
?>

<div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
            <div class="row">
                <div class="col-xs-12 col-lg-12 mlist">
                    <h2>
                    <?php
                        switch ($_GET["tid"]) {
                            case '1': echo "电影"; break;
                            case '2': echo "电视剧"; break;
                            case '3': echo "动漫"; break;
                            case '4': echo "教学视频"; break;
                        }
                    ?>专栏
                    </h2>
                    <ul class="list-inline row text-center">
                        <?php 
                            while($row=mysql_fetch_assoc($res)){
                        ?>
                        <li class="col-xs-4 col-sm-3 col-lg-2">
                            <img src="./admin/images/<?php echo $row['pic']; ?>" class="responsive img-thumbnail"/>
                            <p><a href="show.php?uid=<?php echo $row['vid']; ?>"><?php echo $row['videoname']; ?></a></p>
                        </li>
                        <?php } ?>
                    </ul>
                    <nav class="text-center">
                        <ul class="pagination">
                            <?php 
                                //echo "总共分".$totalpages."页";
                                $next=$page+1;
                                $forward=$page-1;
                                echo "<li><a href='List.php?page=1'>首页</a></li>";
                                if ($forward>0) {
                                  echo "<li><a href='List.php?page=$forward' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a>  </li>";
                                }
                                for ($i=1; $i<=$totalpages ;$i++) { 
                                    echo "<li><a href='List.php?page=$i'>{$i}</a></li>";
                                }
                                    if ($next<=$totalpages) {
                                       echo "<li><a href='List.php?page=$next' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>";
                                }
                                    echo "<li><a href='List.php?page=$totalpages'>尾页</a></li>";
                             ?>
                        </ul>
                    </nav>
                </div>
                <!--/.col-xs-6.col-lg-4-->
            </div>
            <!--/row-->
        </div>
        <!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group text-center" >
                <h2 style="color:white;" ><?php
                        switch ($_GET["tid"]) {
                            case '1': echo "电影"; break;
                            case '2': echo "电视剧"; break;
                            case '3': echo "动漫"; break;
                            case '4': echo "教学视频"; break;
                        }
                    ?>排行榜</h2>
                <ul class="list-inline row text-center">
                    <?php 
                        while($row=mysql_fetch_assoc($res4)){
                    ?>
                    <li class="col-xs-12 col-lg-6">
                        <img src="./admin/images/<?php echo $row['pic']; ?>" class="responsive img-thumbnail"/>
                        <p><a href="show.html"><?php echo $row['videoname']; ?></a>
                        </p>
                    </li>
                    <?php } ?>
                </ul>
            </div>

        </div>
        <!--/.sidebar-offcanvas-->
    </div>
    <!--/row-->

    

</div>
<!--/.container-->
<hr>

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
</body>
</html>
