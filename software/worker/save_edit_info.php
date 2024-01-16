<?php include "conn.php" ?>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>保存员工信息</title>
</head>
<?php
$O_ID=$_POST['O_ID'];
$ID=$_POST['ID'];
$Name=$_POST['Name'];
$Birthdate=$_POST['Birth'];
$Dep=$_POST['Dep'];
$Pos=$_POST['Pos'];
// sql语句
$sql="update `user` set `id`='$ID', `name`='$Name', `birthday`='$Birthdate', `Dep`='$Dep', `Pos`='$Pos' where `id`='$O_ID'";
echo"$sql";
$res=@mysqli_query($con, $sql);
if(mysqli_affected_rows($con)>0){
?>
<script>
    alert("修改成功，即将返回");
    window.location.href="show_info.php";
</script>
<?php    
}else{
?>

<?php
}
mysqli_close($con);
?>
</html>