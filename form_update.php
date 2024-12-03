<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Data</title>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f8f9fa;
      color: #333;
    }
    h1 {
      text-align: center;
      margin-top: 20px;
      color: #007bff;
    }
    .container {
      max-width: 600px;
      margin: 30px auto;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 20px 30px;
    }
    .form-control {
      border-radius: 5px;
      border: 1px solid #ddd;
    }
    button {
      background-color: #28a745;
      border: none;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    button:hover {
      background-color: #218838;
    }
    .back-to-home {
      display: block;
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
      color: #007bff;
      text-decoration: none;
    }
    .back-to-home:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <h1>Update Data</h1>
  <div class="container">
    <?php

    $id = $_GET['id']; // Mendapatkan ID dari URL
    // Koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'microsoftdb');
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    $query = "SELECT * FROM data_table WHERE id = $id";
    $result = $conn->query($query);
    $data = $result->fetc_assoc();
    ?>
    <form action="update_process.php" method="post">
      <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
      <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $data['name']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="class" class="form-label">Kelas yang Dipilih</label>
        <input type="text" class="form-control" id="class" name="class" value="<?php echo $data['class']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="training" class="form-label">Jenis Pelatihan</label>
        <textarea class="form-control" id="training" name="training" rows="4" required><?php echo $data['training']; ?></textarea>
      </div>
      <div class="text-center">
        <button type="submit">Update Data</button>
      </div>
    </form>
    <a href="index.html" class="back-to-home">Back to Home</a>  
  </div>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
