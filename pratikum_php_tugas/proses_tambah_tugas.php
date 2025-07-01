<?php
include 'file_koneksi_tugas.php';

// Pastikan form dikirim via POST dan semua field ada
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nama_produk'], $_POST['harga'], $_POST['stok'])) {
    
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Gunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("INSERT INTO produk (nama_produk, harga, stok) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $nama_produk, $harga, $stok);

    if ($stmt->execute()) {
        header("Location: index_tugas.php"); // Kembali ke halaman utama setelah sukses
        exit();
    } else {
        echo "Gagal menyimpan data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Data tidak lengkap atau form tidak dikirim.";
}

$conn->close();
?>
