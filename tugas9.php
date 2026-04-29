<?php

// Class Induk: Uang Tabungan
class UangTabungan {
    // Encapsulation: saldo bersifat protected agar bisa diakses class anak tapi tidak langsung dari luar
    protected $saldo;

    public function __construct($saldoAwal) {
        $this->saldo = $saldoAwal;
    }

    public function getSaldo() {
        return $this->saldo;
    }
}

// Class Anak: Siswa
class Siswa extends UangTabungan {
    private $nama; // Private: hanya bisa diakses dalam class ini sendiri

    public function __construct($nama, $saldoAwal) {
        // Memanggil constructor induk
        parent::__construct($saldoAwal);
        $this->nama = $nama;
    }

    public function getNama() {
        return $this->nama;
    }

    public function setorTunai($jumlah) {
        if ($jumlah > 0) {
            $this->saldo += $jumlah;
            return true;
        }
        return false;
    }

    public function tarikTunai($jumlah) {
        // Percabangan untuk validasi saldo
        if ($jumlah > 0 && $this->saldo >= $jumlah) {
            $this->saldo -= $jumlah;
            return true;
        }
        return false;
    }
}

// Program Utama (Command Line Interface)
// Menggunakan Array untuk menampung banyak siswa
$daftarSiswa = [
    new Siswa("Miftah", 50000),
    new Siswa("Zaki", 100000),
    new Siswa("Faras", 75000)
];

// Simulasi Interaksi via Command Prompt
$stdin = fopen("php://stdin", "r");

echo "=== PROGRAM TABUNGAN SEKOLAH ===\n";

while (true) {
    echo "\nDaftar Saldo Siswa:\n";
    // Perulangan untuk menampilkan data
   foreach ($daftarSiswa as $index => $s) {
    // Menyelaraskan nomor (2 karakter, rata kanan)
    $nomor = str_pad($index + 1 . ".", 3, " ", STR_PAD_RIGHT);
    
    // Menyelaraskan nama (20 karakter, rata kiri)
    $nama = str_pad($s->getNama(), 20, " ", STR_PAD_RIGHT);
    
    // Menformat saldo dengan titik ribuan
    $saldo = "Rp" . number_format($s->getSaldo(), 0, ',', '.');

    echo $nomor . $nama . " | Saldo: " . $saldo . "\n";
}

    echo "\nPilih nomor siswa (atau 'n' untuk keluar): ";
    $pilihan = trim(fgets($stdin));

    if ($pilihan == 'n') break;

    $idx = (int)$pilihan - 1;
    if (isset($daftarSiswa[$idx])) {
        $siswaTerpilih = $daftarSiswa[$idx];
        
        echo "Pilih transaksi \n";
        echo "1: Setor \n";
        echo "2: Tarik \n";
        echo "pilih aksi: ";
        $aksi = trim(fgets($stdin));
    
        echo "Masukkan nominal: ";
        $nominal = (int)trim(fgets($stdin));

        if ($aksi == '1') {
            $siswaTerpilih->setorTunai($nominal);
            echo "Setor tunai berhasil!\n";
        } elseif ($aksi == '2') {
            if ($siswaTerpilih->tarikTunai($nominal)) {
                echo "Tarik tunai berhasil!\n";
            } else {
                echo "Gagal! Saldo tidak mencukupi atau nominal salah.\n";
            }
        }
    } else {
        echo "Pilihan tidak valid.\n";
    }
}

fclose($stdin);
echo "Program Selesai. Terima kasih!\n";
?>