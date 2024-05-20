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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input, select, button {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .result {
            border: 1px solid #ddd;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            background: #f9f9f9;
        }
        .center {
            text-align: center;
        }
    </style>
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
