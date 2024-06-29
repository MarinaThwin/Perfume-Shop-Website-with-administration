<?php
session_start();
include 'conn.php';
include 'function.php';
    
if(isset($_POST['btnlogin']))
{
    admin_login();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
           
            background-color: #ffedf1;
  
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: sans-serif;
        }

        .container {
            width: 100%;
            margin: auto;
            padding: 20px;
            height: 100%;
           
        }

        .fas.fa-lock {
            color: #fff;
            margin-bottom: 20px;
        }

        .login,
        .register {
            width: 100%
        }

        /* Login Style*/
        .login {
            float: right;
            background-color: #fafafa;
            height: 100%;
            border-radius: 0 10px 10px 0;
            text-align: center;
            padding-top: 100px;
        }

        .login h1 {
            margin-bottom: 40px;
            font-size: 2.5em;
        }

        input[type="username"],
        input[type="password"] {
            width: 100%;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 30px;
            border: none;
            background-color: #eeeeef;
        }

        input[type="checkbox"] {
            float: left;
            margin-right: 5px;
        }

        .login span {
            float: left
        }

        .login a {
            float: right;
            text-decoration: none;
            color: #000;
            transition: 0.3s all ease-in-out;
        }

        .login a:hover {
            color: #9526a9;
            font-weight: bold
        }

        .login button {
            width: 100%;
            margin: 30px 0;
            padding: 8px;
            border: none;
            background-color: #718355;
            color: #fff;
            font-size: 20px;
            cursor: pointer;
            transition: 0.3s all ease-in-out;
        }

        .login button:hover {
            width: 97%;
            border-radius: 5px;
            background-color: #adc178;
            border: 1px solid #718355;
        }

        .login hr {
            width: 30%;
            display: inline-block;
        }

        .login p {
            display: inline-block;
            margin: 0px 10px 30px;
        }

        .login ul {
            list-style: none;
            margin-bottom: 40px;
        }

        .login ul li {
            display: inline-block;
            margin-right: 30px;
            cursor: pointer;
        }

        .login ul li:hover {
            opacity: 0.6;
        }

        .login ul li:last-child {
            margin-right: 0;
        }

        .login .copyright {
            display: inline-block;
            float: none;
        }

        .input-icon {
            position: relative;
            margin-bottom: 30px;
        }

        .input-icon i {
            position: absolute;
            left: 20px;
            top: 10px;
            color: #555;
        }

        .input-icon input[type="text"],
        .input-icon input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px 10px 10px 30px;
            border: none;
            background-color: #eeeeef;
        }


        /* Register Style*/
        .register {
            float: left;
            /* background-image: linear-gradient(135deg, #23212f 5%, #9526a9 95%); */
            background-image:
            linear-gradient(90deg, rgba(113,131,85, 0.8), rgba(173,193,120, 0.8)),
            repeating-linear-gradient(-45deg, #718355, #718355 1.5px, #adc178 2px, #adc178 4px);
            /* height: 100%; */
            color: #fff;
            border-radius: 10px 0 0 10px;
            text-align: center;
            padding: 67px 0;
            height: 73%;            /* #718355  #adc178*/
        }

        .register h2 {
            margin: 30px 0;
            font-size: 50px;
            letter-spacing: 3px
        }

        .register p {
            font-size: 18px;
            margin-bottom: 30px;
        }



        @keyframes button-grow {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.1);
            }
        }

        .login-button {
    
            transition: transform 0.3s;
        }

        .login-button:hover {
            animation: button-grow 0.3s forwards;
        }
    </style>

</head>

<body>

    
        <form action="" method="post">
        <div class="login">
            <div class="container">
                <h1>Log In</h1>
                <div class="input-icon">
                    <i class="fas fa-user"></i>
                    <input name="username" type="text" placeholder="Username">
                </div>
                <div class="input-icon">
                    <i class="fas fa-lock" style="color: rgb(95, 95, 95);"></i>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <br>
               
                <button name="btnlogin">Login</button>

                <div class="clearfix"></div>
               
            </div>
        </div>
        </form>
    </div>
</body>

</html>