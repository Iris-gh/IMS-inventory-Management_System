<?php

$pdo = require_once '../../config/database.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: vendor.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM vendor WHERE vendor_id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$vendor = $statement->fetch(PDO::FETCH_ASSOC);

 
$vendName = $vendor['name'];
$addres = $vendor['address'];
$phone = $vendor['mobile'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

     
    $vendName = $_POST['vendName'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
        
   
    if (!$phone) {
        $errors[] = 'Vendor number is required';
    }


    if (empty($errors)) {
        $statement = $pdo->prepare("UPDATE vendor SET name = :vendName, address = :addres, 
            mobile = :phone WHERE vendor_id = :id");

        $statement->bindValue(':vendName', $vendName);
        $statement->bindValue(':addres', $address);
        $statement->bindValue(':phone', $phone); 
        $statement->bindValue(':id', $id); 
        $statement->execute();
        header('Location: vendor.php');
    }
}

?>

<?php require_once '../../inc/header.php'; ?>
<p>
    <a href="vendor.php" class="btn btn-secondary">Back to vendor</a>
</p>
<h1>Update vendor:</h1>


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
        <textarea name="address" class="form-group"  style="width:100%;"><?php echo $addres?></textarea>
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