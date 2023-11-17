<?php

$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];

$image = $_FILES['image'] ?? null;
$imagePath = '';

if (!is_dir('../../public/images')) {
    mkdir('../../public/images');
}
echo '<pre>';
var_dump($image);
echo '</pre>';



if ($image && $image['tmp_name']) {
    if ($product['image']) {
        unlink('../../public/'.$product['image']);
    }
    $imagePath = 'images/' . randomString(8) . '/' . $image['name'];
    mkdir(dirname('../../public/'.$imagePath));
    move_uploaded_file($image['tmp_name'], '../../public/'.$imagePath);
}


if (!$title) {
    $errors[] = 'Product title is required';
}

if (!$price) {
    $errors[] = 'Product price is required';
}
