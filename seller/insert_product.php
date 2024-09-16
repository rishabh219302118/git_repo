<?php

$conn=mysqli_connect('localhost','root','','olxstore');


// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Continue with the product insertion logic
if (isset($_POST['insert_product'])) {
    // Fetching form data
    $productTitle = $_POST['product_title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $contact_number = $_POST['contact_number'];
    $price = $_POST['price'];
    $product_status = 'true';

    // File upload variables
    $fileName = $_FILES["photo"]["name"];
    $fileSize = $_FILES["photo"]["size"];
    $tmpName = $_FILES["photo"]["tmp_name"];

    // Extract file extension
    $imageExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $newFileName = uniqid() . '.' . $imageExtension;

    // Move uploaded file to target directory
    if (move_uploaded_file($tmpName, "./product_images/$newFileName")) {
        // SQL query to insert product
        $query = "INSERT INTO producttable ( product_title,  description, category, contact_number, price, photo, date, status) 
                  VALUES ('$productTitle', '$description', '$category', '$contact_number', '$price', '$newFileName', NOW(), '$product_status')";

        $result_query = mysqli_query($conn, $query);
        
        // Check if query was successful
        if ($result_query) {
            echo "<script>
                    alert('Hogya add ab wait kro !!');
                    window.location.href = '../index.php'; // Redirect to the home page
                  </script>";
            exit();

        } else {
            echo "<script>alert('Error inserting product')</script>";
           
        }
    } else {
        echo "<script>alert('File upload failed')</script>";
    }
}



// Close the database connection (optional but good practice)
mysqli_close($conn);




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
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
    <a href="../index.php"> <!-- Add the link to the homepage -->
        <img src="../images/logo.png" alt="logo" class="img-fluid" style="max-height: 40px;">
    </a>
</div>

    </nav>


    <div class="container mt-3">
        <h1 class="text-center">Insert Product</h1>
        <!-- form -->
         <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
            <!-- product_title     -->
            <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control " placeholder="Enter your product" autocomplete="off" required></div>
            <!-- description     -->
            <div class="form-outline mb-4 w-50 m-auto">
            <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" class="form-control mb-4" placeholder="Describe your product" autocomplete="off" required></div>
            <!-- Category     -->
            <div class="form-outline mb-4 w-50 m-auto">
            <label for="category" class="form-label">Select Category</label>    
            <select name="category" id="category" class="form-select">
            <option value="">Category</option>
                <option value="Electronics" >Electronics</option>
                <option value="Food Item">Food Item</option>
                <option value="Stationery">Stationery</option>
                <option value="Clothing">Clothing</option>
                <option value="Utensils">Utensils</option>
                <option value="Extras">Extras</option>
            </select>
        </div>
       
        <!-- Photo -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="photo" class="form-label">Photo</label>    
            <input type="file" name="photo" id="photo" class="form-control mb-4" required accept=".jpg, .jpeg, .png" value="">
        </div>
       
        <!-- Number     -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="number" class="form-label">Contact Number</label>
                <input type="text" name="contact_number" id="contact_number" class="form-control mb-4" placeholder="Enter your phone number" autocomplete="off" required></div>
        <!-- Enter Price     -->
        <div class="form-outline mb-4 w-50 m-auto">
        <label for="price" class="form-label">Enter Price (INR)</label>
                <input type="number" name="price" id="price" class="form-control mb-4" placeholder="Enter your product price" autocomplete="off" required>
            <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product">
            </div>
        </div>
    </form>
</div>
    
</body>
</html>