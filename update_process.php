<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'microsoftdb');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan data dari form
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$class = $_POST['class'];
$training = $_POST['training'];

// Query update data
$query = "UPDATE data_table SET name = '$name', email = '$email', class = '$class', training = '$training' WHERE id = $id";

if ($conn->query($query) === TRUE) {
    echo "<script>
            alert('Data berhasil diupdate!');
            window.location.href = 'index.html';
          </script>";
} else {
    echo "Error: " . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
