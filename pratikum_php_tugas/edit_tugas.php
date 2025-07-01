<?php
include 'file_koneksi_tugas.php';
$id = $_GET['id'];
$sql = "SELECT * FROM produk WHERE id_produk=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit </title>
</head>

<body>             
    <h2>Form Edit Data Karyawan</h2>
    <form action="proses_edit_tugas.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id_produk']; ?>">
        Nama: <input type="text" name="nama" value="<?php echo $row['nama_produk']; ?>" required><br><br>
        Harga: <input type="text" name="harga" value="<?php echo $row['harga']; ?>" required><br><br>
        Stok: <input type="text" name="stok" value="<?php echo $row['stok']; ?>" required><br><br>
        <input type="submit" value="Update">
    </form>
</body>

</html>