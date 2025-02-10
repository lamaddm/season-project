<?php
$conn = mysqli_connect('localhost', 'lama', 'ASDFGh55@@h', 'seasondb');

if (!$conn) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM userseason WHERE user_id = '$user_id'");

    if ($row = mysqli_fetch_assoc($result)) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $update_query = "UPDATE userseason SET full_name = '$full_name', email = '$email' WHERE user_id = '$user_id'";

            if (mysqli_query($conn, $update_query)) {
                header("Location: index.php");
                exit;
            } else {
                echo "<div class='error'>حدث خطأ أثناء المستخدم: " . mysqli_error($conn) . "</div>";
            }
        }
    } else {
        echo "<div class='error'>لم يتم العثور على المستخدم.</div>";
    }
} else {
    echo "<div class='error'>معرّف  غير موجود.</div>";
}

mysqli_close($conn);
?>

<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل بيانات المستخدم</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>

<h2>تعديل بيانات المستخدم</h2>
<form method="POST">
    <label for="full_name">الاسم الكامل:</label>
    <input type="text" id="full_name" name="full_name" value="<?php echo $row['full_name']; ?>" required>
    
    <label for="email">البريد الإلكتروني:</label>
    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>
    
    <button type="submit">تحديث البيانات</button>
</form>

</body>
</html>
