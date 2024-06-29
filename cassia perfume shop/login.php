<?php
session_start();
include 'admin/conn.php';
include 'header.php';

if (isset($_POST['login'])) {
    $name = $_POST['username'];
    $password = $_POST['password'];

    $errors = array(
        'username' => '',
        'password' => ''
    );

    if ($name == '') {
        $errors['username'] = 'This field could not be empty';
    }

    if ($password == '') {
        $errors['password'] = 'This field could not be empty';
    }

    $hpass = md5($password);
    $query = "SELECT * FROM user";
    $go_query = mysqli_query($connection, $query);

    while ($out = mysqli_fetch_array($go_query)) {
        $db_user_name = $out['username'];
        $db_password = $out['password'];
        $db_user_role = $out['role'];
        if($db_user_name == $name && $db_password == $hpass && $db_user_role == 'user') {
          $_SESSION['user'] = $name;
          $_SESSION['userid'] = $out['userid'];
          header('location:show_product.php');
        } elseif ($db_user_name==$name && $db_password==$hpass && $db_user_role== 'admin')
        {
          $_SESSION['admin']=$name;
          header('location:admin/dashboard.php');
        } 
        else{
          echo "<script>window.alert('User Doesn't Exist ')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <!-- tailwind cdn -->
    
   
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
      html {
        height: 100%;
      }
      body {
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
        background: linear-gradient(#f7c614, #ebf2fa);
        background-image:url(Photo/login.png);
        background-size:50%;
       background-repeat: no-repeat;
       background-position:right;
       background-color: #ffedf1;
      }

      .login-box {
        position: absolute;
        top: 50%;
        right:50%;
        width: 400px;
        padding: 40px;
        transform: translate(-50%, -50%);
        background: indigo;
        box-sizing: border-box;
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.6);
        border-radius: 10px;
      }

      .login-box h2 {
        margin: 0 0 30px;
        padding: 0;
        color: #fff;
        text-align: center;
        font-size: 2rem;
        font-weight: 500;
      }

      .login-box .user-box {
        position: relative;
      }

      .login-box .user-box input {
        width: 100%;
        padding: 10px 0;
        font-size: 16px;
        color: #fff;
        margin-bottom: 30px;
        border: none;
        border-bottom: 1px solid #fff;
        outline: none;
        background: transparent;
      }
      .login-box .user-box label {
        position: absolute;
        top: 0;
        left: 0;
        padding: 10px 0;
        font-size: 16px;
        color: #fff;
        pointer-events: none;
        transition: 0.5s;
      }

      .login-box .user-box input:focus ~ label,
      .login-box .user-box input:valid ~ label {
        top: -20px;
        left: 0;
        color: #fff;
        font-size: 14px;
      }

      .login-box form button {
        background-color: #fff;
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        color: #000;
        font-size: 16px;
        text-decoration: none;
        text-transform: uppercase;
        overflow: hidden;
        transition: 0.5s;
        margin-top: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        border: none;
      }

      .login-box button:hover {
        background: #adc178;
        color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 5px #adc178, 0 0 25px #adc178, 0 0 50px #adc178,
          0 0 100px #adc178;
      }

      .login-box button span {
        position: absolute;
        display: block;
      }

      .login-box button span:nth-child(1) {
        top: 0;
        left: -100%;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent, #718355);
        animation: btn-anim1 1s linear infinite;
      }

      @keyframes btn-anim1 {
        0% {
          left: -100%;
        }
        50%,
        100% {
          left: 100%;
        }
      }

      .login-box button span:nth-child(2) {
        top: -100%;
        right: 0;
        width: 2px;
        height: 100%;
        background: linear-gradient(180deg, transparent, #718355);
        animation: btn-anim2 1s linear infinite;
        animation-delay: 0.25s;
      }

      @keyframes btn-anim2 {
        0% {
          top: -100%;
        }
        50%,
        100% {
          top: 100%;
        }
      }

      .login-box button span:nth-child(3) {
        bottom: 0;
        right: -100%;
        width: 100%;
        height: 2px;
        background: linear-gradient(270deg, transparent, #718355);
        animation: btn-anim3 1s linear infinite;
        animation-delay: 0.5s;
      }

      @keyframes btn-anim3 {
        0% {
          right: -100%;
        }
        50%,
        100% {
          right: 100%;
        }
      }

      .login-box button span:nth-child(4) {
        bottom: -100%;
        left: 0;
        width: 2px;
        height: 100%;
        background: linear-gradient(360deg, transparent, #718355);
        animation: btn-anim4 1s linear infinite;
        animation-delay: 0.75s;
      }

      @keyframes btn-anim4 {
        0% {
          bottom: -100%;
        }
        50%,
        100% {
          bottom: 100%;
        }
      }

      .register-here{
        margin-top: 20px;
        text-align: center;
        font-size: 1rem;
        color: rgb(228 228 231);
      }

      .register-here a:link, .register-here a:visited{
        text-decoration: none;
        color: #adc178;
        font-weight: 500;
      }

      .register-here a:hover, .register-here a:active{
        text-decoration: underline;
      }
    </style>
   
  </head>

  <body>
     
    <div class="login-box">
      <h2>Login</h2>
      <form action="" method="post">
        <div class="user-box">       
          <input id="myInput" type="text" name="username" required="" />
          <label>Username</label>
          
        </div>
        <div class="user-box">       
          <input type="password" name="password" required=""  />
          <label>Password</label>
        </div>
        <button type="submit" class="main-btn" name="login">
        <span></span>
        <span></span>
        <span></span>
        <span></span>  
        Login
      </button>
      <p class="register-here">
          Not a member? <a href="register.php" class="register-link">Register here</a>
        </p>
      </form>
    </div>

  </body>
</html>
