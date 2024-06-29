<?php
function addregister()
{
    global $connection;
    $username=$_POST['username'];
    $password=$_POST['password'];
    $confirmpassword=$_POST['cpassword'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
 
    if(empty($username))
    {
        echo "<script>window.alert('Please Enter User Name')</script>";
    }
    else
    {
        if(strlen($username)<3)
        {
            echo "<script>window.alert('User Name need to be longer.')</script>";
        }
    }
    if(empty($password))
    {
        echo "<script>window.alert('Please Enter Password}')</script>";
    }
    else
    {
        if(strlen($password)<3)
        {
            echo "<script>window.alert('Password need to be longer.')</script>";
        }
    }
    if(empty($confirmpassword))
    {
        echo "<script>window.alert('Please Enter  Confirm Password}')</script>";
    }
    else
    {
        if(strlen($confirmpassword)<3)
        {
            echo "<script>window.alert('Confirm Password need to be longer.')</script>";
        }
        else
        {
            if($password != $confirmpassword)
            {
                echo "<script>window.alert('Did not match password.')</scirpt>";
            }
        }
    }
     
    if(empty($email))
    {
          echo "<script>window.alert('Please enter your email.')</script>";
    }
    if(empty($phone))
    {
        echo "<script>window.alert('Please enter your phone.')</script>";
    }
    if(empty($address))
    {
        echo "<script>window.alert('Please enter your address.')</script>";
    }

    else if($email!="" && $username!="")
    {

       $query="select * from user where username='$username' and email='$email'";
       $ch_query=mysqli_query($connection,$query);
       $count=mysqli_num_rows($ch_query);
         if($count>0)
         {
            echo"<script>window.alert('This is already exist')</script>";
         }
         else
         {    
            $hashvalue=md5($password);          
            $query="insert into user(username,password,email,phone,address,role) values('$username','$hashvalue','$email','$phone','$address','user')";
            $go_query=mysqli_query($connection,$query);
            if(!$go_query)
                {
                    die("QUERY FAILED".mysqli_error($connection));
                }
         }
   }
}

function user_login()
{
    global $connection;
    $useraname=$_POST['username'];//textbox name
    $password=$_POST['password'];//textbox name
    $hpass=md5($password);
    $query="Select * from user";
    $go_query=mysqli_query($connection,$query);
    while($out=mysqli_fetch_array($go_query))
    {
        $dbusername=$out['username'];//fieldname
        $dbuserpassword=$out['password'];
        $dbuserrole=$out['role'];
        if($dbusername==$useraname && $dbuserpassword==$hpass && $dbuserrole=='user')
        {
            $_SESSION['user']=$useraname;
            header('location:cart.php');
        }
        else
        {
            echo "<script>window.alert('Invalid User Name and password')</script>";
            echo "<script>window.location.href='login.php'</script>";
        }
    }
}

function show_result()
{
    global $connection;
   $data =$_POST['search'];
    $query="SELECT * from product where productname LIKE '%$data%'";
   $go_query=mysqli_query($connection,$query);
   $count_result=mysqli_num_rows($go_query);
    // print-r($count_result);
    // dd();
   if($count_result==0)
    {
    echo '<div class="blockquote">Sorry, No result found!<a href="index.php">Back</a></div>';
   }
    elseif($count_result>0)
    {
     while($out=mysqli_fetch_array($go_query))
    {
        $productid=$out['productid'];
       $productname=$out['productname'];
       $categoryid=$out['catid'];
       $price=$out['price'];
       $qty=$out['qty'];
       $photo=$out['photo'];
        $display='<div class="col-md-4 col-sm-4">';
       $display.='<div class="card" height="300px">';
        $display.='<img src="../Photo/{$photo}" class="card-img-top">';
        $display.='<div class="card-body">';
      $display.='<h3>{$productname}</h3>';
        $display.='<p>{$price}</p>';
        $display.='<p class="text-center"><a href="Addtocart.php?id='.$productid.'" class="btn btn-info">Add to Cart</a></p>';
       $display.='</div></div></div>';
      echo $display;
    }
   }
 
}

            
?>