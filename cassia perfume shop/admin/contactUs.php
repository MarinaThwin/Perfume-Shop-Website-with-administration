<?php
session_start();
global $connection;
include('conn.php');
include('function.php');
$mess=mysqli_query($connection,"SELECT * from contactus order by conid desc");
 
 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact us </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style type="text/css">
        body{
            padding: 50px;
        }
        .navbar {
        background-color: #f7c614;
        box-shadow: 0 0 10px 1px #ddd;
    }

    .logo{
      height: 3rem;
    }

    ul{
      margin-left: 3.5rem;
    }

    ul li a:hover{
      color: #71797E !important;
    }
    </style>
</head>
<body>
<?php include'header.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                        <tr>
                            <th>Id</th>
                            <th>email</th>
                            <th>Message</th>
                            <th>status</th>
                        </tr>
                    <?php while($out=mysqli_fetch_array($mess))
                    {
						$check=$out['status'];
						{
							if($check>0)
                            {
								$show='<tr class="mark">';
							}
							else
							{
								$show='<tr>';
							}
							$show.='<td>'.$out['conid'].'</td>';
							$show.='<td>'.$out['conemail'].'</td>';
							$show.='<td>'.$out['context'].'</td>';
							$chesec=$out['status'];
							
							if($out['status'])
                            {
								$show.='<td><a href="const.php?id='.$out['conid'].'&status=0" class="btn btn-danger">
								Replied</a></td>';
                            }
							else
							{
                                $show.='<td><a href="const.php?id='.$out['conid'].'&status=1" class="btn btn-success">
								Mark as Replied</a></td>';
                            }
							$show.='</tr>';
							echo $show; 
                        }
					}
				    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>