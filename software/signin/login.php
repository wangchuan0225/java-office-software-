<?php
// error_reporting(0);
$userName1 = $_POST['username'];
$password1 = $_POST['password'];
$classif = $_POST['ren'];

if(($userName1==null) || ($password1==null)){
    echo "<script> alert('请输入用户名或密码');parent.location.href='login.html'; </script>";
    // header('Location:index.html');
}
else if ( ($userName1!=NULL) && ($password1!=NULL)){
    //数据库连接信息改成自己的 ：主机(单词localhost不用改)+数据库用户名+密码+要连接的数据库
    $servername = "localhost"; // 数据库服务器地址
$username = "root"; // 数据库用户名
$password = "wang1601"; // 数据库密码
$dbname = "firstdb"; // 数据库名称

// 创建数据库连接
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM userpassWord WHERE id = '$userName1'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    // 使用 fetch_assoc() 方法获取一行数据（关联数组形式）
    $row = $result->fetch_assoc();

    // 从 $row 中获取 id 和 passWord 并存储到对应变量中
    $id = $row['id'];
    $passWord = $row['passWord'];

    // 输出获取到的 id 和 passWord
} else {
    // 处理没有找到数据的情况
    echo "No results found for this user.";
}


    if($id==null) {
        echo "<script> alert('该用户不存在！请联系管理员！');parent.location.href='login.html';  </script>";
    }
    else if($id!=$userName1||$passWord!=$password1)
    {
        echo "<script> alert('密码错误！若忘记密码，请联系管理员！');parent.location.href='login.html'; </script>";
    }
    else if($id==$userName1 && $passWord==$password1){
       
       
                echo "<script>location.href='http://localhost:8080/';</script>";
         
    }
    
}
?>