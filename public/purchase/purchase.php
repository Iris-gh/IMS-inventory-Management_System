<?php
require_once '../../config/database.php';
require_once '../../config/db.php';
$statement = $pdo->prepare('SELECT * FROM purchase ORDER BY purchase_date DESC');
$statement->execute();
$purchases = $statement->fetchAll(PDO::FETCH_ASSOC);


?>

<?php require_once '../../inc/header.php'; ?>
<!-- <section class="main-body"> -->

    <h1>Purchase</h1>

    <p>
        <a href="createPurchase.php" type="button" class="btn btn-sm btn-success">Add Purchase</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ItemID</th>
            <th scope="col">ItemName</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Vendor</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($purchases as $i => $purchase) { ?>
            
            <tr>
                <th scope="row"><?php echo $i + 1 ?></th>
                <td><?php echo $purchase['product_id']; ?></td>
                <td><?php 
                    $itemId = $purchase['product_id'];

                    $stmt = $pdo->prepare('SELECT title FROM products  WHERE id = :itemId');
                    $stmt->bindValue(':itemId', $itemId);
                    $stmt->execute();
                    $product = $stmt->fetch(PDO::FETCH_COLUMN);
                    echo $product ?></td>
                <td><?php echo $purchase['quantity'] ?></td>
                <td><?php echo $purchase['unit_price'] ?></td>
                <td><?php echo $purchase['vendor'] ?></td>
             
                <td>
                    <a href="updatePurchase.php?id=<?php echo $purchase['purchase_id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                    <form method="post" action="deletePurchase.php" style="display: inline-block">
                        <input  type="hidden" name="id" value="<?php echo $purchase['purchase_id'] ?>"/>
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    
</section>
</body>
</html>