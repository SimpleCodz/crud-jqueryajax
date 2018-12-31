<?php
require_once"../db/connect.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$edit = $conn->query("UPDATE users SET nama = '{$nama}', email = '{$email}', alamat = '{$alamat}' WHERE id = '{$id}'");

if($edit){
    $result['pesan'] = flashMsg('success', 'Data berhasil diedit');
}else{
    $result['pesan'] =  flashMsg('danger', 'Data gagal diedit');
}

echo json_encode($result);