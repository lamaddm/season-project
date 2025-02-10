<?php
$conn = mysqli_connect('localhost', 'lama', 'ASDFGh55@@h', 'seasondb');

if (isset($_GET['id'])) {
    $event_id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM event WHERE event_id = $event_id");

    if ($row = mysqli_fetch_assoc($result)) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $event_name = $_POST['event_name'];
            $updateQuery = "UPDATE event SET event_name = '$event_name' WHERE event_id = $event_id";

            if (mysqli_query($conn, $updateQuery)) {
                header("Location: index.php");
                exit;
            } else {
                echo "<div class='error'>حدث خطأ أثناء التحديث: " . mysqli_error($conn) . "</div>";
            }
        }
    } else {
        echo "<div class='error'>لم يتم العثور على الحدث.</div>";
    }
} else {
    echo "<div class='error'>معرّف الحدث غير موجود.</div>";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل الحدث</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>

<h2>تعديل الحدث</h2>
<form method="POST">
    <label for="event_name">اسم الحدث:</label>
    <input type="text" id="event_name" name="event_name" value="<?php echo $row['event_name']; ?>" required>
    
    <button type="submit">حفظ التعديلات</button>
</form>

</body>
</html>
