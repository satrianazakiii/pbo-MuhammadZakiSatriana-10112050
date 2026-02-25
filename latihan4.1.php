<?php

function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
    
}

class belanja{
    public $namaBarang;
    public $hargaBarang;
    public $jumlahBeli;
    public $total_bayar;

    public function hitungSubtotal(){
       return $this->hargaBarang * $this->jumlahBeli;
}
    public function hitungTotalDenganDiskon($persenDiskon){
        $subtotal = $this->hitungSubtotal();
        $diskon =  ($persenDiskon / 100) * $subtotal;
        return $subtotal - $diskon;
}
    

}
//ini array

$data = [
    'namaPembeli' => 'Miftah',
    'namaBarang' => 'Mie Ayam',
    'hargaBarang' => 12000,
    'jumlahBeli' => 12,
];
//imstansiasi ini
$belanja1 = new belanja();
$belanja1->namaPembeli = $data["namaPembeli"];
$belanja1->namaBarang = $data["namaBarang"];
$belanja1->hargaBarang = $data["hargaBarang"];
$belanja1->jumlahBeli = $data["jumlahBeli"];

//output
echo "<h2>Struk Warung Madura</h2>";
echo "Nama Pembeli: " . $belanja1->namaPembeli . "<br>";
echo "Nama Barang: " . $belanja1->namaBarang . "<br>";
echo "Subtotal: " . formatRupiah($belanja1->hitungSubtotal()) . "<br>";
echo "total(diskon 10%): " . formatRupiah($belanja1->hitungTotalDenganDiskon(10)) . "<br>";

?>