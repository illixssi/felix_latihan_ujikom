<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

    <h2 class="mb-3 text-center">Tambah Data Barang</h2>

    <div class="card p-4">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nama Merek</label>
                <input type="text" name="nama_merek" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Warna</label>
                <input type="text" name="warna" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input type="number" name="jumlah" class="form-control" min="1" required>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                <button class="btn btn-secondary" name="ulangi">Ulangi</button>
                <button class="btn btn-secondary" name="kembali">Kembali</button>
            </div>
        </form>
    </div>

    <?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "data";

    $conn = new mysqli($host, $user, $password, $database);
    if ($conn->connect_error) {
        die("<div class='alert alert-danger mt-3'>fail: " . $conn->connect_error . "</div>");
    }

    if (isset($_POST['simpan'])) {
        $nama_merek = $_POST['nama_merek'];
        $warna = $_POST['warna'];
        $jumlah = $_POST['jumlah'];

        $sql = "INSERT INTO printer (nama_merek, warna, jumlah) VALUES ('$nama_merek', '$warna', '$jumlah')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success mt-3'>Data berhasil disimpan!</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Error: " . $conn->error . "</div>";
        }
    }

    $conn->close();
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>