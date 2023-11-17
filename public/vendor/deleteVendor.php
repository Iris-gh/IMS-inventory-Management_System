<?php

$pdo = require_once '../../config/database.php';

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: vendor.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM vendor WHERE vendor_id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: vendor.php');