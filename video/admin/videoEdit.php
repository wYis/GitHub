<?php
    require_once('template/header.php');
    session_start();
    $row=$_SESSION['row']; 
    if (!isset($_SESSION["row"])){
        header("location:./login.php");
    }
    require_once '../system/dbConn.php';
    $sqlrun=new sqlTool();
    $vid=$_GET["vid"];
    $sql="select * from videos where vid=$vid";
    $res=$sqlrun->execute_dql($sql);
    $row=mysql_fetch_assoc($res);
    require_once('template/top.php');
    require_once('template/menu.php');
?>
<div id="content">
    <div class="inner" style="min-height: 500px;">
        <div class="row">
            <div class="col-lg-7">
                <h1> 视频信息修改 </h1>
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
            <form  action="doEdit.php" class="form-horizontal"method="POST" enctype="multipart/form-data">
                <input type="hidden" name="vid" value="<?php echo "$row[vid]";?>" />
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">视频名称：</label>
                    <div class="col-sm-10">
                        <input type="text"  name="vname" required class="form-control" id="name" value="<?php echo $row["videoname"];?>"  required="required"/>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">视频类别：</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="vclass">
                            <option value="0" <?php if($row["tid"]==0) echo "selected";?>>请选择</option>
                            <option value="1" <?php if($row["tid"]==1) echo "selected";?>>电影</option>
                            <option value="2" <?php if($row["tid"]==2) echo "selected";?>>电视剧</option>
                            <option value="3" <?php if($row["tid"]==3) echo "selected";?>>动漫</option>
                            <option value="4" <?php if($row["tid"]==4) echo "selected";?>>教学视频</option>
                        </select>
                    </div>
                </div>
                <?php
                    $arr=explode(",", $row["vhobby"]);
                ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">爱　好：</label>
                    <div class="col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="vhobby[]" value="动作" <?php if(in_array("动作", $arr)) echo "checked";?>/>动作
                            </label>
                            <label>
                                <input type="checkbox" name="vhobby[]" value="爱情" <?php if(in_array("爱情", $arr)) echo "checked";?>/>爱情
                            </label>
                            <label>
                                <input type="checkbox" name="vhobby[]" value="喜剧" <?php if(in_array("喜剧", $arr)) echo "checked";?>/>喜剧
                            </label>
                            <label>
                                <input type="checkbox" name="vhobby[]" value="科幻" <?php if(in_array("科幻", $arr)) echo "checked";?>/>科幻
                            </label>
                            <label>
                                <input type="checkbox" name="vhobby[]" value="悬疑" <?php if(in_array("悬疑", $arr)) echo "checked";?>/>悬疑
                            </label>
                            <label>
                                <input type="checkbox" name="vhobby[]" value="动漫" <?php if(in_array("动漫", $arr)) echo "checked";?>/>动漫
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">视频介绍：</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="vintro" cols="45" rows="5"><?php echo $row['intro']?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">视频图片：</label>
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