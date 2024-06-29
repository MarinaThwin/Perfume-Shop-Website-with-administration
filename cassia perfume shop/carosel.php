<?php
include 'Admin/conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>


<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php
        $query = "SELECT * FROM carosel";
        $go_query = mysqli_query($connection, $query);
        $isActive = true;
        $slideIndex = 0;
        while ($row = mysqli_fetch_array($go_query)) {
            echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="' . $slideIndex . '" ' . ($isActive ? 'class="active" aria-current="true"' : '') . ' aria-label="Slide ' . ($slideIndex + 1) . '"></button>';
            $isActive = false;
            $slideIndex++;
        }
        ?>
    </div>
    <div class="carousel-inner">
        <?php
        mysqli_data_seek($go_query, 0); // Reset pointer to the beginning of the result set
        $isActive = true;
        while ($row = mysqli_fetch_array($go_query)) {
            $caroid = $row['caroid'];
            $caroname = $row['caroname'];
            $carophoto = $row['carophoto'];
            $carolabel = $row['carolabel'];
            echo '<div class="carousel-item  ' . ($isActive ? 'active' : '') . '">';
            echo '<img src="Photo/' . $carophoto . '" class="d-block justify-content-center w-100" style="height:500px;" alt="' . $caroname . '">';
            echo '<div class="carousel-caption d-none d-md-block text-light" style="font-size:1.6rem;">';
            echo '<h5 style="font-size:1.8rem;">' . $caroname . '</h5>';
            echo '<p>' . $carolabel . '</p>';
            echo '</div>';
            echo '</div>';
            $isActive = false;
        }
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>