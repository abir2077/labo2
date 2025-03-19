<?php
// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$database = "bmi_calculator";

$conn = new mysqli($servername, $username, $password, $database);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// استعلام لجلب السجلات من الجدول bmi_record
$sql = "SELECT id, name, weight, height, bmi, category FROM bmi_record";
$result = $conn->query($sql);

// التحقق إذا كانت هناك سجلات في الجدول
if ($result->num_rows > 0) {
    // عرض السجلات في الجدول
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['weight']}</td>
                <td>{$row['height']}</td>
                <td>{$row['bmi']}</td>
                <td>{$row['category']}</td>
                <td>
                    <!-- رابط الحذف مع أيقونة الحذف -->
                    <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm'>
                        <i class='fas fa-trash-alt'></i> Delete
                    </a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No records found.</td></tr>";
}

$conn->close();
