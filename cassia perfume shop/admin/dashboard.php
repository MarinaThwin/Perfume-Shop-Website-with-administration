<?php
session_start();
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard of Cassia</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../Admin/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    button{
        font-size: 1rem;
        border:none;
        outline:none;
        padding: 10px 12px;
        border-radius:10px;
        background-color: #e693a4;
        color:white;
        
    }
    .abcd{
        text-align: center;

    }
    .cardBox .card .numbers{
        color: #e693a4;
        font-size: 1.875em;
    }
    a{
        font-size:30px;
    }


</style>
</head>

<body>
<?php include 'header.php' ?>

<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2>Welcome Admin,
                    <span class="text-danger">
                        <?php 
                        if(isset($_SESSION['admin']))
                        {echo $_SESSION['admin'];}
                        else{$_SESSION['admin']="";}
                        ?>
                    </span>
                </h2>
            </div>
        </div>

            <!-- ======================= Cards ================== -->
            <a href="category.php" style="text-decoration: none; color:red;">
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers" >
                           
                        </div>
                        <div class="cardName" style="text-decoration: none; color:black;" >Category</div>
                        <?php
                        $query="Select * from category";
                        $get_query=mysqli_query($connection,$query);
                        $num=mysqli_num_rows($get_query);
                        echo $num;
                        ?>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="folder-outline"></ion-icon>
                    </div>
                </div>
            </a>
                
            <a href="userlist.php" style="text-decoration: none; color:red;">
                <div class="card">
                    <div>
                        <div class="numbers"></div>
                        <div class="cardName" style="text-decoration: none; color:black;">User</div>
                        <?php 
                            $total="select * from user";
                            $get_total=mysqli_query($connection,$total);
                            $num=mysqli_num_rows($get_total);
                            echo $num;
                        ?>
                    </div>
                    <div class="iconBx">
                    <ion-icon name="person-outline"></ion-icon>
                    </div>
                </div>
            </a>

            <a href="productlist.php" style="text-decoration: none; color:red;">
                <div class="card">
                    <div>
                        <div class="numbers"></div>
                        <div class="cardName" style="text-decoration: none; color:black;">Product</div>
                        <?php 
                            $total="select * from product";
                            $get_total=mysqli_query($connection,$total);
                            $num=mysqli_num_rows($get_total);
                            echo $num;
                        ?>
                    </div>

                    <div class="iconBx">
                    <ion-icon name="alarm-outline"></ion-icon>                    
                    </div>
                </div>
            </a>

            <a href="ordermgmt.php" style="text-decoration: none; color:red;">
                <div class="card">
                    <div>
                        <div class="numbers"></div>
                        <div class="cardName" style="text-decoration: none; color:black;">Order</div>
                        <?php 
                            $total="select * from orderdetail";
                            $get_total=mysqli_query($connection,$total);
                            $num=mysqli_num_rows($get_total);
                            echo $num;
                        ?>
                    </div>
                    <div class="iconBx">
                    <ion-icon name="receipt-outline"></ion-icon>
                    </div>
                </div>
            </a>

            <a href="add_c.php" style="text-decoration: none; color:red;">
                <div class="card">
                    <div>
                        <div class="numbers "></div>
                        <div class="cardName" style="text-decoration: none; color:black;">Carousel</div>
                        <?php 
                            $total="select * from carosel";
                            $get_total=mysqli_query($connection,$total);
                            $num=mysqli_num_rows($get_total);
                            echo $num;
                        ?>
                    </div>
                    <div class="iconBx" >
                    <ion-icon name="albums-outline"></ion-icon>                   
                    </div>
                </div>
            </a>

            <a href="contactUs.php" style="text-decoration: none; color:red;">
                <div class="card">
                    <div>
                        <div class="numbers" ></div>
                        <div class="cardName" style="text-decoration: none; color:black;">Letter from Customer</div>
                        <?php 
                            $total="select * from contactus";
                            $get_total=mysqli_query($connection,$total);
                            $num=mysqli_num_rows($get_total);
                            echo $num;
                        ?>
                    </div>
                    <div class="iconBx" >
                    <ion-icon name="reader-outline"></ion-icon>                    
                    </div>
                </div>
            </a>


            </div>
          
    <div class="abcd" >
        <div>
            <a href="user.php"><button class="btn btn-danger"><i class="fa-solid fa-user "></i>Add User</button>
            <a href="product.php"><button class="btn btn-danger" ><ion-icon name="alarm"></ion-icon>Add Product</button>
        </div>                                                                      
    </div>
    <!-- =========== Scripts =========  -->
    <script src="../admin/dashboard.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>