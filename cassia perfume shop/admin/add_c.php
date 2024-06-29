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
    <title>Carosel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</head>
<body >
    <?php include 'header.php'; ?>

    <?php
                    if(isset($_POST['btnaddcaro']))
                    {
                        insert_carosel();
                    }
                    if(isset($_GET['action'])&&$_GET['action']=='delete')
                    {
                        delCarosel();
                    }
                    if(isset($_POST['btnupcaro']))
                    {
                        updateCarosel();
                    }
    ?>
    <div class="row">
    <form action="" method="post" class="col-md-6 offset-md-3 s" enctype="multipart/form-data">
                    <div class="mb-3 ">
                        <h4 class="text-center">Add Carosel</h4>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Name</label>
                        <input type="text" class="form-control" name="caroname">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Label</label>
                        <input type="text" class="form-control" name="carolabel">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Photo</label>
                        <input type="file" name="carophoto" class="form-control ">
                    </div>
                    <div class="d-grid">
                        <input type="submit" value="Add Carosel" name="btnaddcaro" class="btn btn-warning"> 
                    </div>
                </form>

                <hr>
                <?php
                    if(isset($_GET['action'])&&$_GET['action']=='edit')
                    {
                        $caroid=$_GET['caroid'];
                        $query="SELECT * from carosel where caroid='$caroid'";
                        $go_query=mysqli_query($connection,$query);
                        while($out=mysqli_fetch_array($go_query))
                        {
                            $caroname=$out['caroname'];
                            $carophoto=$out['carophoto'];
                            $carolabel=$out['carolabel'];

                        
                    
                ?>

<form action="" class="col-md-6 offset-md-3 s" method="post" enctype="multipart/form-data">
<div class="mb-3 ">
                        <h4 class="text-center">Update Carosel</h4>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Name</label>
                        <input type="text" class="form-control" name="caroname" value="<?php echo $caroname ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Label</label>
                        <input type="text" class="form-control" name="carolabel" value="<?php echo $carolabel ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Photo</label>
                        <input type="file" name="carophoto" class="form-control " value="<?php echo $carophoto ?>">
                    </div>
                    <div class="d-grid">
                        <input type="submit" value="Update Carosel" name="btnupcaro" class="btn btn-warning"> 
                    </div>
                </form>
                
                <?php
                    }
                }
                ?>
                </div>
<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">Carosel</div>
                    <table class="table table-hover">
                        <tr>
                            <th>No</th>
                            <th>Carosel Name</th>
                            <th>Carosel Label</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                        <?php
  $query="Select * from carosel";
  $go_query=mysqli_query($connection,$query);
  while($row=mysqli_fetch_array($go_query)){
  $caroid=$row['caroid'];
  $caroname=$row['caroname'];
  $carophoto=$row['carophoto'];
  $carolabel=$row['carolabel'];

                            
                            echo "<tr>";
                            echo "<td>{$caroid}</td>";
                            echo "<td>{$caroname}</td>";
                            echo "<td>{$carolabel}</td>";
                            echo "<td><img src='../Photo/{$carophoto}' width=200' height='100'></td>";
                            echo "<td>
                            <a href='add_c.php?action=edit&caroid={$caroid}' class='btn btn-success'>Edit</a>
                            <a href='add_c.php?action=delete&caroid={$caroid}' class='btn btn-danger'>Delete</a>
                            </td>";
                            echo "</tr>";
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>