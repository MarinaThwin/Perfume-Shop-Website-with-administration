<?php
include 'conn.php';
include 'function.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>
<style>
     .body{
            background-color: #ffe5ec;
    }
    .bd1{
        backdrop-filter: blur(7px);
        
    }
</style>
<body class="body">
    <?php 
    include 'header.php'; 
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    Welcome Admin,
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
                </h2>
            </div>
        </div>
        <div class="row bd1">
            <div class="col-md-6">
                <?php
                    if(isset($_POST['btnaddcat']))
                    {
                        insert_category();
                    }
                    if(isset($_GET['action'])&&$_GET['action']=='delete')
                    {
                        delCategory();
                    }
                    if(isset($_POST['btnupcat']))
                    {
                        updateCategory();
                    }
                ?>
                <form action="" method="post" enctype="multipart/form-data" class="text-dark">
                    <div class="mb-3 text-dark">
                        <h4 class="text-center">Add Category</h4>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label ">Category Name</label>
                        <input type="text" class="form-control" name="category">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Photo</label>
                        <input type="file" name="catphoto" class="form-control">
                    </div>
                    <div class="d-grid">
                        <input type="submit" value="Add Category" name="btnaddcat" class="btn btn-danger"> 
                    </div>
                </form>
                <hr>
                <?php
                    if(isset($_GET['action'])&&$_GET['action']=='edit')
                    {
                        $catid=$_GET['cid'];
                        $query="Select * from category where catid='$catid'";
                        $go_query=mysqli_query($connection,$query);
                        while($out=mysqli_fetch_array($go_query))
                        {
                            $catname=$out['catname'];
                            $catphoto=$out['catphoto'];

                        
                    
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <h4 class="text-center text-dark">Update Category</h4>
                    </div>
                    <div class="mb-3 text-dark">
                        <label  class="form-label">Update Category</label>
                        <input type="text" class="form-control" name="catname" value="<?php echo $catname ?>"><br>
                        <input type="file" name="catphoto" class="form-control" value="<?php echo $catphoto ?>">
                    </div>
                    <div class="d-grid">
                        <input type="submit" value="Update Category" name="btnupcat" class="btn btn-danger"> 
                    </div>
                </form>
                <?php
                    }
                }
                ?>
            </div>
            
            <div class="col-md-6 ">
                <table class="table table-hover text-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        $go_query="Select * from category";
                        $query=mysqli_query($connection,$go_query);
                        while($row=mysqli_fetch_array($query))
                        {
                            $catid=$row['catid'];
                            $catname=$row['catname'];
                            $catphoto=$row['catphoto'];

                            echo "<tr>";
                            echo "<td>{$catid}</td>";
                            echo "<td>{$catname}</td>";
                            echo "<td><img src='../Photo/{$catphoto}' width='100' height='130'></td>";
                            echo "<td>
                            <a href='category.php?action=delete&cid={$catid}' class='btn btn-danger'>Delete</a>||<a href='category.php?action=edit&cid={$catid}' class='btn btn-success'>Edit</a>
                            </td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</html>