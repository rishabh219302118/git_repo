<?php
// Include your database connection file
include('includes/connect.php');

// Check if the search query is set
if (isset($_GET['search_query'])) {
    $search_query = $_GET['search_query'];

    // Prevent SQL injection by using prepared statements
    $stmt = $con->prepare("SELECT * FROM producttable WHERE description LIKE ?");
    $search_query = "%" . $search_query . "%";
    $stmt->bind_param("s", $search_query);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<div class='row'>";
        while ($row = $result->fetch_assoc()) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $description = $row['description'];
            $price = $row['price'];
            $photo = $row['photo'];
            $contact_number = $row['contact_number'];

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
                <div class='modal-dialog'>
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
                                </div>
                                <div class='col-md-6 text-center'>
                                    <!-- Product Image -->
                                    <img src='./seller/product_images/$photo' alt='$product_title' class='img-fluid mb-3'>
                                </div>
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                        </div>
                    </div>
                </div>
            </div>";
        }
        echo "</div>";
    } else {
        echo "<p>No products found matching your search criteria.</p>";
    }
}
?>

<form action="search.php" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search products..." name="search_query">
        <button class="btn btn-primary" type="submit">Search</button>
    </div>
</form>

