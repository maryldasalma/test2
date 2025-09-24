<?php
include "config.php";
$q = $mysqli->query("SELECT o.*, p.DESCP 
    FROM TB_TR_ORDER o 
    LEFT JOIN TB_MS_PRODUK p ON o.PLU=p.PLU");
?>
<!DOCTYPE html>
<html>
<head>
<title>Laporan Order Barang</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h3>Laporan Order Barang</h3>
<table>
<tr>
    <th>NO</th><th>NO FAKTUR</th><th>TANGGAL</th>
    <th>PLU</th><th>DESCP</th><th>QTY</th>
    <th>HARGA BELI</th><th>TOTAL</th>
</tr>
<?php $no=1; while($r=$q->fetch_assoc()){ ?>
<tr>
    <td><?=$no++?></td>
    <td><?=$r['NO_FAKTUR']?></td>
    <td><?=$r['TGL_ORDER']?></td>
    <td><?=$r['PLU']?></td>
    <td><?=$r['DESCP']?></td>
    <td><?=$r['QTY']?></td>
    <td><?=$r['HARGA']?></td>
    <td><?=$r['QTY']*$r['HARGA']?></td>
</tr>
<?php } ?>
</table>
<small>Internal Use Only</small>
</body>
</html>
