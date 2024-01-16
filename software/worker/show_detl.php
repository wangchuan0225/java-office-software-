<?php include "conn.php" ?>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>员工详细信息</title>
    <link rel="stylesheet" type="text/css" href="empManage.css">
    <script src="check.js"></script>
</head>
<?php
$query=$_GET['ID'];
?>
<body>
<div id="background">
    <!-- 展示员工信息栏 -->
    <div id="context">
        <form action="save_edit_info.php" method="POST" onsubmit="return valuecheck()">
        <?php
        // sql语句
        $sql="select * from `user` where `id`=$query";
        $res=mysqli_query($con,$sql);
        if(mysqli_num_rows($res)>0){
            while($dbrow=mysqli_fetch_assoc($res)){
                $Id=$dbrow['id'];
                echo "<div class='col'><div class='col-Name'>工号</div>
                <div class='col-Value'><input type='text' name='ID' id='ID' value='$Id' maxlength='10'></div></div>";
                echo "<div class='col'><div class='col-Name'>姓名</div>
                <div class='col-Value'><input type='text' name='Name' id='Name' value='$dbrow[name]' maxlength='20'></div></div>";
                echo "<div class='col'><div class='col-Name'>出生日期</div>";
                echo "<div class='col-Value'><input type='date' id='Birth' name='Birth' 
                style='width:170px;' value='$dbrow[birthday]'></div></div>";
                echo "<div class='col'><div class='col-Name'>部门</div>
                <div class='col-Value'><input type='text' name='Dep' id='Dep' value='$dbrow[Dep]' maxlength='10'></div></div>";
                echo "<div class='col'><div class='col-Name'>职务</div>
                <div class='col-Value'><input type='text' name='Pos' id='Pos' value='$dbrow[Pos]' maxlength='10'></div></div>";
                echo "<input type='hidden' name='O_ID' value='$Id'>";
            }
        }
        ?>
        <!-- 右下角的保存信息按钮 -->
        <div id="submit-div"><button type="submit" name="submit1">
            <img src="resource/save.png" alt="保存信息">
        </button></div>
        </form>
        <!-- 右下角的返回按钮 -->
        <div id="return-div"><a href="show_info.php">
            <img src="resource/return.png" alt="返回上一级">
        </a></div>
        <form action="del_info.php" method="POST">
            <input type="hidden" name="O_ID" value='<?php echo"$Id" ?>'>
            <!-- 右下角的删除按钮 -->
            <div id="delete-div"><button type="submit" name="submit2">
                <img src="resource/del.png" alt="删除员工">
            </button></div>
        </form>
    </div>
</div>
</body>
</html>
