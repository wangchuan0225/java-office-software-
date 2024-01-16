<?php 
$hostname = "localhost"; //地址
$database = "firstdb"; //数据库名称
$username = "root"; //账号
$password = "wang1601"; //密码
$con = mysqli_connect($hostname, $username, $password, $database); 
if (mysqli_connect_errno()) 
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>
