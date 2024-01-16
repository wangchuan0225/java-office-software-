<?php include "conn.php" ?>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>删除员工信息</title>
</head>
<?php
$ID=$_POST['O_ID'];
// sql语句
$sql="delete from `user` where `id`='$ID'";
$res=@mysqli_query($con, $sql);
if(mysqli_affected_rows($con)>0){
?>
<script>
    alert("删除成功，即将返回");
    window.location.href="show_info.php";
</script>
<?php    
}else{
?>
<script>
    alert("删除失败，即将返回");
    window.location.href="show_info.php";
</script>
<?php
}
mysqli_close($con);
?>
</html>