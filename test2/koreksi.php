<?php
include "config.php";
$notif = "";
if(isset($_POST['simpan'])){
    $plu = $_POST['plu'];
    $stok_baru = $_POST['stok_baru'];
    $tgl = date("Y-m-d");

    // Simpan ke tabel koreksi
    $mysqli->query("INSERT INTO TB_TR_KOREKSI (PLU,QTY,TGL_KOREKSI) VALUES ('$plu','$stok_baru','$tgl')");

    // Update stok di master produk
    $mysqli->query("UPDATE TB_MS_PRODUK SET STOK='$stok_baru' WHERE PLU='$plu'");

    $notif = "Koreksi tersimpan!";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Koreksi Stok</title>
<link rel="stylesheet" href="style.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function getProduk() {
    var plu = $("#plu").val();
    if(plu != ""){
        $.ajax({
            url: "get_produk.php",
            method: "POST",
            data: {plu: plu},
            dataType: "json",
            success: function(data){
                if(data.status == "ok"){
                    $("#descp").val(data.descp);
                    $("#stok_lama").val(data.stok);
                } else {
                    $("#descp").val("");
                    $("#stok_lama").val("");
                }
            }
        });
    }
}
</script>
</head>
<body class="form-page">
<div class="container">
    <div class="form-box">
        <h3>Form Transaksi Koreksi Stok</h3>
                  <?php if($notif != ""): ?>
            <div class="notif-success"><?= $notif ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="form-row"><label>PLU :</label><input type="text" id="plu" name="plu" onkeyup="getProduk()" required></div>
            <div class="form-row"><label>DESCP :</label><input type="text" id="descp" name="descp" readonly></div>
            <div class="form-row"><label>STOK LAMA :</label><input type="number" id="stok_lama" name="stok_lama" readonly></div>
            <div class="form-row"><label>STOK BARU :</label><input type="number" name="stok_baru" required></div>
            <div style="text-align:center; margin-top:15px;">
                <input type="submit" class="btn btn-save" name="simpan" value="SIMPAN">
                <input type="reset" class="btn btn-cancel" value="BATAL">
            </div>
        </form>
    </div>
</div>
</body>

</html>
