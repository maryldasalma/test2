<?php
include "config.php";

if(isset($_GET['nofak'])){
    $nofak = $_GET['nofak'];

    $res = $mysqli->query("
        SELECT O.PLU, P.DESCP, O.QTY AS QTY_ORDER, P.HARGA_BELI
        FROM TB_TR_ORDER O
        JOIN TB_MS_PRODUK P ON O.PLU=P.PLU
        WHERE O.NO_FAKTUR='$nofak'
    ");

    $data = array();
    while($row = $res->fetch_assoc()){
        $data[] = $row;
    }
    echo json_encode($data);
}
?>
