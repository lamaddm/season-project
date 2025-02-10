<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tables</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

<?php
$conn = mysqli_connect('localhost', 'lama', 'ASDFGh55@@h', 'seasondb');

// Fetching users
$resultUsers = mysqli_query($conn, "SELECT * FROM userseason");
if ($resultUsers) {
    echo "<h2>Users</h2><table><tr><th>ID</th><th>Full Name</th><th>Email</th><th>Actions</th></tr>";
    while ($row = mysqli_fetch_assoc($resultUsers)) {
        echo "<tr><td>{$row['user_id']}</td><td>{$row['full_name']}</td><td>{$row['email']}</td>
              <td><a href='edit.php?id={$row['user_id']}'>تعديل</a> | 
              <a href='delete.php?id={$row['user_id']}' onclick='return confirm(\"هل أنت متأكد من الحذف؟\")'>حذف</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "خطأ في جلب بيانات المستخدمين: " . mysqli_error($conn);
}

// Fetching events
$resultEvents = mysqli_query($conn, "SELECT * FROM event");
if ($resultEvents) {
    echo "<h2>Events</h2><table><tr><th>Event ID</th><th>Event Name</th><th>Actions</th></tr>";
    while ($row = mysqli_fetch_assoc($resultEvents)) {
        echo "<tr><td>{$row['event_id']}</td><td>{$row['event_name']}</td>
              <td><a href='edit_event.php?id={$row['event_id']}'>تعديل</a> |
               <a href='delete_event.php?id={$row['event_id']}' onclick='return confirm(\"هل أنت متأكد من الحذف؟\")'>حذف</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "خطأ في جلب بيانات الأحداث: " . mysqli_error($conn);
}

// Fetching bookings
$resultBookings = mysqli_query($conn, "SELECT * FROM bookings");
if ($resultBookings) {
    echo "<h2>Bookings</h2><table><tr><th>Booking ID</th><th>User ID</th><th>Event ID</th><th>Tickets Number</th><th>Booking Date</th><th>Actions</th></tr>";
    while ($row = mysqli_fetch_assoc($resultBookings)) {
        $bookingDate = isset($row['booking_date']) ? $row['booking_date'] : 'غير متوفر';
        echo "<tr><td>{$row['booking_id']}</td><td>{$row['user_id']}</td><td>{$row['event_id']}</td><td>{$row['tickets_number']}</td><td>$bookingDate</td>
              <td><a href='edit_booking.php?id={$row['booking_id']}'>تعديل</a> | 
              <a href='delete_booking.php?id={$row['booking_id']}' onclick='return confirm(\"هل أنت متأكد من الحذف؟\")'>حذف</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "خطأ في جلب بيانات الحجوزات: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

</body>
</html>
