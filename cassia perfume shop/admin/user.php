<?php
session_start();
include 'conn.php';
include 'function.php';
if(isset($_POST['btnadduser']))
{
    adduser();//function call
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .card{
            background-color:#f7c614;
        }
    </style>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<body>
   <?php
   include 'header.php';
   ?>
   <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Welcome Admin,
                <span class="text-danger">
                <?php
                    if(isset($_SESSION['admin']))
                    {
                        echo $_SESSION['admin'];
                    }
                    else
                    {
                        $_SESSION['admin']='';
                    }
                    ?>     
                </span>
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-header text-center bg-danger">
                    Add User
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">User Name</label>
                            <input type="text" name="username" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="password" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Confirm Password</label>
                            <input type="password" name="cpassword" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">User Role</label>
                            <select name="role" id="" class="form-select">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div class="d-grid">
                            <input type="submit" value="Add User" class="btn btn-danger" name="btnadduser">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   </div>
</body>
</html>