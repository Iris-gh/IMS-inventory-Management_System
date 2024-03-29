<?php

require_once "../../config/functions.php";
require_once '../../config/database.php';
require_once '../../config/db.php';

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: index.php');