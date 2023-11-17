<?php
require_once "../../config/database.php";
require_once "../../config/db.php";

// error checking
$errors = [];

$itemID = '';
$catName = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    
    $catName = $_POST['catName'];

    if (!$catName) {
        $errors[] = 'Category name is required';
    }


    if (empty($errors)) {
        $statement = $pdo->prepare("INSERT INTO category (CategoryName, Date)
                VALUES (:CategoryName, :Date)");
        $statement->bindValue(':CategoryName', $catName);
        $statement->bindValue(':Date', date('Y-m-d H:i:s'));

        $statement->execute();
        header('Location: category.php');
    }

}


?>



<?php require_once '../../inc/header.php'; ?>
    <h1>Categories</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <div><?php echo $error ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
<div class="category">
    <form class="cat-form" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>CategoryName</label>
            <input type="text" name="catName" class="form-control" value="<?php echo $catName ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>