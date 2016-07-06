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
    $sql="select * from message";
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
                <h1> 视频管理 </h1>
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
                    <th width="10%">留言序号</th>
                    <th width="10%">留言ID</th>
                    <th width="10%">用户ID/用户名</th>
                    <th width="10%">留言内容</th>
                    <th width="10%">留言时间</th>
                    <th width="10%">视频ID/视频名</th>
                    <th width="10%">删除留言</th>
                </tr>
                <?php
                    $sql1="select * from message order by retime desc limit $start,$rowsperpage";
                    $result1=$sqlrun->execute_dql($sql1);
                    while($row=mysql_fetch_assoc($result1))
                    {   
                        $uid = $row['uid'];
                        $vid = $row['vid'];
                        $sql = "select uname from users where uid=$uid";
                        $urow=$sqlrun->execute_dql1($sql);
                        $sql = "select videoname from videos where vid=$vid";
                        $vrow=$sqlrun->execute_dql1($sql);
                ?>
                <tr>
                    <td><?php $i++; echo $i; ?></td>
                    <td><?php echo $row["cid"]; ?></td>
                    <td><?php echo $uid." / ".$urow['uname']; ?></td>
                    <td><?php echo $row["content"]; ?></td>
                    <td><?php echo $row['retime'];?></td>
                    <td><?php echo $vid." / ".$vrow['videoname'];?></td>
                    <td><a href="userDelete.php?vid=<?php echo $row['vid'];?>" onclick="return confirm('确认删除吗？')">删除留言</a></td>
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
                            echo "  <a href='message.php?page=1'>首页</a>  ";
                            if ($forward>0) {
                              echo "<a href='message.php?page=$forward'>上一页</a>  ";
                            }
                            for ($i=1; $i<=$totalpages ;$i++) { 
                                echo "  <a href='message.php?page=$i'>第{$i}页</a>  ";
                            }
                                if ($next<=$totalpages) {
                                   echo "  <a href='message.php?page=$next'>下一页</a>  ";
                            }
                                echo "  <a href='message.php?page=$totalpages'>尾页</a>  ";
                         ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php require_once 'template/footer.php'; ?>
