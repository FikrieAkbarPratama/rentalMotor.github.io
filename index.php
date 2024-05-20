<?php 
require "proses.php";

$proses = new Rental();
$proses->setHarga(70000, 90000, 90000, 100000);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $proses->pelanggan = $_POST['pelanggan'];
    $proses->waktu = $_POST['waktu'];
    $proses->jenis = $_POST['jenis'];
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Rental Motor</h1>
        <form action="" method="post">
            <label for="pelanggan">Nama Pelanggan :</label>
            <input type="text" name="pelanggan" id="pelanggan" required>

            <label for="waktu">Lama Waktu Rental (per hari) :</label>
            <input type="number" name="waktu" id="waktu" required>

            <label for="jenis">Jenis Motor :</label>
            <select name="jenis" id="jenis" required>
                <option disabled selected>-- Pilih Jenis --</option>
                <option value="MotorStandar">Motor Standar</option>
                <option value="Skuter">Skuter</option>
                <option value="MotorTrail">Motor Trail</option>
                <option value="MotorSport">Motor Sport</option>
            </select>

            <button type="submit" name="submit">Submit</button>
        </form>

        <?php if (isset($_POST['submit']) && !empty($_POST['pelanggan']) && !empty($_POST['waktu']) && isset($_POST['jenis'])) : ?>
            <div class="result">
                <?php $proses->cetakInfo(); ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
