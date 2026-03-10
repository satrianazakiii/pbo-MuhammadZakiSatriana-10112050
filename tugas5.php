<!DOCTYPE html>
<html>
<head>
<title>Program Diskon</title>
</head>

<body>

<h2>Program Diskon Belanja Toko Zaki</h2>

<form method="post">

Total Belanja<br>
<input type="number" name="belanja" required>
<br><br>

<button type="submit" name="kartu" value="1">Punya Kartu</button>
<button type="submit" name="kartu" value="0">Tidak Punya Kartu</button>

</form>

<hr>

<?php

if(isset($_POST['kartu'])){

    $belanja = $_POST['belanja'];
    $kartu = $_POST['kartu'];
    $diskon = 0;

    if($kartu == 1){

        if($belanja > 500000){
            $diskon = 50000;
        }
        elseif($belanja > 100000){
            $diskon = 15000;
        }

    }else{

        if($belanja > 100000){
            $diskon = 5000;
        }

    }

    $total = $belanja - $diskon;

    echo "Total Belanja : Rp $belanja <br>";
    echo "Diskon : Rp $diskon <br>";
    echo "Total Bayar : Rp $total";

}

?>

</body>
</html>