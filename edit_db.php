<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Database</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }
    .container {
      margin-top: 30px;
    }
    h3 {
      text-align: center;
      margin-bottom: 20px;
      color: #007bff;
    }
    table {
      background: #ffffff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    th {
      background-color: #007bff;
      color: white;
    }
    .table-actions a {
      margin-right: 10px;
    }
    .nav-link {
      color: #007bff;
    }
    .nav-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h3>Edit or Delete Member Data</h3>
    <div class="row">
      <!-- Sidebar Navigation -->
      <div class="col-md-3 mb-3">
        <div class="list-group">
          <a href="inputanggota.php" class="list-group-item list-group-item-action">Input Member</a>
          <a href="lihatanggota.php" class="list-group-item list-group-item-action">View Members</a>
        </div>
      </div>
      <!-- Main Content -->
      <div class="col-md-9">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>Name</th>
              <th>Addres</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Gender</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include "koneksi.php";

            $sql = "SELECT id, nama, alamat, email, telp, gender FROM anggota ORDER BY id";
            $qry = mysqli_query($dbh, $sql);

            if (!$qry) {
                die("Query failed: " . mysqli_error($dbh));
            }

            $i = 0;
            while ($a = mysqli_fetch_array($qry)) {
                $i++;
                $gender = $a['gender'] == 1 ? 'Male' : 'Female';
                echo "<tr>
                        <td>{$i}</td>
                        <td>{$a['nama']}</td>
                        <td>{$a['alamat']}</td>
                        <td>{$a['email']}</td>
                        <td>{$a['telp']}</td>
                        <td>{$gender}</td>
                        <td class='table-actions'>
                          <a href='paneleditdb.php?id={$a['id']}' class='btn btn-sm btn-primary'>Edit</a>
                          <a href='paneldeldb.php?id={$a['id']}' class='btn btn-sm btn-danger'>Delete</a>
                        </td>
                      </tr>";
            }
            mysqli_close($dbh);
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
