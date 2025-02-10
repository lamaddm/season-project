<?php

$conn = mysqli_connect('localhost', 'lama', 'ASDFGh55@@h', 'seasondb');

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $delete_query = "DELETE FROM userseason WHERE user_id = '$user_id'";

    if (mysqli_query($conn, $delete_query)) {
        echo "تم حذف المستخدم بنجاح!";
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