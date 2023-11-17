<?php require_once '../../inc/header.php'; ?>
<!-- <section class="main-body"> -->

<h1>Analysis</h1>
<div class="analysis-con">
    <div class="block">
        <ul>
            <li>Products</li>
            <li>Sales</li>
            <li>Purchase</li>
            <li>vendor</li>
            <li>Categories</li>
        </ul>
    </div>
</div>

<?php 
$action = '';
if(isset($_GET['action'])){
    $action = $_GET['action'];
    if($action == 'register'){
?>

    <div class="overview">

        <div>Products</div>
            <?php require_once "../products/index.php" ?>
        <?php echo '</body></html>';
			exit();
		} elseif($action == 'resetPassword'){ ?>

    
        <div class="sale-block">
            <?php require_once "../sales/sale.php" ?>
        </div>
        <?php echo '</body></html>';
			exit();
		} elseif($action == 'resetPassword'){ ?>

        <div class="purchase-block">
            <?php require_once "../purchase/purchase.php" ?>
        </div>
        <?php echo '</body></html>';
			exit();
		} elseif($action == 'resetPassword'){ ?>


        <div class="vendor-block">
            <?php require_once "../vendor/vendor.php" ?>
        </div>
        <?php echo '</body></html>';
			exit();
		} elseif($action == 'resetPassword'){ ?>


        <div class="category-block">
            <?php require_once "../categories/category.php" ?>
        </div>
        <?php echo '</body></html>';
			exit(); }
        }
	 ?>


    </div>
