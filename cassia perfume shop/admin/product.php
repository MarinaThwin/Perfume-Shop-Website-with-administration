<?php
session_start();
include 'conn.php';
include 'function.php';
if (isset($_POST['btnaddproduct'])) {
   addproduct() ; 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<body>
    <?php
    include 'header.php';
    ?>

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

    <div class="container">

        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="card">
                    <div class="card-header text-center text-white bg-dark">Add Product</div>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mt-3">
                            <!-- <label for="" class="form-label">Product Name</label> -->
                            <input type="text" name="productname" class="form-control" placeholder="Product Name">
                        </div>
                        <div class="input-group mt-3">
                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                            <select name="category" id="inputGroupSelect01" class="form-select">
                                <option value="">-----Select One-----</option>
                                <?php
                                $query = "Select * from category";
                                $go_query = mysqli_query($connection, $query);
                                while ($row = mysqli_fetch_array($go_query)) {
                                    $catid = $row['catid'];
                                    $catname = $row['catname']; {
                                        echo "<option value={$catid}>{$catname}</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mt-3">
                            <!--<label for="" class="form-label">Price</label>-->
                            <input type="text" name="price" class="form-control" placeholder="Price">
                        </div>
                        <div class="mt-3">
                            <!--<label for="" class="form-label">Quantity</label>-->
                            <input type="text" name="qty" class="form-control" placeholder="Quantity">
                        </div>
                        <div class="mt-3">
                            <!--<label for="" class="form-label">Info</label>-->
                            <input type="text" name="info" class="form-control" placeholder="Product Info">
                        </div>
                        <div class="mt-3">
                            <!--<label for="" class="form-label">Photo</label> -->
                            <input type="file" name="photo" class="form-control" placeholder="Photo">
                        </div>
                        <div class="mt-3 d-grid">
                            <input type="submit" value="Add Product" name="btnaddproduct" class="btn btn-outline-dark">
                        </div>


                    </form>
                </div>

            </div>

        </div>

    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</html>