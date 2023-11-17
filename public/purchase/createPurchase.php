<?php
$pdo = require_once '../../config/database.php';

$errors = [];

$itemID = '';
$quantity = '';
$price = '';
$vendor = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    
    $itemID = $_POST['itemId'];
    $vendor = $_POST['vendor'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

        
    if (!$itemID) {
        $errors[] = 'Product Id is required';
    }

    if (!$quantity) {
        $errors[] = 'Product quantity is required';
    }

    if (!$price) {
        $errors[] = 'Product price is required';
    }
    if (!$vendor) {
        $errors[] = 'Vendor Id  is required';
    }


    if (empty($errors)) {
        $statement = $pdo->prepare("INSERT INTO purchase (product_id, quantity, unit_price, vendor, purchase_date)
                VALUES (:product_id, :quantity, :price, :vendor, :purchase_date)");
        $statement->bindValue(':product_id', $itemID);
        $statement->bindValue(':quantity', $quantity);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':vendor', $vendor);
        $statement->bindValue(':purchase_date', date('Y-m-d H:i:s'));
        $statement->execute();
        header('Location: purchase.php');
    }

}

?>


<?php require_once '../../inc/header.php'; ?>
<h1>Create new Purchase</h1>

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
        <input type="number" name="itemId" class="form-control" value="<?php echo $quantity ?>">
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
        <input type="number"  name="vendor" class="form-control" value="<?php echo $vendor ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</section>
</body>
</html>