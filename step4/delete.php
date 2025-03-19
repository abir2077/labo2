<?php
// اتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$database = "bmi_calculator";

$conn = new mysqli($servername, $username, $password, $database);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// التحقق من وجود المعامل id في الرابط
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // استعلام لحذف السجل بناءً على الـ id
    $sql = "DELETE FROM bmi_record WHERE id = ?";

    // تحضير الاستعلام
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);

        // تنفيذ الاستعلام
        if ($stmt->execute()) {
            // إعادة التوجيه إلى الصفحة الرئيسية بعد الحذف
            header("Location: index.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
