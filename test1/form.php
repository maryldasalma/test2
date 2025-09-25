<!DOCTYPE html>
<html>
<head>
    <title>Form Input</title>
    <style>
        .form-box {
            border: 2px solid black;
            width: 300px;
            padding: 15px;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], select {
            width: 95%;
            padding: 5px;
            margin-bottom: 10px;
        }
        .radio-group {
            margin-bottom: 10px;
        }
        .radio-group label {
            display: block;
        }
        input[type="submit"] {
            padding: 5px 15px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="form-box">
        <form method="post">
            <label>Nama</label>
            <input type="text" name="nama">

            <label>Alamat</label>
            <input type="text" name="alamat">

            <label>Kelamin</label>
            <div class="radio-group">
                <label><input type="radio" name="kelamin" value="Laki-laki"> Laki-laki</label>
                <label><input type="radio" name="kelamin" value="Perempuan"> Perempuan</label>
            </div>

            <label>Agama</label>
            <select name="agama">
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
            </select>

            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $nama    = $_POST['nama'];
        $alamat  = $_POST['alamat'];
        $kelamin = $_POST['kelamin'];
        $agama   = $_POST['agama'];

        echo '<div class="form-box">';
        echo "<b>Nama:</b> $nama <br>";
        echo "<b>Alamat:</b> $alamat <br>";
        echo "<b>Jenis Kelamin:</b> $kelamin <br>";
        echo "<b>Agama:</b> $agama <br>";
        echo '</div>';
    }
    ?>

</body>
</html>
