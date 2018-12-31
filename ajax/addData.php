<?php
require_once"../db/connect.php";

$nama = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$insert = $conn->query("INSERT INTO users(nama, email, alamat) VALUES('{$nama}', '{$email}', '{$alamat}')");

if($insert){
    $result['pesan'] = flashMsg('success', 'Data berhasil disimpan');
}else{
    $result['pesan'] =  flashMsg('danger', 'Data gagal disimpan');
}

echo json_encode($result);