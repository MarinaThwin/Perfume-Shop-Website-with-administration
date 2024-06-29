<?php
include 'conn.php';
 
$id = $_GET['id'];//13
$status = $_GET['status'];//0 or 1
 
if ($status == 1) {
    $query = "UPDATE contactus SET status = 1  WHERE conid = $id";
} else {
    $query = "UPDATE contactus SET status = 0  WHERE conid = $id";
}
 
$stmt = mysqli_prepare($connection, $query);
 
if (!$stmt) {
    echo "Error in preparing statement: " . mysqli_error($connection);
} else {
    mysqli_stmt_bind_param($stmt, "i", $id);
    $go_update = mysqli_stmt_execute($stmt);
 
    if ($go_update) {
        header("location:contactUs.php");
    } else {
        echo "Error updating order status: " . mysqli_error($connection);
    }
 
    mysqli_stmt_close($stmt);
}
 
mysqli_close($connection);
?>