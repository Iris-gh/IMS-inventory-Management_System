<?php

require_once "../../config/database.php";
require_once '../../config/db.php';
$statement = $pdo->prepare('SELECT * FROM category ORDER BY Date Desc');
$statement->execute();
$categories = $statement->fetchAll(PDO::FETCH_ASSOC);


?>



<?php require_once '../../inc/header.php'; ?>
    <h1>Categories</h1>

    <p>
        <a href="addCAt.php" type="button" class="btn btn-sm btn-success">Add Category</a>
    </p>

    

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">CategoryName</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($categories as $i => $category) { ?>
            <tr>
            <th scope="row"><?php echo $i + 1 ?></th>
            <td><?php echo $category['CategoryName']  ?></td>
            <td><?php echo $category['Date'] ?></td>
            <td>
            <form method="post" action="deleteSale.php" style="display: inline-block">
                        <input  type="hidden" name="id" value="<?php echo $sale['sale_id'] ?>"/>
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
            </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>