<?php
// Sertakan file koneksi database
include 'koneksi.php';

// Periksa apakah form telah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $class = $_POST['class']; // Sesuaikan dengan perubahan nama input
    $message = $_POST['message'];

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO pendaftaran (name, email, class, message) VALUES (?, ?, ?, ?)";

    // Gunakan prepared statements untuk keamanan
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $class, $message);

    if ($stmt->execute()) {
        echo "Data berhasil disimpan!";
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
} else {
    echo "Form tidak dikirim dengan benar.";
}
?>
