<?php
    require_once "config.php";
    session_start();
    if (isset($_SESSION['username'])) {
        $login = 1;
        $userID = $_SESSION['user_id'];
    }
    if(isset($_GET['id'])){
      $productId = $_GET['id'];
    $sql = "SELECT * FROM product as p
            INNER JOIN product_detail as pd ON pd.id_product = p.id_product
            INNER JOIN customer
	        WHERE p.id_product =".$productId;
    $result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        $insertQuery = "INSERT INTO cart (id_productDT, id_customer) VALUES ($productId, $userID)";
        mysqli_query($conn, $insertQuery);
        echo "Add Product Successfully";
    
    } else {
        echo "Not Found Product";
    }
    
   }
?>
