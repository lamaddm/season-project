<?php

$conn = mysqli_connect('localhost', 'lama', 'ASDFGh55@@h', 'seasondb');

if (isset($_GET['id'])) {
    $event_id = $_GET['id'];

    $deleteQuery = "DELETE FROM event WHERE event_id = $event_id";
    if (mysqli_query($conn, $deleteQuery)) {
        echo "تم حذف الحدث بنجاح.";
        header("Location: index.php");
        exit;
    } else {
        echo "حدث خطأ أثناء الحذف: " . mysqli_error($conn);
    }
} else {
    echo "معرّف الحدث غير موجود.";
}


mysqli_close($conn);
?>
