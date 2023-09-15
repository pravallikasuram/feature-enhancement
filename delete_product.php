<?php
session_start();
include('db.php');


$connection = mysqli_connect('localhost','root','','task3');

$product_id = $_GET['id'];

// Fetching product details
$productQuery = "SELECT * FROM products WHERE product_id = $product_id";
$productResult = mysqli_query($connection, $productQuery);
$productData = mysqli_fetch_assoc($productResult);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Delete product from the database
    $deleteQuery = "DELETE FROM products WHERE product_id = $product_id";
    $deleteResult = mysqli_query($connection, $deleteQuery);

    if ($deleteResult) {
        header("Location: admin.php");
    } else {
        // Handling  error
        echo "Error: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Product</title>
    
</script>
    
</head>
<body>
    <div class="container">
        <h2>Delete Product</h2>
        <p>Are you sure you want to delete the product "<?php echo $productData['product_name']; ?>"?</p>
        <form action="" method="post">
            <button type="submit">Delete</button>
            <a href="admin.php">Cancel</a>
        </form>
    </div>
</body>
</html>
