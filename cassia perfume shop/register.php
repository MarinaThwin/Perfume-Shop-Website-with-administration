<?php
session_start();
include 'admin/conn.php';
include 'header.php';
function create_acc(){
    global $connection;
    global $user_name;
    global $password;
    global $email;
    global $phone;
    global $address;

    $hpass=md5($password);
    $query="select * from user where username='$user_name' and password='$hpass'";
    $user_query=mysqli_query($connection,$query);
    $count=mysqli_num_rows($user_query);
      if($count>0)
        {
          echo "<script>window.alert('already exists')</script>";
        }
        else
        {
          $query="INSERT into user (username,password,email,phone,address,role)";
          $query.="values ('$user_name','$hpass','$email','$phone','$address','user')";
          $go_query=mysqli_query($connection,$query);
            if(!$go_query)
            {
              die("QUERY FAILED".mysqli_error($connection));
            }
            else
                    {
                        echo "<script>window.alert('you successfully created an account')</script>";
                    }
              }
}
if (isset($_POST['register'])) //register button name
{
    $user_name = $_POST['username'];//textbox name
    $password = $_POST['password'];//textbox name
    $confirm_password = $_POST['confirm_password'];//textbox name
    $email = $_POST['email'];//textbox name
    $phone = $_POST['phone'];//textbox name
    $address = $_POST['address'];//textbox name

    $errors = array(
        'username' => '',
        'password' => '',
        'confirm_password' => '',
        'match_password' => '',
        'email' => '',
        'phone' => '',
        'address' => '',
    );

    if (empty($user_name)) {
        $errors['username'] = 'User Name must be entered';
    } else {
        if (strlen($user_name) < 3) {
            $errors['username'] = 'User Name needs to be longer';
        }
    }

    if (empty($password)) {
        $errors['password'] = 'This field could not be empty';
    } else {
        if (strlen($password) < 3) {
            $errors['password'] = 'Password needs to be longer';
        }
    }

    if (empty($confirm_password)) {
        $errors['confirm_password'] = 'This Field could not be empty';
    } else {
        if ($password != $confirm_password) {
            $errors['match_password'] = 'Password Do not match';
        }
    }

    if (empty($email)) {
        $errors['email'] = 'This field could not be empty';
    }

    if (empty($phone)) {
        $errors['phone'] = 'This field could not be empty';
    }

    if (empty($address)) {
        $errors['address'] = 'This field could not be empty';
    }

    foreach ($errors as $key => $value) {
        if (empty($value)) {
            unset($errors[$key]);
        }
    }

    if (empty($errors)) {
        create_acc();
        // addregister();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

*{
   font-family: Abel;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border:none;
   text-decoration: none;
}

.container{
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
}

.container .content{
   text-align: center;
}

.container .content h3{
   font-size: 30px;
   color:#333;
}

.container .content h3 span{
   background: crimson;
   color:#fff;
   border-radius: 5px;
   padding:0 15px;
}

.container .content h1{
   font-size: 50px;
   color:#333;
}

.container .content h1 span{
   color:crimson;
}

.container .content p{
   font-size: 25px;
   margin-bottom: 20px;
}

.container .content .btn{
   display: inline-block;
   padding:10px 30px;
   font-size: 20px;
   background: #333;
   color:#fff;
   margin:0 5px;
   text-transform: capitalize;
}

.container .content .btn:hover{
   background: crimson;
}

.form-container{
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
   background: #eee;
}

.form-container form{
   padding:20px;
   border-radius: 5px;
   box-shadow: 0 5px 10px rgba(0,0,0,.1);
   background: #fff;
   text-align: center;
   width: 500px;
}

.form-container form h3{
   font-size: 30px;
   text-transform: uppercase;
   margin-bottom: 10px;
   color:#333;
}

.form-container form input,
.form-container form select{
   width: 100%;
   padding:10px 15px;
   font-size: 17px;
   margin:8px 0;
   background: #eee;
   border-radius: 5px;
}

.form-container form select option{
   background: #fff;
}

.form-container form .form-btn{
   background: #fbd0d9;
   color:crimson;
   text-transform: capitalize;
   font-size: 20px;
   cursor: pointer;
}

.form-container form .form-btn:hover{
   background: crimson;
   color:#fff;
}

.form-container form p{
   margin-top: 10px;
   font-size: 20px;
   color:#333;
}

.form-container form p a{
   color:crimson;
}

.form-container form .error-msg{
   margin:10px 0;
   display: block;
   background: crimson;
   color:#fff;
   border-radius: 5px;
   font-size: 20px;
   padding:10px;
}
</style>

</head>
<body>
   <?
   
   ?>
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="username" name="username" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="confirm_password" required placeholder="comfirm your password">
      <input type="phone" name="phone" required placeholder="enter your phone number">
      <input type="address" name="address" required placeholder="enter your address">
      <input type="submit" name="register" value="register now" class="form-btn">
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>
   <img src="Photo/signup.png" class="img" alt="Sample image" height="500px" width="500px">
</div>

</body>
</html>

