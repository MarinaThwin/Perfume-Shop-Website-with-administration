<?php 
session_start();
include 'admin/conn.php';
 
 
if (!empty($_SESSION['user'])) {
    $user_name = $_SESSION['user'];
    $query = "SELECT * from user where username='$user_name'";
    $go_query = mysqli_query($connection, $query);
    while ($out = mysqli_fetch_array($go_query)) {
        $user_id = $out['userid'];
        $user_name = $out['username'];
        $password=$out['password'];
        $email = $out['email'];
        $phone = $out['phone'];
        $address = $out['address'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<?php
  include ("header.php");
?>

    <div class="container mt-5">
        <div class="col-md-12">
            <b><h2 >Account Seting</b></h2>
        </div>
    <form class="row g-3 needs-validation" novalidate  method="POST" action="set.php">
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label"><b>Name</label></b>
    <input type="text" class="form-control" id="validationCustom01" value="<?php if(isset($user_name)){echo $user_name;}?>" name="username" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label"><b>Password</label></b>
    <input type="password" class="form-control" id="validationCustom01" value="<?php if(isset($password)){echo $password;}?>" name="password" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-12">
    <label for="validationCustom02" class="form-label"><b>Email</label></b>
    <input type="email" class="form-control" id="validationCustom02" value="<?php if(isset($email)){echo $email;}?>" name="email" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-12">
    <label for="validationCustom02" class="form-label"><b>Phone Number</label></b>
    <input type="tel" class="form-control" id="validationCustom02" value="<?php if(isset($phone)){echo $phone;}?>"  name="phone" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  
  <div class="col-md-12">
    <label for="validationCustom05" class="form-label"><b>Address</label></b>
    <textarea name="address" class="form-control"><?php if(isset($address)){echo $address;}?></textarea>
    <div class="invalid-feedback">
      Please provide a valid street.
    </div>
  </div>

 
  <div class="col-12">
  <input type="hidden" value="<?php echo $user_id ?>" name="userid" />
<input type="submit" name="submit" value="Save" class="btn btn-danger " />

  </div>
</form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
