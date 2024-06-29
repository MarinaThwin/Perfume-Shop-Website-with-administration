<?php 
session_start();
$id = $_GET['id'];
 
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'increase') {
        $_SESSION['cart'][$id]++;
    } elseif ($_GET['action'] == 'decrease') {
        if ($_SESSION['cart'][$id] > 1) {
            $_SESSION['cart'][$id]--;
        } else {
            unset($_SESSION['cart'][$id]);
        }
    }
}
 
header("location: cart.php");
?>