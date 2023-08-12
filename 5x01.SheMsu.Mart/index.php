<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'config/config.php'; ?>
</head>

<body>
    <?php
    $sql = "SELECT * FROM product";
    $result = $conn->query($sql);
    if($result->num_rows > 0)
        while($rows = $result->fetch_assoc()){
            echo "<P>".$rows['prodTitle']."</P>";
        }
    
?>

    <?php 
    for($i =0; $i<5; $i++){
        echo "<p>Counter : ".$i."</p>";
    }
    $flag = false;
    ?>
    <h3>Connection</h3>
    <input type="text" name="username" id="username" value="<?php echo $i; ?>
    ">
    ?>
</body>

</html>