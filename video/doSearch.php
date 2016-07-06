<?php
function Search(){
	if(!empty($_POST['search'])){
		$search = $_POST['search'];
		    require_once './system/dbConn.php';
    		$sqlrun=new sqlTool();
    		$sql = "select * from videos where videoname like '%$search%'";
    		$res = $sqlrun->execute_dql2($sql);
	}
}
?>