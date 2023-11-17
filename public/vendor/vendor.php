<?php
require_once '../../config/database.php';
require_once '../../config/db.php';
$statement = $pdo->prepare('SELECT * FROM vendor ORDER BY vendor_id DESC');
$statement->execute();
$vendors = $statement->fetchAll(PDO::FETCH_ASSOC);


?>

<?php require_once '../../inc/header.php'; ?>
<!-- <section class="main-body"> -->

    <h1>Vendors</h1>

    <p>
        <a href="createVendor.php" type="button" class="btn btn-sm btn-success">Add Vendor</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">vendor_Id</th>
            <th scope="col">VendorName</th>
            <th scope="col">Address</th>
            <th scope="col">PhoneNum</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($vendors as $i => $vendor) { ?>
            
            <tr>
                <th scope="row"><?php echo $i + 1 ?></th>
                <td><?php echo $vendor['vendor_id'] ?></td>
                <td><?php echo $vendor['name'] ?></td>
                <td><?php echo $vendor['address'] ?></td>
                <td><?php echo $vendor['mobile'] ?></td>
                <td>
                    <a href="updateVendor.php?id=<?php echo $vendor['vendor_id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                    <form method="post" action="deleteVendor.php" style="display: inline-block">
                        <input  type="hidden" name="id" value="<?php echo $vendor['vendor_id'] ?>"/>
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