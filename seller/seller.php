<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!--css file-->
    <link rel="stylesheet" href="../style.css">
    
    <style>
    .admin_image{
    width: 200px;
    object-fit: contain;
}
    </style>

</head>
<body>
<!-- navbar -->
 <div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
    <a href="../index.php"> <!-- Add the link to the homepage -->
        <img src="../images/logo.png" alt="logo" class="img-fluid" style="max-height: 40px;">
    </a>
</div>

    </nav>

    <!-- second child -->
     <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
     </div>
    <!-- third child -->
     <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-item-center" >
            <div class="p-3">
                <a href="#"><img src="../images/pass2.png" alt="" class="admin_image"></a>
                <p class="text-light text-center">Admin Name</p>
            </div>
            <div class="button text-center p-1 ">
                <button class="my-3 align-item-center"><a href="insert_product.php" class="nav-link text-light bg-info p-1 ">Insert Products</a></button>
                <button><a href="" class="nav-link text-light bg-info   p-1">View Product</a></button>
                <button><a href="" class="nav-link text-light bg-info p-1">Profile</a></button>
                <button><a href="" class="nav-link text-light bg-info p-1">Logout</a></button>
            </div>

        </div>
     </div>



 </div>
    

<!-- Bootstrap JS link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>