<?php
session_start();
include 'Admin/conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<style>
 
    .container{
    
        max-width: 950px;
        display: grid;
        margin: 10px auto 10px auto;
        justify-content: center;
        align-items: center;
    }
    .box .box-img img{
        object-fit: cover;
        height: 500px;
        transition: 0.5s;
        border-radius: 20px;
       
    }
    .box-img{
        width: 1000px;
        margin-top: 1rem;
    }

    .box h3{
        margin-top: 1rem;
        text-align: center;
        margin-bottom: 1rem;

    }

    .box-img img:hover{
        transform: scale(1.05);
        filter: brightness(1.1) ;
        box-shadow: black 5px 5px 20px;
    }
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
<link href="
https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="
https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<body class="bd">
<?php
        include 'header.php';
        include 'carosel.php';
    ?>

<tr>
           <td><br /><br /></td>
           </tr>
<div class="col-md-12 bd1">
  <div class="row">
    <?php
                   
                    $query="SELECT * from category";
                    $go_query=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_array($go_query)){
                        $catid=$row['catid'];
                        $catname=$row['catname'];
                        $catphoto=$row['catphoto'];
                    ?>

    <div class="container ">
      <div class="box carousel ">
        
        <div class="text-center">
        
            <a href="product.php?cid=<?php echo $catid; ?>" class=""><img src="Photo/<?php echo $catphoto; ?>" class="img-fluid " style="width:1000px; height:500px;"></a>
            
        </div>
        <a href="product.php?cid=<?php echo $catid; ?>" class="text-decoration-none"><h3 class="text-dark" ><?php echo $catname; ?></h3></a>
      </div>
    </div>

    
<?php
}
?>


</div>
</div>
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
                        <a href="moreAbout.php?id=<?php echo $productid; ?>" class="btn  btn-light"><i class="bi bi-patch-exclamation"></i>More Info</a>
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

           <tr>
           <td><br /><br /></td>
           </tr>

<?Php 
include'contactUs.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>