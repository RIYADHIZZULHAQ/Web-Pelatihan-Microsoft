<?php
// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "microsoftdb";

$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari tabel pendaftaran
$query = "SELECT * FROM pendaftaran";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftaran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table thead {
            background-color: #343a40;
            color: white;
        }
        .btn-custom {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-3">
            <a href="index.html" class="btn btn-primary btn-sm btn-custom">
                <i class="fas fa-arrow-left"></i> Kembali ke Halaman Utama
            </a>
            <h4>Daftar Pendaftaran</h4>
            <a href="add_data.php" class="btn btn-success btn-sm btn-custom">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kelas</th>
                    <th>Pesan</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td class="text-center"><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['class']; ?></td>
                            <td><?php echo $row['message']; ?></td>
                            <td class="text-center">
                                <a href="edit_data.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm btn-custom">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="delete_data.php?id=<?php echo $row['id']; ?>" 
                                    class="btn btn-danger btn-sm btn-custom"
                                    onclick="return confirm('Yakin ingin menghapus data ini?');">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data pendaftaran.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Tutup koneksi
$conn->close();
?>
