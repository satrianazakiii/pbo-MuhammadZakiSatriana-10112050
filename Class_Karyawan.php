<?php
class Employee {
    public $nama, $gajiDasar, $masaKerja;
    public function __construct($nama, $gajiDasar, $masaKerja) {
        $this->nama = $nama;
        $this->gajiDasar = $gajiDasar;
        $this->masaKerja = $masaKerja;
    }
    public function hitungGaji() { return $this->gajiDasar; }
}

class Programmer extends Employee {
    public function hitungGaji() {
        $bonus = ($this->masaKerja >= 1 && $this->masaKerja <= 10) ? 0.01 * $this->masaKerja * $this->gajiDasar : 0.02 * $this->masaKerja * $this->gajiDasar;
        return $this->gajiDasar + $bonus;
    }
}

class Direktur extends Employee {
    public function hitungGaji() {
        return $this->gajiDasar + (0.5 * $this->masaKerja * $this->gajiDasar) + (0.1 * $this->masaKerja * $this->gajiDasar);
    }
}

class PegawaiMingguan extends Employee {
    public $hargaBarang, $stockTarget, $totalTerjual;
    public function __construct($nama, $gajiDasar, $masaKerja, $hargaBarang, $stockTarget, $totalTerjual) {
        parent::__construct($nama, $gajiDasar, $masaKerja);
        $this->hargaBarang = $hargaBarang;
        $this->stockTarget = $stockTarget;
        $this->totalTerjual = $totalTerjual;
    }
    public function hitungGaji() {
        $pencapaian = ($this->totalTerjual / $this->stockTarget) * 100;
        $tambahan = ($pencapaian > 70) ? 0.10 * $this->hargaBarang * $this->totalTerjual : 0.03 * $this->hargaBarang * $this->totalTerjual;
        return $this->gajiDasar + $tambahan;
    }
}
?>