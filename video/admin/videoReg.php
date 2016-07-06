<?php
    require_once('template/header.php');
    
    session_start();
    $row=$_SESSION["row"];
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
                <h1> 添加视频信息 </h1>
            </div>
        </div>
        <hr/>
        <div class="col-md-12">
            <form class="form-horizontal" action="dovideoEdit.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="uid" value="<?php echo $row["adminid"]; ?>" />
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">电影名称：</label>
                    <div class="col-sm-10">
                        <input type="text"  name="vname" required class="form-control" id="name" placeholder="videoname" required="required"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">视频类型：</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="vclass">
                            <option value="0">请选择</option>
                            <option value="1">电影</option>
                            <option value="2">电视剧</option>
                            <option value="3">动漫</option>
                            <option value="4">教学视频</option>
                        </select>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label class="col-sm-2 control-label">视频分类：</label>
                    <div class="col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="vhobby[]" value="动作" checked/>动作
                            </label>
                            <label>
                                <input type="checkbox" name="vhobby[]" value="爱情" disabled/>爱情
                            </label>
                            <label>
                                <input type="checkbox" name="vhobby[]" value="喜剧"/>喜剧
                            </label>
                            <label>
                                <input type="checkbox" name="vhobby[]" value="科幻"/>科幻
                            </label>
                            <label>
                                <input type="checkbox" name="vhobby[]" value="悬疑"/>悬疑
                            </label>
                            <label>
                                <input type="checkbox" name="vhobby[]" value="动漫"/>动漫
                            </label>
                        </div>
                    </div>
                </div> -->
                <div class="form-group">
                    <label class="col-sm-2 control-label">电影介绍：</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="vintro" cols="45" rows="5" placeholder="video"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">电影图片：</label>
                    <div class="col-sm-10">
                        <a class="btn-default"><input type="file" name="vpic"></input></a>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">下载路径：</label>
                    <div class="col-sm-10">
                        <input type="text"  name="vname" required class="form-control" id="name" placeholder="videoname" required="required"/>
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
    </div>
</div>
<script>
    $('.carousel').carousel({
        interval: 3000 //changes the speed
    })
</script>
<?php require_once 'template/footer.php'; ?>
