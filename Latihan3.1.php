<?php
class kendaraan
{
    var $jumlahRoda;
    var $warna;
    var $bahanBakar; 
    var $harga;
    var $merek;
    var $tahunPembuatan;

    function statusHarga()
    {
        if ($this->harga > 50000000)
            $status = 'Mahal';
        else
            $status = 'Murah';

        return $status;
    }

    function statusBBM()
    {
        if ($this->tahunPembuatan < 2015 &&
            $this->bahanBakar == "pertalite")
        {
            $status = "DAPAT SUBSIDI";
        }
        else
        {
            $status = "TIDAK DAPAT SUBSIDI";
        }

        return $status;
    }

    function hargaBekas()
    {
        $hargaBekas = $this->harga * 0.9;
        return $hargaBekas;
    }
}

$objekKendaraan1 = new kendaraan();
$objekKendaraan1->merek = "Yamaha MIO";
$objekKendaraan1->harga = "10000000";
$objekKendaraan1->tahunPembuatan = "2010";
$objekKendaraan1->bahanBakar = "pertalite";
$objekKendaraan1->warna = "Hitam";
$objekKendaraan1->jumlahRoda = 2;

$objekKendaraan2 = new kendaraan();
$objekKendaraan2->merek = "Toyota Avanza";
$objekKendaraan2->harga = "100000000";
$objekKendaraan2->tahunPembuatan = "2000";
$objekKendaraan2->bahanBakar = "pertamax";
$objekKendaraan2->warna = "kuning";
$objekKendaraan2->jumlahRoda = 4;


echo "Merek Kendaraan: " . $objekKendaraan1->merek;
echo "<br>";
echo "Nominal Harga: " . $objekKendaraan1->harga;
echo "<br>";
echo "jumlah Roda: " . $objekKendaraan1->jumlahRoda;
echo "<br>";
echo "Status Harga Kendaraan: " . $objekKendaraan1->statusHarga();
echo "<br>";
echo "Status BBM Kendaraan: " . $objekKendaraan1->statusBBM();
echo "<br>";
echo "tahun Pembuatan Kendaraan: " . $objekKendaraan1->tahunPembuatan;
echo "<br>";
echo "Harga Bekas Kendaraan: " . $objekKendaraan1->hargaBekas();
echo "<br>";
echo "Warna Kendaraan: " . $objekKendaraan1->warna;
echo "<br><br>";

echo "Merek Kendaraan: " . $objekKendaraan2->merek;
echo "<br>";
echo "Nominal Harga: " . $objekKendaraan2->harga;
echo "<br>";
echo "jumlah Roda: " . $objekKendaraan2->jumlahRoda;
echo "<br>";
echo "Status Harga Kendaraan: " . $objekKendaraan2->statusHarga();
echo "<br>";
echo "Status BBM Kendaraan: " . $objekKendaraan2->statusBBM();
echo "<br>";
echo "tahun Pembuatan Kendaraan: " . $objekKendaraan2->tahunPembuatan;
echo "<br>";
echo "Harga Bekas Kendaraan: " . $objekKendaraan2->hargaBekas();
echo "<br>";
echo "Warna Kendaraan: " . $objekKendaraan2->warna;
?>
