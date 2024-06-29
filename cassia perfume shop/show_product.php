<?php
session_start();
include 'admin/conn.php';
include 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
</head>
<style>
    .bd{
            background-color: #ffedf1;
    }
    .bd1{
        backdrop-filter: blur(5px);
    }
    .bd1 img{
        transform: scale(0.9);
        transition: 0.5s;
        border-radius: 20px;
        border: 1px solid black;
    }
    .bd1 img:hover{
        transform: scale(0.95);
        border-radius: 20px;
        border: 1px solid black;
        
    }

    
</style>
<body class="bd">
<?php include 'header.php'; ?>


<!-- more products -->
<div class="col-sm-12 bd ">
    <div class="row ">
        <?Php 
            $getquery="SELECT * from category";
            $go_query=mysqli_query($connection,$getquery);
                        while($row=mysqli_fetch_array($go_query)){
                            $catid=$row['catid'];
                            $catname=$row['catname'];
                            echo '<h2 class="text-uppercase text-dark text-center mt-5 mb-5">~~~~'.$catname.'~~~~</h2>';
                            $query1="SELECT * from product where categoryid='$catid'";
                            $go_query1=mysqli_query($connection,$query1);
                            while($row=mysqli_fetch_array($go_query1)){
                                $productid=$row['productid'];
                                $productname=$row['productname'];
                                $price=$row['price'];
                                $photo=$row['photo'];
                                $product_cat_id=$row['categoryid'];

        ?>
        
        <div class="container col-md-3 d-flex justify-content-around">
            <div class="card text-center bg-transparent bd1 text-dark" style="width:300px; height:600px; border-radius: 20px; border: none; ">
                <img src="Photo/<?php echo $photo; ?>" alt="<?php echo $productname; ?>" class="card-img-top img-fluid" style="width:300px; height:400px;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $productname; ?><i class="bi bi-tags"></i></h5>
                    <p class="card-text"><?php echo $price; ?> MMK</p>
                    <div class="btn-group" role="group">
                        <a href="moreAbout.php?id=<?php echo $productid; ?>" class="btn  btn-outline-danger "><i class="bi bi-patch-exclamation"></i>More Info</a>
                        <a href="addtocart.php?id=<?php echo $productid; ?>" class="btn btn-danger"><i class="bi bi-cart4"></i>Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>   
        <?php
            }}
        ?>

    </div>
</div>
<div class="col-md-12">
  <div class="row">
    <?php
                   
                    $query="SELECT * from category";
                    $go_query=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_array($go_query)){
                        $catid=$row['catid'];
                        $catname=$row['catname'];
                        $catphoto=$row['catphoto'];
                    ?>

    <div class="container col-md-2 mb-2 bd1">
        <div>
            <a href="product.php?cid=<?php echo $catid; ?>" class="mt-3"><img src="Photo/<?php echo $catphoto; ?>" class="img-fluid d-block w-100" style="width:150px; height:250px;"></a>
            
        </div>
        <a href="product.php?cid=<?php echo $catid; ?>" class="text-decoration-none text-dark">
        <h4 class="text-center"><?php echo $catname; ?></h4></a>
      </div>

<?php
}
?>

</div>
<tr>
           <td><br /><br /></br></td>
           </tr>

<?php include'contactUs.php'; ?>
</body>
</html>