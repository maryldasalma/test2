<?php
include "config.php";
$notif = "";
if(isset($_POST['proses'])){
    $tgl = $_POST['tgl'];

    // Faktur dibuat sekali saja, bukan per-produk
    $no_faktur = "ORD".time();

    // cari produk yang stoknya kurang dari min stok & masih aktif
    $q = $mysqli->query("SELECT * FROM TB_MS_PRODUK 
                         WHERE STOK < MIN_STOK 
                         AND TAG_PRODUK IN ('F','B')");

    while($r = $q->fetch_assoc()){
        $qty = $r['MIN_ORDER'];
        $harga = $r['HARGA_BELI'];

        // cek jangan sampai melebihi max stok
        if($r['STOK'] + $qty <= $r['MAX_STOK']){
            $mysqli->query("INSERT INTO TB_TR_ORDER 
                (NO_FAKTUR,TGL_ORDER,PLU,QTY,HARGA) 
                VALUES ('$no_faktur','$tgl','".$r['PLU']."','$qty','$harga')");
        }
    }
    $notif = "Order otomatis diproses dengan No Faktur: $no_faktur";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Proses Order</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="form-page">
<div class="container">
    <div class="form-box">
        <h3>Form Proses Order Barang</h3>
        <?php if($notif != ""): ?>
            <div class="notif-success"><?= $notif ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="form-row">
                <label>TANGGAL :</label>
                <input type="date" name="tgl" required>
            </div>
            <div style="text-align:center; margin-top:15px;">
                <input type="submit" class="btn btn-save" name="proses" value="PROSES">
                <input type="reset" class="btn btn-cancel" value="BATAL">
            </div>
        </form>
    </div>
</div>
</body>
</html>

