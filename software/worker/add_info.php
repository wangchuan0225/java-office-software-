<?php include "conn.php" ?>
<html lang="en">
<head>
    <title>添加员工</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="empManage.css">
    <script src="check.js"></script>
</head>
<body>
<div id="background">
    <!-- 填写员工信息栏 -->
    <div id="context">
        <form action="save_info.php" method="POST" onsubmit="return valuecheck()">
        <?php
        echo "<div class='col'><div class='col-Name'>工号</div>
        <div class='col-Value'><input type='text' id='ID' name='ID' maxlength='10'></div></div>";
        echo "<div class='col'><div class='col-Name'>姓名</div>
        <div class='col-Value'><input type='text' id='Name' name='Name' maxlength='20'></div></div>";
        echo "<div class='col'><div class='col-Name'>出生日期</div>";
        echo "<div class='col-Value'><input type='date' id='Birth' name='Birth' style='width:170px;'></div></div>";
        echo "<div class='col'><div class='col-Name'>部门</div>
        <div class='col-Value'><input type='text' id='Dep' name='Dep' maxlength='10'></div></div>";
        echo "<div class='col'><div class='col-Name'>职务</div>
        <div class='col-Value'><input type='text' id='Pos' name='Pos' maxlength='10'></div></div>";
        ?>
        <!-- 右下角的保存信息按钮 -->
        <div id="submit-div"><button type="submit" name="submit1">
            <img src="resource/save.png" alt="保存信息">
        </button></div>
        </form>
        <!-- 左下角的返回按钮 -->
        <div id="return-div"><a href="show_info.php">
            <img src="resource/return.png" alt="返回上一级">
        </a></div>
    </div>
</div>
</body>
</html>