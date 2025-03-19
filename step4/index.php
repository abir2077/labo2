<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>

    <!-- استيراد Bootstrap و Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- استيراد ملف CSS خارجي -->
    <link rel="stylesheet" href="style.css">
</head>

<body class="container mt-5">

    <!-- عنوان الموقع -->
    <div class="title-container text-center">
        BMI Calculator
    </div>

    <!-- نموذج إدخال البيانات -->
    <form action="process.php" method="post" class="mb-4 form-container">
        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Weight (kg):</label>
            <input type="number" name="weight" class="form-control" required step="0.1">
            <img src="images/weight-icon.png" alt="Weight Icon" class="icon">
        </div>
        <div class="mb-3">
            <label class="form-label">Height (m):</label>
            <input type="number" name="height" class="form-control" required step="0.01">
            <img src="images/height_icon.png" alt="Height Icon" class="icon">
        </div>
        <button type="submit" class="btn btn-custom w-100">Calculate BMI</button>
    </form>

    <!-- صورة BMI -->
    <img src="images/bmi-icon.png" alt="BMI Icon" class="bmi-image">

    <!-- عرض السجلات السابقة -->
    <div class="table-container">
        <h3 class="text-center">Previous Records</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Weight</th>
                    <th>Height</th>
                    <th>BMI</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'fetch_record.php'; ?>
            </tbody>
        </table>
    </div>

    <!-- استيراد Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>