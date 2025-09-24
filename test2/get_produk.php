<?php
include "config.php";

if(isset($_POST['plu'])){
    $plu = $_POST['plu'];
    $q = $mysqli->query("SELECT DESCP, STOK FROM TB_MS_PRODUK WHERE PLU='$plu'");
    if($q->num_rows > 0){
        $r = $q->fetch_assoc();
        echo json_encode([
            "status" => "ok",
            "descp" => $r['DESCP'],
            "stok"  => $r['STOK']
        ]);
    } else {
        echo json_encode(["status"=>"notfound"]);
    }
}
?>