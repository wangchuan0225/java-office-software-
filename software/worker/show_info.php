<?php include "conn.php";?>
<html lang="en" style="background-color: #f0f0f0">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>员工信息</title>
    <link rel="stylesheet" type="text/css" href="empManage.css">
</head>
<?php   // 使用post传递查询的工号
$query=NULL;
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(!empty($_POST)){
        $query=$_POST['EID'];
    }
}
?>
<body>
<div id="background">
    <!-- 搜索栏 -->
    <div id="search-frame">
        <form action="show_info.php" method="POST" onsubmit="return searchcheck()" style="width:100%;margin:0px;">
            <input type="text" name="EID" id="search" maxlength="10" value='<?php echo "$query" ?>' placeholder="请输入员工编号" >
            <!-- 搜索按钮和图片 -->
            <div id="search-div"><button type="submit" name="sunmit1">
                <img src="resource/search.png" alt="查询">
            </button></div>
        </form>
    </div>
    <!-- 展示搜索到的员工信息 -->
    <div id="context">
    <?php
    // sql语句
    $sql="select `id`, `name` from `user`";
    if($query!=NULL){
        $sql=$sql." where `id` like '%$query%'";
    }
    //echo "$sql";
    $res=mysqli_query($con, $sql);
    if(mysqli_num_rows($res)>0){
        while($dbrow=mysqli_fetch_assoc($res)){
            echo '<div class="empInfo">';
            echo "<div style='width:30%;text-align:center'>$dbrow[id]</div>";
            echo "<div style='width:50%;text-align:center'>$dbrow[name]</div>";
            echo "<div style='width:20%;text-align:center'>";
            echo "<a href='show_detl.php?ID=$dbrow[id]'>管理</a>";
            echo "</div></div>";
        }
        echo "<div style='text-align:center;margin:40px 0px;'>已经到底了<div>";
    }
    else{
        echo "<div style='text-align:center;margin:20px 0px;'>没有找到相关员工<div>";
    }
    ?>
    </div>
    <div id="add-div"><a href="add_info.php">
        <img src="resource/add.png" alt="添加员工">
    </a></div>
</div>
<a href="http://localhost:8080/">返回</a>
</body>
<script>
    function searchcheck(){
        var Id=document.getElementById('search').value;
        if((!(/^\d+$/.test(Id)))&&Id.length!==0) {alert("请输入合法的工号!");return false;}
        else return true;
    }
</script>
</html>
