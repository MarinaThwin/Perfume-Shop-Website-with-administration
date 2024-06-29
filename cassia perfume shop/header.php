<?php
include 'admin/conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
</head>
<style>
  .bd2{
    background-color:#f7dae0;
  }
</style>
<body  style="font-family: Abel; font-weight:500;">
<?php if(empty($_SESSION['user'])): ?>
<nav class="navbar navbar-expand-lg  nav-fill position-sticky top-0 z-3 bd2" style=" letter-spacing: 2px;  backdrop-filter: blur(8px);">
  <div class="container-fluid">
    <a class="navbar-brand text-danger" style="font-size:2.5rem; letter-spacing: 2px;" href="#">CASSIA</a>
    <button class="navbar-toggler btn " type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span><i class="bi bi-three-dots-vertical"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 " style="font-size:1.3rem; ">
        <li class="nav-item ">
          <a class="nav-link active" aria-current="page" href="index.php"><i class="bi bi-house"></i>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="aboutUs.php"><i class="bi bi-award"></i>About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="show_product.php"><i class="bi bi-tags"></i>Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="login.php"><i class="bi bi-person-circle"></i>Login</a>
        </li>
      </ul>
      </form>
    </div>
  </div>
</nav>

<?php else: ?>

<nav class="navbar navbar-expand-lg nav-fill position-sticky top-0 z-3 bd2" style=" letter-spacing: 2px;  backdrop-filter: blur(8px);">
  <div class="container-fluid">
    <a class="navbar-brand" style="font-size:2.5rem; letter-spacing: 2px;" href="#">CASSIA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 " style="font-size:1.3rem;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php"><i class="bi bi-house"></i>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="aboutUs.php"><i class="bi bi-award"></i>About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="show_product.php"><i class="bi bi-tags"></i>Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="cart.php"><i class="bi bi-cart3"></i>Cart</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="logout.php"><i class="bi bi-door-open"></i>Logout</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
<?php endif; ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
