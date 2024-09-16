<?php
include('includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OLXmuj</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome link -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <!--css file-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
  
    <!-- Navbar -->
     
    <div class="container-fluid p-0">
        <!-- First child -->
        <nav class="navbar navbar-light fixed-top navbar-expand-lg " style="background-color: #BBE2EC;">
            <div class="container-fluid">
                <a href="./index.php"> <!-- Add the link to the homepage -->
        <img src="./images/logo.png" alt="logo" class="img-fluid" style="max-height: 40px;">
    </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
               
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: Rs.100/-</a>
                        </li>
                    </ul>
                    
                    <!-- Search Form -->
                    <form class="d-flex" action="index.php" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Search products..." name="search_query" aria-label="Search">
                        <button class="btn btn-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>

    <!--second child-->

    <nav class="navbar my-5 navbar-expand-lg" style="background-color: #FFF6E9;" >
      <div class="navbar-nav me-auto">
      <li class="nav-item">
         <a class="nav-link" href="#">Welcome Guest</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="#">Login</a>
      </li>
      </div>
    </nav>
 
    <!--third child-->
    <div class="bg-light">
      <h3 class="text-center">STORE IS OPEN</h3>
    </div>

    <!-- fourth child -->
    <div class="container mt-5" style="margin-bottom: 100px;">
    <div class="row justify-content-center ">
      
     <?php
    // Establish a connection to the database
    $host = 'localhost';
    $user = 'root';
    $password = ''; // Replace with your MySQL root password if necessary
    $dbname = 'olxstore'; // Replace with your actual database name

    $conn = mysqli_connect($host, $user, $password, $dbname);

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the search query is set
    if (isset($_GET['search_query'])) {
        $search_query = $_GET['search_query'];

        // Prevent SQL injection by escaping special characters
        $search_query = mysqli_real_escape_string($conn, $search_query);

        // Define the SQL query to search products by description or title
        $select_query = "SELECT * FROM `producttable` WHERE `description` LIKE '%$search_query%' OR `product_title` LIKE '%$search_query%' ORDER BY `date` DESC";
    } else {
        // Default query to select all products
        $select_query = "SELECT * FROM `producttable` ORDER BY `date` DESC";
    }

    // Execute the query and store the result set
    $result_query = mysqli_query($conn, $select_query);

    // Check if the query was successful
    if ($result_query) {
        // Fetch and display products
        if (mysqli_num_rows($result_query) > 0) {
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $description = $row['description'];
                $photo = $row['photo'];
                $contact_number = $row['contact_number'];
                $price = $row['price'];

                // Display the product details with modal
                echo "
                <div class='col-md-3 mb-4'>
                    <div class='card h-100 shadow-sm border-0' style='overflow: hidden;'>
                        <div class='product-img-container'>
                            <img src='./seller/product_images/$photo' class='card-img-top product-img' alt='$product_title' data-bs-toggle='modal' data-bs-target='#productModal$product_id'>
                        </div>
                        <div class='card-body d-flex flex-column'>
                            <h5 class='card-title text-center'>$product_title</h5>
                            <p class='card-text text-center'>$description</p>
                            <div class='mt-auto d-flex justify-content-between'>
                                <a href='#' class='btn btn-info w-100 me-2' data-bs-toggle='modal' data-bs-target='#productModal$product_id'>Rs. $price</a>
                                <a href='#' class='btn btn-secondary w-100' data-bs-toggle='modal' data-bs-target='#productModal$product_id'>View</a>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Bootstrap Modal -->
                <div class='modal fade' id='productModal$product_id' tabindex='-1' aria-labelledby='productModalLabel$product_id' aria-hidden='true'>
                    <div class='modal-dialog modal-sm'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='productModalLabel$product_id'>$product_title</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <!-- Product Details -->
                                        <h5>Description</h5>
                                        <p>$description</p>
                                        <h6 class='text-muted'>Price: Rs. $price</h6>
                                        <h6 class='text-muted'>Contact: $contact_number</h6>
            
                                        <!-- WhatsApp and Call Buttons -->
                                        <a href='https://wa.me/$contact_number?text=I%20am%20interested%20in%20your%20product%20" . urlencode($product_title) . "' class='btn btn-success mt-3' target='_blank'>
                                            <i class='fab fa-whatsapp'></i> WhatsApp
                                        </a>
                                        <a href='tel:$contact_number' class='btn btn-primary mt-3'>
                                            <i class='fas fa-phone'></i> Call
                                        </a>
                                    </div><br>
                                    <div class='col-md-6 text-center shadow-lg'>
                                        <!-- Product Image -->
                                        <img src='./seller/product_images/$photo' alt='$product_title' class='img-fluid  mb-3'>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            ";
            }
        } else {
            echo "<p class='text-center'>No products found matching your search criteria.</p>";
        }
    } else {
        echo "<script>alert('Error fetching products')</script>";
    }

    // Close the database connection (optional but good practice)
    mysqli_close($conn);
    ?>
    </div>
    </div>

    <footer class="fixed-bottom ">
        <button class="align-item-center p-absolute w-100 p-0" style="transform: translate(-5px, 0px);">
            <a href="./seller/seller.php" class="nav-link text-light bg-primary m-0" style="height: 70px; font-size: xxx-large; font-weight: bold;">Sell Now</a>
        </button>
    </footer>
    
    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
