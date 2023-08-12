<div class="card">
    <h5 class="card-header">Product List</h5>
    <div class="card-body">

        <!-- Fetch Products -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Product Title</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php   //Fetch Products
                        $sql = "SELECT * FROM product";
                        $result = $conn->query($sql);
                        $rows = $result->fetch_assoc();

                        if($result->num_rows > 0){
                            do {
                                echo "<tr>
                                            <td>".$rows['prodID']."</td>
                                            <td>".$rows['prodTitle']."</td>
                                            <td><img src='../assets/img/products/".$rows['prodImg']."' alt='Product' width='30px'></td>
                                            <td>".$rows['prodPrice']."</td>
                                            <td>
                                                <a href='index.php?page=prodEdit&id=".$rows['prodID']."' class='btn btn-primary'>Edit</a>
                                                <a href='index.php?page=prodDelete&id=".$rows['prodID']."' class='btn btn-danger'>Delete</a>
                                                </td>
                                        </tr>";
                            } while($rows = $result->fetch_assoc());
                        } else {
                            echo "<tr>No Records Found!</tr>";
                        } ?>

            </tbody>
        </table>

    </div>
</div>