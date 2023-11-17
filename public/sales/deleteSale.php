<?php

$pdo = require_once '../../config/database.php';

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: sale.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM sales WHERE sale_id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: sale.php');