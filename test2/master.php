<?php
include "config.php";
$notif = "";
if(isset($_POST['simpan'])){
    $plu = $_POST['plu'];
    $descp = $_POST['descp'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $min_order = $_POST['min_order'];
    $min_stok = $_POST['min_stok'];
    $max_stok = $_POST['max_stok'];
    $tag = $_POST['tag'];
    $stok = 0;

    $mysqli->query("INSERT INTO TB_MS_PRODUK 
        (PLU,DESCP,STOK,HARGA_BELI,HARGA_JUAL,MIN_ORDER,MIN_STOK,MAX_STOK,TAG_PRODUK) 
        VALUES ('$plu','$descp','$stok','$harga_beli','$harga_jual','$min_order','$min_stok','$max_stok','$tag')");
    $notif = "Data tersimpan!";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Form Master Barang</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="form-page">
<div class="container">
    <div class="form-box">
        <h3>Form Input Master Barang</h3>

        <?php if($notif != ""): ?>
            <div class="notif-success"><?= $notif ?></div>
        <?php endif; ?>

        <form method="post" autocomplete="off">
            <div class="form-row"><label>PLU :</label><input type="text" name="plu" required></div>
            <div class="form-row"><label>DESCP :</label><input type="text" name="descp" required></div>
            <div class="form-row"><label>HARGA BELI :</label><input type="number" name="harga_beli" required></div>
            <div class="form-row"><label>HARGA JUAL :</label><input type="number" name="harga_jual" required></div>
            <div class="form-row"><label>MIN ORDER :</label><input type="number" name="min_order" required></div>
            <div class="form-row"><label>MIN STOK :</label><input type="number" name="min_stok" required></div>
            <div class="form-row"><label>MAX STOK :</label><input type="number" name="max_stok" required></div>
            <div class="form-row">
                <label>TAG PRODUK :</label>
                <select name="tag" required>
                    <option value="F">F - Paling Laku (Aktif)</option>
                    <option value="B">B - Laku Sedang (Aktif)</option>
                    <option value="D">D - Non Aktif</option>
                </select>
            </div>
            <div style="text-align:center; margin-top:15px;">
                <input type="submit" class="btn btn-save" name="simpan" value="SIMPAN">
                <input type="reset" class="btn btn-cancel" value="BATAL">
            </div>
        </form>
    </div>
</div>
</body>
</html>

