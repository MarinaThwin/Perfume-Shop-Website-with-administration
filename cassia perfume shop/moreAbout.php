<?php
session_start();
include 'admin/conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>More About Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg nav-fill position-sticky top-0 z-3 " style=" letter-spacing: 2px;  backdrop-filter: blur(8px);">
  <div class="container-fluid">
    <a class="navbar-brand" style="font-size:2.5rem; letter-spacing: 2px;" href="#">CASSIA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 " style="font-size:1.3rem;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php"><i class="bi bi-house"></i>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="aboutUs.php"><i class="bi bi-award"></i>About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="show_product.php"><i class="bi bi-tags"></i>Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="cart.php"><i class="bi bi-cart3"></i>Cart</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="logout.php"><i class="bi bi-door-open"></i>Logout</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
<?php
$id=$_GET['id'];
            $query="SELECT * from product where productid='$id'";
            $go_query=mysqli_query($connection,$query);
                while($row=mysqli_fetch_array($go_query)){
                    $productid=$row['productid'];
                    $productname=$row['productname'];
                    $price=$row['price'];
                    $photo=$row['photo'];
                    $product_cat_id=$row['categoryid'];
                    $info=$row['productinfo'];
        ?>
        <div class="row container d-flex align-items-center">
          <div class="col ">
            <img src="Photo/<?php echo $photo; ?>" alt="<?php echo $productname; ?>" class="img-fluid p-3" style="width:500px; height:100vh;">
          </div>
          <div class="col text-center  justify-content-center ">
            <h5 class="card-title align-self-center"><b><?php echo $productname; ?><i class="bi bi-tags"></i></h5></b>
            <p class="card-text align-self-center"><?php echo $price; ?> MMK</p>
            <p class="card-text"><?php echo $info; ?></p>           

            <a href="addtocart.php?id=<?php echo $productid; ?>" class="btn btn-danger"><i class="bi bi-cart4"></i>Add to Cart</a>

          </div>
        </div>
        <?php
            }
        ?>
                   <tr>
           <td><br /><br /></td>
           </tr>

        <?php include'contactUs.php';?>
</body>
</html>