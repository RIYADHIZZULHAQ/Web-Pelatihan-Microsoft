<?php
include("koneksi.php"); // Menghubungkan ke database

// Mengambil ID dari URL
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// Memastikan bahwa ID tidak kosong
if (!empty($id)) {
    // Query untuk menghapus data berdasarkan ID
    $sql = "DELETE FROM anggota WHERE id = ?";
    $stmt = mysqli_prepare($dbh, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Eksekusi query dan cek apakah berhasil
    if (mysqli_stmt_execute($stmt)) {
        echo "
        <script language='javascript'>
            alert('Data berhasil dihapus!');
            window.location.href='edit_db.php';
        </script>";
    } else {
        echo "
        <script language='javascript'>
            alert('Gagal menghapus data!');
            window.history.back();
        </script>";
    }

    // Menutup statement
    mysqli_stmt_close($stmt);
} else {
    // Jika ID kosong, kembali ke halaman sebelumnya
    echo "
    <script language='javascript'>
        alert('ID tidak ditemukan!');
        window.history.back();
    </script>";
}

// Menutup koneksi database
mysqli_close($dbh);
?>