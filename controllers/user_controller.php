<?php
require_once("../koneksi.php");
session_start();

$method = $_GET['method']; // isiannya = create, update, delete,
$email = $_POST['abcdef'];
$password = $_POST['password'];
$name = $_POST['name'];

$data = [
    'email' => $email,
    'password' => $password,
    'name' => $name,
];

if ($method == "create") {
    storeData($data, $db);
}

function storeData($data, $db)
{
    $count = $db->prepare("INSERT INTO users (email, password, name) VALUES (?, ?, ?)");
    $count->execute([$data['email'], $data['password'], $data['name']]);
    header("location:../index.php");
}
?>