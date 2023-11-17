<?php
require_once '../../config/database.php';
require_once '../../config/db.php';
$statement = $pdo->prepare('SELECT * FROM sales ORDER BY sale_date DESC');
$statement->execute();
$sales = $statement->fetchAll(PDO::FETCH_ASSOC);


?>

<?php require_once '../../inc/header.php'; ?>
<!-- <section class="main-body"> -->

    <h1>Sales</h1>

    <p>
        <a href="createSale.php" type="button" class="btn btn-sm btn-success">Add Sale</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ItemName</th>
            <th scope="col">QUantity</th>
            <th scope="col">Price</th>
            <th scope="col">Discount</th>
            <th scope="col">Total</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($sales as $i => $sale) { ?>
            
            <tr>
                <th scope="row"><?php echo $i + 1 ?></th>
                <td><?php 
                    $itemId = $sale['product_id'];

                    $stmt = $pdo->prepare('SELECT title FROM products  WHERE id = :itemId');
                    $stmt->bindValue(':itemId', $itemId);
                    $stmt->execute();
                    $product = $stmt->fetch(PDO::FETCH_COLUMN);
                    echo $product ?></td>
                <td><?php echo $sale['quantity'] ?></td>
                <td><?php echo $sale['price'] ?></td>
                <td><?php echo $sale['discount'] ?></td>
                <td><?php 
                    $total = $sale['quantity'] * $sale['price'];
                    echo $total ?>
                </td>
                <td>
                    <a href="updateSale.php?id=<?php echo $sale['sale_id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                    <form method="post" action="deleteSale.php" style="display: inline-block">
                        <input  type="hidden" name="id" value="<?php echo $sale['sale_id'] ?>"/>
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