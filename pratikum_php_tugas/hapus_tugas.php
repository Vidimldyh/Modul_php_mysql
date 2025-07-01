<?php 
include 'file_koneksi_tugas.php';

// Validasi input ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID tidak valid.");
}
$id = intval($_GET['id']);

// Gunakan prepared statement untuk keamanan
$stmt = $conn->prepare("DELETE FROM produk WHERE id_produk = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: index_tugas.php");
    exit();
} else {
    echo "Gagal menghapus data: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
