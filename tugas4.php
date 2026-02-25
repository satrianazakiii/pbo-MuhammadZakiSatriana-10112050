<?php

class Mahasiswa{
    public $namaMahasiswa;
    public $kelas;
    public $matkul;
    public $nilai;
    public $status;

   
}
//ini array

$data = [
    'namaMahasiswa' => 'Aditya',
    'kelas' => 'SI 2',
    'matkul' => 'Pemrograman Berorientasi Objek',
    'nilai' => '80',
    'status' => 'Lulus',
];
$data2 = [
    'namaMahasiswa' => 'Shinta',
    'kelas' => 'SI 2',
    'matkul' => 'Pemrograman Berorientasi Objek',
    'nilai' => '75',
    'status' => 'Lulus',
];
$data3 = [
    'namaMahasiswa' => 'Ineu',
    'kelas' => 'SI 2',
    'matkul' => 'Pemrograman Berorientasi Objek',
    'nilai' => '55',
    'status' => 'Tidak Lulus',
];
?>
<form >selamat datang di halaman data nilai mahasiswa, silahkan pilih nama mahasiswa untuk melihat Nilainya</form>
<form
'ini tombol'
method="GET">
    <button type="submit" name="Mahasiswa" value="Aditya">Adiya</button>
    <button type="submit" name="Mahasiswa" value="Shinta">Shinta</button>
    <button type="submit" name="Mahasiswa" value="Ineu">Ineu</button>
    <button type="submit" name="Mahasiswa" value="kembali">Kembali</button>
</form>
<?php
$Mahasiswa1 = new Mahasiswa();
$Mahasiswa1->namaMahasiswa = $data["namaMahasiswa"];
$Mahasiswa1->kelas = $data["kelas"];
$Mahasiswa1->matkul = $data["matkul"];
$Mahasiswa1->nilai = $data["nilai"];
$Mahasiswa1->status = $data["status"];

$Mahasiswa2 = new Mahasiswa();
$Mahasiswa2->namaMahasiswa = $data2["namaMahasiswa"];
$Mahasiswa2->kelas = $data2["kelas"];
$Mahasiswa2->matkul = $data2["matkul"];
$Mahasiswa2->nilai = $data2["nilai"];
$Mahasiswa2->status = $data2["status"];

$Mahasiswa3 = new Mahasiswa();
$Mahasiswa3->namaMahasiswa = $data3["namaMahasiswa"];
$Mahasiswa3->kelas = $data3["kelas"];
$Mahasiswa3->matkul = $data3["matkul"];
$Mahasiswa3->nilai = $data3["nilai"];
$Mahasiswa3->status = $data3["status"];

//output
if (isset($_GET['Mahasiswa']))
{
    if ($_GET['Mahasiswa'] == "Aditya")
    {
echo "<h2>Data Nilai Mahasiswa</h2>";
echo "Nama Mahasiswa: " . $Mahasiswa1->namaMahasiswa . "<br>";
echo "Kelas: " . $Mahasiswa1->kelas . "<br>";
echo "Mata Kuliah: " . $Mahasiswa1->matkul . "<br>";
echo "Nilai: " . $Mahasiswa1->nilai . "<br>";
echo "Status: " . $Mahasiswa1->status . "<br>";
    }
    elseif ($_GET['Mahasiswa'] == "Shinta")
    {
echo "<h2>Data Nilai Mahasiswa</h2>";
echo "Nama Mahasiswa: " . $Mahasiswa2->namaMahasiswa . "<br>";
echo "Kelas: " . $Mahasiswa2->kelas . "<br>";
echo "Mata Kuliah: " . $Mahasiswa2->matkul . "<br>";
echo "Nilai: " . $Mahasiswa2->nilai . "<br>";
echo "Status: " . $Mahasiswa2->status . "<br>";
    }
    elseif ($_GET['Mahasiswa'] == "Ineu")
    {
echo "<h2>Data Nilai Mahasiswa</h2>";
echo "Nama Mahasiswa: " . $Mahasiswa3->namaMahasiswa . "<br>";
echo "Kelas: " . $Mahasiswa3->kelas . "<br>";
echo "Mata Kuliah: " . $Mahasiswa3->matkul . "<br>";
echo "Nilai: " . $Mahasiswa3->nilai . "<br>";
echo "Status: " . $Mahasiswa3->status . "<br>";
    }
        elseif ($_GET['Mahasiswa'] == "kembali")
        {
            header("Location: http://localhost/pbo-MuhammadZakiSatriana-10112050/pertemuan4/tugas4/tugas4.php");
        }
}
?>