<?php
require_once"../db/connect.php";

$id = $_POST['id'];
$select = $conn->query("SELECT * FROM users WHERE id = '{$id}'");
$result = array();
$fetchData = $select->fetch_assoc();
$result[] = $fetchData;

echo json_encode($result);