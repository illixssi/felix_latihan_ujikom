<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "db_mhs";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("<div class='alert alert-danger mt-3'>fail: " . $conn->connect_error . "</div>");
}

if (isset($_POST['update'])) {
    $no = array_keys($_POST['update'])[0];
    $nim = $_POST['nim'][$no];
    $nama = $_POST['nama'][$no];
    $jenis_kelamin = $_POST['jenis_kelamin'][$no];
    $jurusan = $_POST['jurusan'][$no];

    $sql = "UPDATE mahasiswa SET nim='$nim', nama='$nama', jenis_kelamin='$jenis_kelamin', jurusan='$jurusan' WHERE no=$no";
    $conn->query($sql);
    header("Location: formInputMahasiswa.php"); // Refresh halaman
    exit;
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM mahasiswa WHERE no = $id");
    header("Location: formInputMahasiswa.php");
    exit;
}

$result = $conn->query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

    <h2 class="mb-3">List Mahasiswa</h2>

    <form method="POST">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Jurusan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($data = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><input type="text" name="nim[<?= $data['no']; ?>]" value="<?= $data['nim']; ?>" class="form-control"></td>
                        <td><input type="text" name="nama[<?= $data['no']; ?>]" value="<?= $data['nama']; ?>" class="form-control"></td>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin[<?= $data['no']; ?>]" value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'checked' : ''; ?>>
                                <label class="form-check-label">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin[<?= $data['no']; ?>]" value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'checked' : ''; ?>>
                                <label class="form-check-label">Perempuan</label>
                            </div>
                        </td>
                        <td>
                            <select name="jurusan[<?= $data['no']; ?>]" class="form-select">
                                <option value="Sistem Informatika" <?= $data['jurusan'] == 'Sistem Informatika' ? 'selected' : ''; ?>>Sistem Informatika</option>
                                <option value="Teknik Informatika" <?= $data['jurusan'] == 'Teknik Informatika' ? 'selected' : ''; ?>>Teknik Informatika</option>
                            </select>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-success btn-sm" name="update[<?= $data['no']; ?>]">Update</button>
                            <a href="formInputMahasiswa.php?delete=<?= $data['no']; ?>" class="btn btn-danger btn-sm" git>Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>