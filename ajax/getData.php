<?php
require_once"../db/connect.php";

if(isset($_GET['q'])){
    $q = $_GET['q'];
    $select = $conn->query("SELECT * FROM users WHERE nama LIKE '%{$q}%' OR email LIKE '%{$q}%' OR alamat LIKE '%{$q}%'");
}else{
    $select = $conn->query("SELECT * FROM users");
}

$result = array();
while($fetchData = $select->fetch_assoc()){
    $result[] = $fetchData;
}

echo json_encode($result);