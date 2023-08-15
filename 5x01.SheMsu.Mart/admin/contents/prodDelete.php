<?php 
// initialize variables
$prodID = isset($_GET['ref']) ? $_GET['ref'] : null;

// Select the product for it's name and initialize name
$sql = "SELECT * FROM product WHERE prodID = ".$prodID." ";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();
$productName = $rows['prodTitle'];

// check if the product existed or not
if($result->num_rows >0) {

    // Delete Product
    $deleteSql = "DELETE FROM product WHERE prodID = ".$prodID."";
    $deleteQuery = $conn->query($deleteSql);

    echo "<div class='container text-center'>
            <div class='row justify-content-md-center'>
            <div class='col-md-8'>
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Deleting ".$productName." Product</strong>
                    <br><hr>
                    ".$productName."  has been deleted successfully. Back to <a href='index.php?page=prodList'>Products List</a>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            </div>
            </div>
        </div>";
} else {
    echo "<div class='alert alert-success' role='alert'>
                Product is not found <a href='index.php?page=prodList'>Back</a> to Products List
            </div>";
}
?>
