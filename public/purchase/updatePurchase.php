<?php

$pdo = require_once '../../config/database.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: purchase.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM purchase WHERE purchase_id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$purchase = $statement->fetch(PDO::FETCH_ASSOC);

 
$itemID = $purchase['product_id'];
$vendor = $purchase['vendor'];
$price = $purchase['unit_price'];
$quantity = $purchase['quantity'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

     
    $itemID = $_POST['itemId'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $vendor = $_POST['vendor'];
        
    if (!$itemID) {
        $errors[] = 'Item id is required';
    }

    if (!$quantity) {
        $errors[] = 'Product quantity is required';
    }

    if (!$price) {
        $errors[] = 'Product price is required';
    }
    if (!$vendor) {
        $errors[] = 'Vendor Id is required';
    }


    if (empty($errors)) {
        $statement = $pdo->prepare("UPDATE purchase SET product_id = :product_id, unit_price = :price, quantity = :quantity, 
            vendor = :vendor WHERE purchase_id = :id");

        $statement->bindValue(':product_id', $itemID);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':quantity', $quantity);
        $statement->bindValue(':vendor', $vendor);
        $statement->bindValue(':id', $id);
       
        $statement->execute();
        header('Location: purchase.php');
    }
}

?>

<?php require_once '../../inc/header.php'; ?>
<p>
    <a href="purchase.php" class="btn btn-secondary">Back to purchase</a>
</p>
<h1>Update purchase:</h1>


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
        <label>Vendor</label>
        <input type="number" name="vendor" class="form-control" value="<?php echo $vendor ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>



</section>
</body>
</html>