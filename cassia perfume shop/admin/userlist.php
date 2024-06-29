<?php
session_start();
include 'conn.php';
include 'function.php';
if(isset($_GET['action'])&& $_GET['action']=='delete')
{
    deluser();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Userlist</title>
</head>
<style>
        .main-btn{
        background-color: #718355 !important;
        color: #fff !important;
        transition: all 0.3s;
        }
        .main-btn:hover{
            background-color: #adc178 !important;
            border: 1px solid #718355;
        }

        body{
            background-color: #ebf2fa !important;
        }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<body>
    <?php include 'header.php' ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Welcome Admin,
                    <span class="text-danger">
                    <?php 
                            if(isset($_SESSION['admin']))
                            {echo $_SESSION['admin'];}
                            else{$_SESSION['admin']="";}
                            ?>
                    </span>
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    
                    <thead class="thead-light">
                        <tr>
                            <th>User ID</th>
                            <th>Username</th>
                            <th>User Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                        if(isset($_GET['id'])&& $_GET['action']=='delete'){
                            deluser();
                        }
                        $query="Select * from user order by userid desc";
                        $go_query=mysqli_query($connection,$query);
                        while($row=mysqli_fetch_array($go_query))
                        {
                        $userid=$row['userid'];
                        $username=$row['username'];
                        $role=$row['role'];
                        echo "<tr>";
                        echo "<td>{$userid}</td>";
                        echo "<td>{$username}</td>";
                        echo "<td>{$role}</td>";
                        echo "<td><a href='userlist.php?action=delete&id={$userid}' class='btn btn-danger' onclick=\"return confirm('Are you sure?')\">Delete</a></td>";
                        echo "</tr>";                  
                    } 
                    ?>
               
                </table>              
                <a href="user.php" class="btn main-btn">Add User</a>
            </div>              
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>



</html>