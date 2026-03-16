<?php
// WAJIB: session_start() harus di baris pertama sebelum ada tag HTML apapun
session_start();

// 1. CLASS & PROPERTIES
class KalkulatorBangun {
    // 2. FUNCTION / METHOD
    public function hitungVolume($jenis, $s, $r, $t) {
        $vol = 0;
        // 4. PERCABANGAN (Switch Case)
        switch ($jenis) {
            case "Bola":
                $vol = (4/3) * pi() * pow($r, 3);
                break;
            case "Kerucut":
                $vol = (1/3) * pi() * pow($r, 2) * $t;
                break;
            case "Limas Segi Empat":
                $vol = (1/3) * pow($s, 2) * $t;
                break;
            case "Kubus":
                $vol = pow($s, 3);
                break;
            case "Tabung":
                $vol = pi() * pow($r, 2) * $t;
                break;
        }
        return round($vol, 2);
    }
}

// Inisialisasi Object
$app = new KalkulatorBangun();

// Inisialisasi session array jika belum ada untuk menampung tabel
if (!isset($_SESSION['data_tabel'])) {
    $_SESSION['data_tabel'] = [];
}

// Logika menghapus data tabel (Reset)
if (isset($_POST['reset'])) {
    $_SESSION['data_tabel'] = [];
    header("Location: " . $_SERVER['PHP_SELF']); // Refresh halaman
    exit;
}

// Logika Simpan Data: Mengecek apakah tombol hitung diklik
if (isset($_POST['hitung'])) {
    // Solusi Error: Gunakan null coalescing (??) agar tidak Undefined Index
    $jenis = $_POST['jenis_bangun'] ?? '';
    $sisi  = $_POST['sisi'] ?? 0;
    $jari  = $_POST['jari'] ?? 0;
    $tinggi = $_POST['tinggi'] ?? 0;

    $hasil = $app->hitungVolume($jenis, $sisi, $jari, $tinggi);

    // 5. ARRAY (Simpan ke Session)
    $_SESSION['data_tabel'][] = [
        "jenis" => $jenis,
        "sisi" => $sisi,
        "jari" => $jari,
        "tinggi" => $tinggi,
        "volume" => $hasil
    ];
}

$pilih = $_GET['pilih'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Bangun Ruang</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .nav { margin-bottom: 20px; }
        .nav a { padding: 10px; border: 1px solid #ccc; text-decoration: none; margin-right: 5px; background: #f9f9f9; color: black; }
        .nav a.active { background: blue; color: white; }
        .box { border: 1px solid #ccc; padding: 20px; width: 300px; border-radius: 5px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background: blue; color: white; padding: 10px; border: 1px solid #ddd; }
        td { border: 1px solid #ddd; padding: 8px; text-align: center; }
    </style>
</head>
<body>

    <div class="nav">
        <a href="?pilih=Bola" class="<?= $pilih == 'Bola' ? 'active' : '' ?>">Bola</a>
        <a href="?pilih=Kerucut" class="<?= $pilih == 'Kerucut' ? 'active' : '' ?>">Kerucut</a>
        <a href="?pilih=Limas Segi Empat" class="<?= $pilih == 'Limas Segi Empat' ? 'active' : '' ?>">Limas Segi Empat</a>
        <a href="?pilih=Kubus" class="<?= $pilih == 'Kubus' ? 'active' : '' ?>">Kubus</a>
        <a href="?pilih=Tabung" class="<?= $pilih == 'Tabung' ? 'active' : '' ?>">Tabung</a>
    </div>

    <?php if ($pilih): ?>
    <div class="box">
        <form method="post" action="?pilih=<?= $pilih ?>">
            <h3>Input <?= $pilih ?></h3>
            <input type="hidden" name="jenis_bangun" value="<?= $pilih ?>">
            
            <?php if (in_array($pilih, ['Limas Segi Empat', 'Kubus'])): ?>
                Sisi: <br><input type="number" step="any" name="sisi" required><br><br>
            <?php endif; ?>

            <?php if (in_array($pilih, ['Bola', 'Kerucut', 'Tabung'])): ?>
                Jari-jari: <br><input type="number" step="any" name="jari" required><br><br>
            <?php endif; ?>

            <?php if (in_array($pilih, ['Kerucut', 'Limas Segi Empat', 'Tabung'])): ?>
                Tinggi: <br><input type="number" step="any" name="tinggi" required><br><br>
            <?php endif; ?>

            <button type="submit" name="hitung">Hitung & Tambah</button>
        </form>
    </div>
    <?php endif; ?>

    <?php if (!empty($_SESSION['data_tabel'])): ?>
    <table>
        <tr>
            <th>Jenis Bangun Ruang</th>
            <th>Sisi</th>
            <th>Jari-jari</th>
            <th>Tinggi</th>
            <th>Volume</th>
        </tr>
        <?php 
        // 3. PERULANGAN (Foreach) - Menampilkan data dari array session
        foreach ($_SESSION['data_tabel'] as $row): 
        ?>
        <tr>
            <td><?= $row['jenis'] ?></td>
            <td><?= $row['sisi'] ?></td>
            <td><?= $row['jari'] ?></td>
            <td><?= $row['tinggi'] ?></td>
            <td><?= $row['volume'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    
    <form method="post" style="margin-top: 10px;">
        <button type="submit" name="reset" style="color: red;">Kosongkan Tabel</button>
    </form>
    <?php endif; ?>

</body>
</html>