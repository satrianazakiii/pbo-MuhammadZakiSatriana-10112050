<?php

class Karyawan {
    public $nama;
    public $golongan;
    public $jamLembur;

    // Constructor dengan parameter
    public function __construct($nama, $golongan, $jamLembur) {
        $this->nama = $nama;
        $this->golongan = $golongan;
        $this->jamLembur = $jamLembur;
        echo "\n[Sistem]: Objek untuk $nama telah dibuat.";
    }

    public function getGajiPokok() {
        $gajiList = [
            "Ib" => 1250000, "Ic" => 1300000, "Id" => 1350000,
            "IIa" => 2000000, "IIb" => 2100000, "IIc" => 2200000, "IId" => 2300000,
            "IIIa" => 2400000, "IIIb" => 2500000, "IIIc" => 2600000, "IIId" => 2700000,
            "IVa" => 2800000, "IVb" => 2900000, "IVc" => 3000000, "IVd" => 3100000
        ];
        return $gajiList[$this->golongan] ?? 0;
    }

    public function hitungTotalGaji() {
        return $this->getGajiPokok() + ($this->jamLembur * 15000);
    }

    // Destructor
    public function __destruct() {
        echo "\n[Sistem]: Objek " . $this->nama . " telah dihapus dari memori.";
    }
}

// Data Awal (Array of Objects)
$daftarKaryawan = [
    new Karyawan("Winny", "IIb", 30),
    new Karyawan("Stendy", "IIIc", 32),
    new Karyawan("Alfred", "IVb", 30)
];

// Loop Menu Utama
while (true) {
    echo "\n\n===== MENU GAJI KARYAWAN =====";
    echo "\n1. Tampilkan Data";
    echo "\n2. Tambah Data";
    echo "\n3. Update Data";
    echo "\n4. Hapus Data";
    echo "\n5. Keluar";
    echo "\nPilih menu: ";
    $pilihan = trim(fgets(STDIN));

    if ($pilihan == "1") {
        echo "\n===== DATA GAJI KARYAWAN =====";
        echo "\nNo | Nama   | Gol   | Lembur | Total Gaji";
        echo "\n----------------------------------------";
        foreach ($daftarKaryawan as $index => $k) {
            echo "\n" . ($index + 1) . "  | " . str_pad($k->nama, 6) . " | " . str_pad($k->golongan, 2) . " | " . str_pad($k->jamLembur, 6) . " | Rp" . number_format($k->hitungTotalGaji());
        }

    } elseif ($pilihan == "2") {
        echo "\n--- Tambah Data ---";
        echo "\nNama: "; $nama = trim(fgets(STDIN));
        echo "Golongan: "; $gol = trim(fgets(STDIN));
        echo "Jam Lembur: "; $lembur = (int)trim(fgets(STDIN));
        $daftarKaryawan[] = new Karyawan($nama, $gol, $lembur);
        echo "\nData berhasil ditambahkan!";

    } elseif ($pilihan == "3") {
        echo "\nNomor data yang ingin diupdate: ";
        $no = (int)trim(fgets(STDIN)) - 1;
        if (isset($daftarKaryawan[$no])) {
            echo "Nama Baru: "; $daftarKaryawan[$no]->nama = trim(fgets(STDIN));
            echo "Golongan Baru: "; $daftarKaryawan[$no]->golongan = trim(fgets(STDIN));
            echo "Lembur Baru: "; $daftarKaryawan[$no]->jamLembur = (int)trim(fgets(STDIN));
            echo "\nData berhasil diperbarui!";
        } else {
            echo "\nData tidak ditemukan!";
        }

    } elseif ($pilihan == "4") {
        echo "\nNomor data yang ingin dihapus: ";
        $no = (int)trim(fgets(STDIN)) - 1;
        if (isset($daftarKaryawan[$no])) {
            unset($daftarKaryawan[$no]);
            $daftarKaryawan = array_values($daftarKaryawan); // Re-index array
            echo "\nData berhasil dihapus!";
        } else {
            echo "\nData tidak ditemukan!";
        }

    } elseif ($pilihan == "5") {
        echo "\nKeluar dari program. Sampai jumpa!";
        break;
    } else {
        echo "\nPilihan tidak valid!";
    }
}