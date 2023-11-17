<?php

$pdo = require_once '../../config/database.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: sale.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM sales WHERE sale_id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$sale = $statement->fetch(PDO::FETCH_ASSOC);

 
$itemID = $sale['product_id'];
$discount = $sale['discount'];
$price = $sale['price'];
$quantity = $sale['quantity'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

     
    $itemID = $_POST['itemId'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
        
    if (!$itemID) {
        $errors[] = 'Item id is required';
    }

    if (!$quantity) {
        $errors[] = 'Product price is required';
    }

    if (!$price) {
        $errors[] = 'Product price is required';
    }

    if (empty($errors)) {
        $statement = $pdo->prepare("UPDATE sales SET product_id = :product_id, price = :price, quantity = :quantity, 
            discount = :discount WHERE sale_id = :id");

        $statement->bindValue(':product_id', $itemID);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':quantity', $quantity);
        $statement->bindValue(':discount', $discount);
        $statement->bindValue(':id', $id);
       
        $statement->execute();
        header('Location: sale.php');
    }
}

?>

<?php require_once '../../inc/header.php'; ?>
<p>
    <a href="sale.php" class="btn btn-secondary">Back to products</a>
</p>
<h1>Update Sale: <b><?php //echo $product['title'] ?></b></h1>


<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>ItemID</label><br>
        <input type="number" name="itemId" class="form-control" value="<?php echo $itemID ?>">
    </div>
    <div class="form-group">
        <label>Quantity</label>
        <input type="number" name="quantity" class="form-control" value="<?php echo $quantity ?>">
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="number" step=".01" name="price" class="form-control" value="<?php echo $price ?>">
    </div>
    <div class="form-group">
        <label>Discount</label>
        <input type="number" step=".01" name="discount" class="form-control" value="<?php echo $discount ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>



</section>
</body>
</html>