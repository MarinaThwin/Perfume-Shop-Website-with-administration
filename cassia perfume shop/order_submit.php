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
            <b><h2 >Quick Order Form</b></h2>
            <p class="mt-3 font-weight">Fill in the form below to place your order quickly</p>
        </div>
    <form class="row g-3 needs-validation" novalidate  method="POST" action="submit.php">
  <div class="col-md-6">
    <label for="validationCustom01" class="form-label"><b>Name</label></b>
    <input type="text" class="form-control" id="validationCustom01" value="<?php if(isset($user_name)){echo $user_name;}?>" name="username" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom02" class="form-label"><b>Email</label></b>
    <input type="email" class="form-control" id="validationCustom02" value="<?php if(isset($email)){echo $email;}?>" name="email" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom02" class="form-label"><b>Phone Number</label></b>
    <input type="tel" class="form-control" id="validationCustom02" value="<?php if(isset($phone)){echo $phone;}?>"  name="phone" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  
  <div class="col-md-6">
    <label for="validationCustom05" class="form-label"><b>Address</label></b>
    <textarea name="address" class="form-control"><?php if(isset($address)){echo $address;}?></textarea>
    <div class="invalid-feedback">
      Please provide a valid street.
    </div>
  </div>

  <div class="col-md-3">
    <label for="validationCustom04" class="form-label"><b>Payment Method</label></b>
    <select class="form-select" id="validationCustom04" name="payment_type" required>
      <option value="KBZ Pay">KBZ Pay</option>
      <option value="AYA Pay">AYA Pay</option>
      <option value="Wave Pay">Wave Pay</option>
    </select>
    <div class="invalid-feedback">
      Please select a valid state.
    </div>
  </div>
  <div class="col-12">
  <input type="hidden" vvalue="<?php echo $user_id ?>" name="userid" />
<input type="submit" name="submit" value="Submit" class="btn btn-primary" />

  </div>
</form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
