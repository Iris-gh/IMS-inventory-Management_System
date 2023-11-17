<?php
require_once '../../config/database.php';
require_once '../../config/db.php';

$errors = [];

$vendName = '';
$address = '';
$phone = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    
    $vendName = $_POST['vendName'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
   
   

    if (!$phone) {
        $errors[] = 'Vendor number  is required';
    }


    if (empty($errors)) {
        $statement = $pdo->prepare("INSERT INTO vendor (name, address, mobile)
                VALUES (:vendName, :address, :mobile)");
        $statement->bindValue(':vendName', $vendName);
        $statement->bindValue(':address', $address);
        $statement->bindValue(':mobile', $phone);
        $statement->execute();
        header('Location: vendor.php');
    }

}

?>


<?php require_once '../../inc/header.php'; ?>
<a href="vendor.php" class="btn btn-secondary">Back to vendor</a><br><br>
<h1>Add new Vendor</h1>
<br>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Vendor_Name</label><br>
        <input type="text" name="vendName" class="form-control" value="<?php echo $vendName ?>">
    </div>
    <div class="form-group">
        <label>Address</label><br>
        <textarea name="address" class="form-group"  value="<?php echo $address ?> "></textarea>
    </div>
    <div class="form-group">
        <label>Mobile</label>
        <input type="number" name="phone" class="form-control" value="<?php echo $phone?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</section>
</body>
</html>