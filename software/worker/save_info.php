<?php include "conn.php" ?>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>保存员工信息</title>
</head>
<?php
$ID=$_POST['ID'];
$Name=$_POST['Name'];
$Birthdate=$_POST['Birth'];
$Dep=$_POST['Dep'];
$Pos=$_POST['Pos'];
// sql语句
$sql="insert into `user` values ('".$ID."', '".$Name."', '".$Birthdate."', '"
.$Dep."', '".$Pos."')";
$res=@mysqli_query($con, $sql);
if(mysqli_affected_rows($con)>0){
?>
<script>
    alert("添加成功，即将返回");
    window.location.href="show_info.php";
</script>
<?php    
}else{
?>
<script>
    alert("添加失败，即将返回");
    window.location.href="show_info.php";
</script>
<?php
}
mysqli_close($con);
?>
</html>