<?php
require_once"../db/connect.php";

$id = $_POST['id'];
$query = $conn->query("DELETE FROM users WHERE id = '{$id}'");

if($query){
    $result['pesan'] = flashMsg('success', 'Data berhasil dihapus');
}else{
    $result['pesan'] =  flashMsg('danger', 'Data gagal dihapus');
}

echo json_encode($result);