<?php
include 'conn.php';

$id = $_GET['id'];//12
$status = $_GET['status'];//0 or 1

if ($status == 1) {
    $query = "UPDATE orders SET status = 1, senddate = NOW() WHERE orderid = ?";
} else {
    $query = "UPDATE orders SET status = 0, senddate = NULL WHERE orderid = ?";
}

$stmt = mysqli_prepare($connection, $query);

if (!$stmt) {
    echo "Error in preparing statement: " . mysqli_error($conn);
} else {
    mysqli_stmt_bind_param($stmt, "i", $id);
    $go_update = mysqli_stmt_execute($stmt);

    if ($go_update) {
        header("location:ordermgmt.php");
    } else {
        echo "Error updating order status: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($connection);
?>
