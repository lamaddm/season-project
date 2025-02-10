<?php
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$event_name = $_POST['event_name'];
$tickets_number = $_POST['tickets_number'];

$conn = mysqli_connect('localhost', 'lama', 'ASDFGh55@@h', 'seasondb');

if (!$conn) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}

$user_insert_query = "INSERT INTO userseason (full_name, email) VALUES ('$full_name', '$email')";

if (mysqli_query($conn, $user_insert_query)) {
    $user_id = mysqli_insert_id($conn);
}

$event_insert_query = "INSERT INTO event (event_name) VALUES ('$event_name')";

if (mysqli_query($conn, $event_insert_query)) {
    $event_id = mysqli_insert_id($conn);

    $booking_insert_query = "INSERT INTO bookings (user_id, event_id, tickets_number, booking_date) 
                             VALUES ('$user_id', '$event_id', '$tickets_number', NOW())";
                             
    if (mysqli_query($conn, $booking_insert_query)) {
        echo "تم الحجز بنجاح!";
    } else {
        echo "خطأ في إدراج الحجز: " . mysqli_error($conn);
    }
} else {
    echo "خطأ في إدراج المستخدم: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
