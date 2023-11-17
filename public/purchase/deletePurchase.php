<?php

$pdo = require_once '../../config/database.php';

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: purchase.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM purchase WHERE purchase_id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: purchase.php');