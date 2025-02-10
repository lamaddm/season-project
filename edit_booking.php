<?php
$conn = mysqli_connect('localhost', 'lama', 'ASDFGh55@@h', 'seasondb');

if (isset($_GET['id'])) {
    $booking_id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM bookings WHERE booking_id = $booking_id");

    if ($row = mysqli_fetch_assoc($result)) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updateQuery = "UPDATE bookings SET 
                user_id = '{$_POST['user_id']}', 
                event_id = '{$_POST['event_id']}', 
                tickets_number = {$_POST['tickets_number']}, 
                booking_date = '{$_POST['booking_date']}' 
                WHERE booking_id = $booking_id";

            if (mysqli_query($conn, $updateQuery)) {
                header("Location: index.php");
                exit;
            } else {
                echo "<div class='error'>حدث خطأ أثناء التحديث: " . mysqli_error($conn) . "</div>";
            }
        }
    } else {
        echo "<div class='error'>لم يتم العثور على الحجز.</div>";
    }
} else {
    echo "<div class='error'>معرّف الحجز غير موجود.</div>";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل الحجز</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>

<h2>تعديل الحجز</h2>
<form method="POST">
    <label for="user_id">معرّف المستخدم:</label>
    <input type="text" id="user_id" name="user_id" value="<?php echo $row['user_id']; ?>" required>
    
    <label for="event_id">معرّف الحدث:</label>
    <input type="text" id="event_id" name="event_id" value="<?php echo $row['event_id']; ?>" required>
    
    <label for="tickets_number">عدد التذاكر:</label>
    <input type="number" id="tickets_number" name="tickets_number" value="<?php echo $row['tickets_number']; ?>" required>

    <label for="booking_date">تاريخ الحجز:</label>
    <input type="date" id="booking_date" name="booking_date" value="<?php echo $row['booking_date']; ?>" required>

    <button type="submit">حفظ التعديلات</button>
</form>

</body>
</html>
