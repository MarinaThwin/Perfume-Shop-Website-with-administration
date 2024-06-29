<?php
/*
session_start();
if(empty($_SESSION['user']))
{
    header('location:login.php');
}
else
{
    $id=$_GET['id'];
    $_SESSION['cart'][$id]++;
    header('location:cart.php');
}*/
?>

<?php
session_start();


if (empty($_SESSION['user'])) {    
    header('location: login.php');
    exit(); 
} else {
   
    if (isset($_GET['id']) && is_numeric($_GET['id']))
     {
        
        $id = intval($_GET['id']);       
        
        if (!isset($_SESSION['cart'][$id]))
        {
            $_SESSION['cart'][$id] = 1; 
        } else 
        {
            $_SESSION['cart'][$id]++; 
        }   
        header('location: cart.php');
        exit(); 
    } else {
        
        echo "Invalid product ID.";
        exit(); 
    }
}
?>
