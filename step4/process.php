<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "bmi_calculator";

// الاتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $database);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// التأكد من أن النموذج قد تم إرساله
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $weight = floatval($_POST['weight']);
    $height = floatval($_POST['height']);

    if ($height <= 0) {
        die("Height must be greater than 0.");
    }

    // حساب BMI
    $bmi = $weight / ($height * $height);
    $category = "";

    if ($bmi < 18.5) {
        $category = "Underweight";
    } elseif ($bmi >= 18.5 && $bmi < 25) {
        $category = "Normal";
    } elseif ($bmi >= 25 && $bmi < 30) {
        $category = "Overweight";
    } else {
        $category = "Obesity";
    }

    // إدخال البيانات في الجدول
    $stmt = $conn->prepare("INSERT INTO bmi_record (name, weight, height, bmi, category) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sddds", $name, $weight, $height, $bmi, $category);

    if ($stmt->execute()) {
        header("Location: index.php"); // إعادة التوجيه للصفحة الرئيسية
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
