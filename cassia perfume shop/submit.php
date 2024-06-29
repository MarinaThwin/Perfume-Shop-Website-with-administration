<?php
	session_start();
	include 'admin/conn.php';
		$user_id=$_POST['userid'];
		$user_name=$_POST['username'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$address=$_POST['address'];
		$payment=$_POST['payment_type'];
		$query="INSERT into orders(orderdate,customerid,deliveryname,deliveryphone,deliveryaddress,status)";
		$query.="values(now(),'$user_id','$user_name','$phone','$address',0)";
		$go_query=mysqli_query($connection,$query);
		$order_id=mysqli_insert_id($connection);
 
		foreach($_SESSION['cart'] as $id=>$qty)
		{
			$updateQuery = "UPDATE product SET qty = qty - '$qty' WHERE productid = '$id'";
			mysqli_query($connection, $updateQuery);
		$getprice=mysqli_query($connection,"SELECT * from product where productid='$id'");
		while($out=mysqli_fetch_array($getprice))
		{
			$db_price=$out['price'];
		}
			$amount=$db_price * $qty;
			$query="INSERT into orderdetail(orderid,productid,productqty,amount)";
			$query.="values('$order_id','$id','$qty','$amount')";
			$go_query=mysqli_query($connection,$query);

	}
	
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product_id => $product) {
        if (isset($_POST['quantity'][$product_id])) {
            $new_quantity = $_POST['quantity'][$product_id];
            $stmt = $pdo->prepare("UPDATE order_details SET quantity = ? WHERE product_id = ?");
            $stmt->execute([$new_quantity, $product_id]);
        }
    }
}
	$_SESSION['oder_id']=$order_id;
	unset($_SESSION['cart']);
	header("location:show_success.php");
?>

