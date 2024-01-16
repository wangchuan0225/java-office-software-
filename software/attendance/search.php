<?php
$servername = "localhost"; // 数据库服务器地址
$username = "root"; // 数据库用户名
$password = "wang1601"; // 数据库密码
$dbname = "firstdb"; // 数据库名称

// 创建数据库连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 处理查询请求
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST["date"];
    $work_id = $_POST["work_id"];
    $leaving_ask = $_POST["leaving_ask"];
    $absence = $_POST["absence"];

    // 构建SQL查询语句
    $sql = "SELECT * FROM attendance WHERE 1=1";

    if (!empty($date)) {
        $sql .= " AND date='$date'";
    }

    if (!empty($work_id)) {
        $sql .= " AND work_id LIKE '%$work_id%'";
    }

    if (!empty($leaving_ask)) {
        $sql .= " AND leaving_ask='$leaving_ask'";
    }

    if (!empty($absence)) {
        $sql .= " AND absence='$absence'";
    }

    $result = $conn->query($sql);
    // 输出查询结果
    // 检查是否有数据
    if ($result->num_rows > 0) {
        echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>工作ID</th>
            <th>日期</th>
            <th>上班时间</th>
            <th>下班时间</th>
            <th>是否请假</th>
            <th>是否缺勤</th>
        </tr>";
        // 输出数据
        while($row = $result->fetch_assoc()) {
            // 将0和1转换为"否"和"是"
            $leavingAskText = ($row["leaving_ask"] == 0) ? "否" : "是";
            $absenceText = ($row["absence"] == 0) ? "否" : "是";

            echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["work_id"]."</td>
                <td>".$row["date"]."</td>
                <td>".$row["on_time"]."</td>
                <td>".$row["off_time"]."</td>
                <td><span class='editable' contenteditable='false'>".$leavingAskText."</span></td>
                <td>".$absenceText."</td>
                <td><button class='edit-button'>编辑</button></td>
                <td><button class='complete-button' style='display:none;'>完成</button></td>
            </tr>";
        }

        echo "</table>";
    } else {
        echo "没有找到任何数据";
    }
}

// 查询数据库中的所有信息
$sql = "SELECT * FROM attendance";
$result = $conn->query($sql);
// 关闭数据库连接
$conn->close();
?>
<script>
// 获取所有编辑按钮和完成按钮
var editButtons = document.querySelectorAll('.edit-button');
var completeButtons = document.querySelectorAll('.complete-button');

// 给编辑按钮添加点击事件
editButtons.forEach(function(button, index) {
    button.addEventListener('click', function() {
        // 切换为编辑模式
        toggleEdit(index);
    });
});

// 给完成按钮添加点击事件
completeButtons.forEach(function(button, index) {
    button.addEventListener('click', function() {
        // 切换为非编辑模式
        toggleEdit(index);
        // 保存更改到数据库（您需要编写保存更改的PHP代码）
        saveChanges(index);
    });
});

// 切换编辑模式
function toggleEdit(index) {
    var editableElement = document.querySelectorAll('.editable')[index];
    var editButton = editButtons[index];
    var completeButton = completeButtons[index];

    if (editableElement.contentEditable === 'false') {
        editableElement.contentEditable = 'true';
        editButton.style.display = 'none';
        completeButton.style.display = 'block';
    } else {
        editableElement.contentEditable = 'false';
        editButton.style.display = 'block';
        completeButton.style.display = 'none';
    }
}

// 保存更改到数据库的函数
function saveChanges(index) {
    // 获取编辑后的值
    var newValue = document.querySelectorAll('.editable')[index].textContent;
    // 获取行的唯一标识符（例如，通过隐藏的<input>元素）
    var rowId = document.querySelectorAll('.row-id')[index].value;

    // 使用Ajax将更改发送到服务器
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "index.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // 处理服务器响应
            console.log(xhr.responseText); // 可以根据需要处理响应
        }
    };
    var params = "save_changes=true&row_id=" + rowId + "&new_leaving_ask=" + newValue;
    xhr.send(params);
}
</script>
