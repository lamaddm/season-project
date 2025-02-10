<?php

$conn = mysqli_connect('localhost', 'lama', 'ASDFGh55@@h', 'seasondb');


if (isset($_GET['id'])) {
    $booking_id = $_GET['id'];

    $deleteQuery = "DELETE FROM bookings WHERE booking_id = $booking_id";
    if (mysqli_query($conn, $deleteQuery)) {
        echo "تم حذف الحجز بنجاح.";
        header("Location: index.php");
        exit;
    } else {
        echo "حدث خطأ أثناء الحذف: " . mysqli_error($conn);
    }
} else {
    echo "معرّف الحجز غير موجود.";
}

mysqli_close($conn);
?>
