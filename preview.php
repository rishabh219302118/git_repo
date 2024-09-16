<?
include('includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product view</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!--css file-->
    <link rel="stylesheet" href="../style.css">


</head>
<body class="bg-light">
    <!-- navbar -->
 <div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <img src="../images/logo.png" alt="" class="img-fluid" style="max-height: 40px;">
        </div>
    </nav>
 </div>

    
<?php

echo "<div class='d-flex justify-content-center' style='max-width: 540px;'>
  <div class='row g-0'>
    <div class='col-md-4'>
      <img src='$photo' class='img-fluid rounded-start' alt='...'>
    </div>
    <div class='col-md-8'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class='card-text'><small class='text-body-secondary'>Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
</div>";
?>
    
        

    
</body>
</html>