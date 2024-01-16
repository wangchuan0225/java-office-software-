<link rel="stylesheet" type="text/css" href="style.css">
<h1 style="text-align: center;">考勤管理系统</h1>
<div class="query-form">
    <form method="POST" action="">
        <label for="date-input">日期：</label>
        <input type="text" id="date-input" name="date" class="query-input" placeholder="输入日期">
        
        <label for="work-id-input">工作ID：</label>
        <input type="text" id="work-id-input" name="work_id" class="query-input" placeholder="输入工作ID">

        <label for="leaving-ask-input">是否请假：</label>
        <select id="leaving-ask-input" name="leaving_ask" class="query-input">
            <option value="">不限</option>
            <option value!=1>否</option>
            <option value=1>是</option>
        </select>

        <label for="absence-input">是否缺勤：</label>
        <select id="absence-input" name="absence" class="query-input">
            <option value="">不限</option>
            <option value!=1>否</option>
            <option value=1>是</option>
        </select>

        <button type="submit" class="query-button">确认查询</button>
        <a href="http://localhost:8080/">返回</a>

    </form>
</div>
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
?>
<?php
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
                <td><span class='editable-leaving-ask' contenteditable='false'>".$leavingAskText."</span></td>
                <td><span class='editable-absence' contenteditable='false'>".$leavingAskText."</span></td>
                <td><button class='edit-button'>编辑</button></td>
                <td><button class='complete-button' style='display:none;'>完成</button></td>
                <td><input type='hidden' class='row-id' value='".$row["id"]."'></td>
            </tr>";
        }
        
        echo "</table>";
    } else {
        echo "没有找到任何数据";
    }
}
if (isset($_POST["save_changes"])) {
    // 获取需要更新的数据
    $row_id = $_POST["row_id"];
    $new_leaving_ask = $_POST["new_leaving_ask"]; // 编辑后的请假请求值
    $new_absence = $_POST["new_absence"]; // 新增加的缺勤请求值

    // 执行更新操作
    $update_sql = "UPDATE attendance SET leaving_ask = '$new_leaving_ask', absence = '$new_absence' WHERE id = $row_id";
    if ($conn->query($update_sql) === TRUE) {
        // 更改成功
        echo "更改已保存";
        // 可以选择性地添加代码来回显更新后的数据
    } else {
        // 更改失败
        echo "更改保存失败: " . $conn->error;
    }
}

?>
<?php
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
    var leavingAskElements = document.querySelectorAll('.editable-leaving-ask');
    var absenceElements = document.querySelectorAll('.editable-absence');
    var editButtons = document.querySelectorAll('.edit-button');
    var completeButtons = document.querySelectorAll('.complete-button');

    if (index < leavingAskElements.length && index < absenceElements.length) {
        var leavingAskElement = leavingAskElements[index];
        var absenceElement = absenceElements[index];
        var editButton = editButtons[index];
        var completeButton = completeButtons[index];

        var isEditing = leavingAskElement.contentEditable === 'true' || absenceElement.contentEditable === 'true';

        // 切换编辑状态
        leavingAskElement.contentEditable = isEditing ? 'false' : 'true';
        absenceElement.contentEditable = isEditing ? 'false' : 'true';
        editButton.style.display = isEditing ? 'block' : 'none';
        completeButton.style.display = isEditing ? 'none' : 'block';
    } else {
        console.error('索引越界：未找到对应的元素。索引：' + index);
    }
}


function saveChanges(index) {
    var rowIdElements = document.querySelectorAll('.row-id');
    var leavingAskElements = document.querySelectorAll('.editable-leaving-ask');
    var absenceElements = document.querySelectorAll('.editable-absence');

    if (index < rowIdElements.length) {
        var rowId = rowIdElements[index].value;
        var newLeavingAsk = leavingAskElements[index].textContent === "是" ? 1 : 0;
        var newAbsence = absenceElements[index].textContent === "是" ? 1 : 0;

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
        var params = "save_changes=true&row_id=" + rowId + "&new_leaving_ask=" + newLeavingAsk + "&new_absence=" + newAbsence;
        xhr.send(params);
    } else {
        console.error('索引越界：未找到对应的.row-id元素。索引：' + index);
    }
}

</script>
