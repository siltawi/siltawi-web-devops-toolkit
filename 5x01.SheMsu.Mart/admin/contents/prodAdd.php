<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

// initialize variables
$filePath = "../assets/img/products/";
$newProdImg = null;

// Update product
if(isset($_POST['addProd'])){
    $prodTitle = $_POST['prodTitle'];
    $prodPrice = $_POST['prodPrice'];
    $prodQty = $_POST['prodQty'];
    $prodDesc = $_POST['prodDesc'];

    // Upload Image
    if($_FILES['prodImage']['name'] != ""){
        if($_FILES['prodImage']['size'] < 5000000){
             //generate new file name
             $file1 = rand(1000,100000).$_FILES['prodImage']['name'];

             //declare file location
             $file_loc1 = $_FILES['prodImage']['tmp_name'];
    
             //upload image
             if(move_uploaded_file($file_loc1, $filePath.$file1)) {
                 $newProdImg = $file1;
                 }
        }
        else {
            echo "File size allowed only below 5mb";
        }
    } else {
        echo "Please upload product image";
    }

    // updating
    $sqlAdd = "INSERT INTO product (prodTitle, prodImg, prodPrice, prodQty, prodDesc) VALUES('".$prodTitle."', '".$newProdImg."', '".$prodPrice."', ".$prodQty.", '".$prodDesc."');";
    $addQuery = $conn->query($sqlAdd);

    // redirecting
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; index.php?page=prodList">';
}

?>
<form name="editFrom" method="POST" enctype="multipart/form-data" action="<?php echo $editFormAction; ?>">
    <div class="card">
        <h5 class="card-header">New Product</h5>
        <div class="card-body">
            <div class="content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text">Product Title</span>
                                    <input name="prodTitle" type="text" value="" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text">Price</span>
                                    <input name="prodPrice" type="text" value="" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text">Store Qty</span>
                                    <input name="prodQty" type="number" value="" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label class="form-label">Description</label>
                                <textarea name="prodDesc" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <input value="Add Product" name="addProd" type="submit" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img id="preview" src="../assets/img/products/" width="200px" alt="Product Image">
                        <div class="mb-3">
                        <label for="formFile" class="form-label">Select Product Image</label>
                        <input class="form-control" type="file" name="prodImage" id="formFile" accept=".jpg, .jpeg, .png, .gif" onchange="previewImage(event)">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    function previewImage(event) {
         var input = event.target;
         var image = document.getElementById('preview');
         if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
               image.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
         }
      }
</script>