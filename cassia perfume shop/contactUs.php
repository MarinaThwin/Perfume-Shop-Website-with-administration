<?php
include 'admin/conn.php';
?>
<?Php 
function contact(){
    global $connection;
    $conemail=$_POST['email'];
    $conmessage=$_POST['message'];
    $query="INSERT into contactus(conemail,context,status) values('$conemail','$conmessage','0')";
            $go_query=mysqli_query($connection,$query);
            if(!$go_query)
                {
                    die("QUERY FAILED".mysqli_error($connection));
                }
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
</head>
<style>
    ::placeholder {
  color: black;
  opacity: 1; /* Firefox */
  
}

</style>
<body>
    <br/>
    <div class="continer " style="background-color: #f7dae0;">
    <div class="row d-flex align-items-center p-3">
        
        <div class="col-4">
            <h3><i class="bi bi-geo-alt"><b></i>Location & Information</b></h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3818.5381679307234!2d96.12254577348396!3d16.849252118088007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c19577238630d1%3A0x98bff65eddbf2f34!2sClothes%20Fashion%20Shop!5e0!3m2!1sen!2smm!4v1704015999880!5m2!1sen!2smm" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
             </div>
        <div class="col-4 text-center">
            <h4><i class="bi bi-shop"></i><b>Address</b></h4>
            <p>646 Insein Rd,Hlaing Township, Yangon</p>
            <h4 ><i class="bi bi-telephone"></i><b>Phone</b> </h4><p>09123456789</p>
            
            <h4><b>Opening Hours</b></h4>
            <p> 8AM-7PM Everyday</p>
            <p><b>FOLLOW US</b></p>
                    <ul class="d-flex" style="list-style: none;">
                        <li><a href="#" style="text-decoration: none;" class="text-dark m-4"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="#" style="text-decoration: none;" class="text-dark m-4"><i class="bi bi-twitter-x"></i></a></li>
                        <li><a href="#" style="text-decoration: none;" class="text-dark m-4"><i class="bi bi-youtube"></i></a></li>
                        <li><a href="#" style="text-decoration: none;" class="text-dark m-4"><i class="bi bi-instagram"></i></a></li>
                    </ul>
        </div>
        <div class=" col-4">
                    <h2><b>Connect Us</b></h2>
                    <form action="" method="post">
                        <div class="input-box" >
                            <input type="email" name="email" class="form-control" style="width:300px; height:50px;" required placeholder="Please Enter Your Email" />
                        </div>
                        
                        <div class="input-box">
                            <br>
                            <textarea name="message" class="form-control" style="width:300px; height:100px;"  required  placeholder="Please Write What Do You Want To Tell Us"></textarea>
                        </div>
                        <br>
                        <input type="submit" name="submitc" value="Submit" class="btn btn-danger "  style="width:300px;"/>
                    </form>
                    <?php 
                        if(isset($_POST['submitc']))
                        {
                            contact();
                        }
                    ?>
        </div>
    </div>
    </div>
    <!-- <div class="d-block text-center"><b>@2024 CASSIA </b> Shop Powered By DWD48</div> -->
</body>
</html>