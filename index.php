<?php 
require_once 'class_karyawan.php';
session_start();

// Inisialisasi session
if (!isset($_SESSION['daftar_karyawan'])) {
    $_SESSION['daftar_karyawan'] = [];
}

// Reset Session jika tombol reset ditekan
if (isset($_POST['reset'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

// Input
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $gaji = $_POST['gaji'];
    $masa = $_POST['masa'];
    $jabatan = $_POST['jabatan'];

    if ($jabatan == "Programmer") {
        $obj = new Programmer($nama, $gaji, $masa);
    } elseif ($jabatan == "Direktur") {
        $obj = new Direktur($nama, $gaji, $masa);
    } else {
        $obj = new PegawaiMingguan($nama, $gaji, $masa, $_POST['harga'], $_POST['target'], $_POST['terjual']);
    }

    // Simpan objek ke dalam session
    $_SESSION['daftar_karyawan'][] = $obj;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistem Gaji PBO - Session Storage</title>
    <style>
        /* Hanya CSS Tabel */
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #333; color: #fff; }
    </style>
</head>
<body>

<div>
    <h2>Tambah Data Karyawan</h2>
    <form method="POST">
        Nama: <input type="text" name="nama" required> 
        Gaji Dasar: <input type="number" name="gaji" required> 
        Masa Kerja: <input type="number" name="masa" required>
        Jabatan: 
        <select name="jabatan">
            <option value="Programmer">Programmer</option>
            <option value="Direktur">Direktur</option>
            <option value="PegawaiMingguan">Pegawai Mingguan</option>
        </select>
        <br><br>
        <small>Input Tambahan (Hanya untuk Pegawai Mingguan):</small><br>
        Harga Brg: <input type="number" name="harga" value="100000"> 
        Target: <input type="number" name="target" value="100"> 
        Terjual: <input type="number" name="terjual" value="0">
        <br><br>
        <button type="submit" name="tambah">Tambah ke Tabel</button>
        <button type="submit" name="reset">Hapus Semua Data</button>
    </form>
</div>

<h3>Daftar Gaji Karyawan (Data Tersimpan di Session)</h3>
<table>
    <tr>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Masa Kerja</th>
        <th>Total Gaji</th>
    </tr>
    <?php if (empty($_SESSION['daftar_karyawan'])): ?>
        <tr><td colspan="4" style="text-align:center;">Belum ada data.</td></tr>
    <?php else: ?>
        <?php foreach ($_SESSION['daftar_karyawan'] as $k): ?>
            <tr>
                <td><?= $k->nama ?></td>
                <td><?= get_class($k) ?></td>
                <td><?= $k->masaKerja ?> Tahun</td>
                <td>Rp <?= number_format($k->hitungGaji(), 0, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>

</body>
</html>