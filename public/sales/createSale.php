<?php
$pdo = require_once '../../config/database.php';
require_once '../../config/db.php';

$errors = [];

$itemID = '';
$discount = '';
$price = '';
$quantity = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    
    $itemID = $_POST['itemId'];
    $discount = $_POST['discount'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

        
    if (!$itemID) {
        $errors[] = 'Product title is required';
    }

    if (!$quantity) {
        $errors[] = 'Product price is required';
    }

    if (!$price) {
        $errors[] = 'Product price is required';
    }


    if (empty($errors)) {
        $statement = $pdo->prepare("INSERT INTO sales (product_id, quantity, price, discount, sale_date)
                VALUES (:product_id, :quantity, :price, :discount, :sale_date)");
        $statement->bindValue(':product_id', $itemID);
        $statement->bindValue(':quantity', $quantity);
        $statement->bindValue(':discount', $discount);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':sale_date', date('Y-m-d H:i:s'));

        $statement->execute();
        header('Location: sale.php');
    }

}

?>


<?php require_once '../../inc/header.php'; ?>
<h1>Create new Sale</h1>

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
        <label>Discount</label>
        <input type="number" step=".01" name="discount" class="form-control" value="<?php echo $discount ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</section>
</body>
</html>