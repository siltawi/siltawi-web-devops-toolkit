<?php 
   $editFormAction = $_SERVER['PHP_SELF'];
   if (isset($_SERVER['QUERY_STRING'])) {
     $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
   }
    // check product
    $prodID = isset($_GET['id']) ? $_GET['id'] : null;

    //Fetch Specific Product
    $sql = "SELECT * FROM product WHERE prodID = ".$prodID."";
    $result = $conn->query($sql);
    $rows = $result->fetch_assoc();

    // Declare & Initialize Variables
    $filePath = "../assets/img/products/";
    $newProdImg = null;

    // Update Product
    if(isset($_POST['updateProd'])) {        
        // Initialize variables
        $productID = $prodID;
        $productTitle = $_POST['prodTitle'];
        $productPrice = $_POST['prodPrice'];
        $productQty = $_POST['prodQty'];
        $productDesc = $_POST['prodDesc'];
        $oldProductImg = $_POST['oldProdImg'];
  
        // Upload Image
        if($_FILES['prodImage']['name'] != ""){
            if($_FILES['prodImage']['size'] < 3500000){
                 //generate new file name
                 $file1 = rand(1000,100000).$_FILES['prodImage']['name'];

                 //declare file location
                 $file_loc1 = $_FILES['prodImage']['tmp_name'];
        
                 //upload image
                 if(move_uploaded_file($file_loc1, $filePath.$file1)) {
                     $newProdImg = $file1;
                     }
            }
        } else {
            $newProdImg = $oldProductImg;
        }

        // Updating
        $sqlUpdate = "UPDATE product SET prodTitle='".$productTitle."', prodPrice='".$productPrice."', prodQty='".$productQty."', prodDesc='".$productDesc."', prodImg='".$newProdImg."'  WHERE prodID = ".$prodID.";";
        $updateQuery = $conn->query($sqlUpdate);

        // Redirecting
        echo '<META HTTP-EQUIV=REFRESH CONTENT="0; index.php?page=prodEdit&id='.$prodID.'">';
      }?>

<div class="card">
    <h5 class="card-header">Edit Product</h5>
    <div class="card-body">
        <form name="editForm" method="post" enctype="multipart/form-data" action="<?php echo $editFormAction; ?>">

        <?php   //Display Content
                if($result->num_rows > 0){ ?>
                   
                    <div class="content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Product Title</span>
                                            <input type="text" name="prodTitle" value="<?php echo $rows['prodTitle']; ?>" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Price (ETB)</span>
                                            <input type="number" name="prodPrice" value="<?php echo $rows['prodPrice']; ?>" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Stoke</span>
                                            <input type="number" name="prodQty" value="<?php echo $rows['prodQty']; ?>" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                            <textarea class="form-control" name="prodDesc" id="exampleFormControlTextarea1" rows="3"><?php echo $rows['prodDesc']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input value="Update" type="submit" name="updateProd" class="btn btn-warning">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-1">
                                    <img id="preview" src="../assets/img/products/<?php echo $rows['prodImg'];  ?>" width="200px">
                                    <input name="oldProdImg" value="<?php echo $rows['prodImg'];  ?>" type="hidden">
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Select Image</label>
                                    <input class="form-control" type="file" name="prodImage" id="formFile" accept=".jpg, .jpeg, .png, .gif" onchange="previewImage(event)">
                                </div>
                            </div>
                        </div>
                    </div>

        <?php   } else {
                    echo "No product found!";
                }
        ?>

        </form>
    </div>
</div>

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
