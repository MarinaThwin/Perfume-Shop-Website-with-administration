<?php
session_start();
include 'conn.php';
include 'function.php';
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    del_product();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .body{
            background-color: #ffedf1;
    }
    .bd1{
        backdrop-filter: blur(5px);
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<body class="body">
    <?php
    include 'header.php';
    ?>
    <div class="container z-1">
        <div class="row">
            <div class="col-md-12">
                <h2>Welcome Admin,
                    <span>
                        <?php
                        if (isset($_SESSION['admin'])) {
                            echo $_SESSION['admin'];
                        } else {
                            $_SESSION['admin'] = '';
                        }
                        ?>
                    </span>
                </h2>
            </div>
        </div>
        <div class="row text-dark">
            <div class="col-md-12 text-dark">
                <div class="card bg-transparent bd1 z-1">
                    <div class="card-header" style="font-size: 150%;">Product List
                    <a href="product.php" class="btn btn-outline-dark  float-end">Add Product</a>
                </div>
                    <table class="table bg-transparent table-borderless  text-dark  bd1">
                        <tr>
                            <th>No</th>
                            <th>Product Name</th>
                            <th>Category Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Info</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                       
                        <?php
                        $go_query = "SELECT p.productid,p.productname,c.catname as category,p.price,p.qty,p.photo,p.productinfo from category c inner join product p where c.catid=p.categoryid order by p.productid";
                        $query = mysqli_query($connection,$go_query);
                        while ($row = mysqli_fetch_array($query)) {
                            $productid = $row['productid']; //fieldname_product
                            $productname = $row['productname']; //fieldname
                            $catname = $row['category']; //category table_fieldname
                            $price = $row['price'];
                            $qty = $row['qty'];
                            $photo = $row['photo'];
                            $info=$row['productinfo'];
                            echo "<tr>";
                            echo "<td>{$productid}</td>";
                            echo "<td>{$productname}</td>";
                            echo "<td>{$catname}</td>";
                            echo "<td>{$price}</td>";
                            echo "<td>{$qty}</td>";
                            echo "<td>{$info}</td>";
                            echo "<td><img src='../Photo/{$photo}' width='100' height='100'></td>";
                            echo "<td>
                            <div class='btn-group' role='group'>
                                <a href='edit.php?action=edit&pid={$productid}' class='btn btn-success'>Edit</a>

                                <a href='productlist.php?action=delete&pid={$productid}' class='btn btn-danger' onclick='return confirm ('Are you sure?')'>Delete</a>
                                </div>
                                </td>";
                            echo "</tr>";
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</html>