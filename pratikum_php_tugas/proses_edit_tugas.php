<?php
include 'file_koneksi_tugas.php';

// Mengambil data dari form
$id = $_POST['id'];
$nama_produk = $_POST['nama'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

// Query untuk memperbarui data
$sql = "UPDATE produk SET nama_produk='$nama_produk', harga='$harga', stok='$stok' WHERE id_produk=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: index_tugas.php");
    exit();
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close();