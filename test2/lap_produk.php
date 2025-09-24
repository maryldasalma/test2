<?php
include "config.php";
$q = $mysqli->query("SELECT * FROM TB_MS_PRODUK");
?>
<!DOCTYPE html>
<html>
<head>
<title>Laporan Data Barang</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h3>Laporan Data Barang</h3>
<table>
<tr>
    <th>NO</th><th>PLU</th><th>DESCP</th><th>QTY</th>
    <th>HARGA BELI</th><th>HARGA JUAL</th><th>MARGIN</th>
    <th>MIN STOK</th><th>MIN ORDER</th><th>TAG</th>
</tr>
<?php $no=1; while($r=$q->fetch_assoc()){ ?>
<tr>
    <td><?=$no++?></td>
    <td><?=$r['PLU']?></td>
    <td><?=$r['DESCP']?></td>
    <td><?=$r['STOK']?></td>
    <td><?=$r['HARGA_BELI']?></td>
    <td><?=$r['HARGA_JUAL']?></td>
    <td><?=$r['HARGA_JUAL']-$r['HARGA_BELI']?></td>
    <td><?=$r['MIN_STOK']?></td>
    <td><?=$r['MIN_ORDER']?></td>
    <td><?=$r['TAG_PRODUK']?></td>
</tr>
<?php } ?>
</table>
<small>Internal Use Only</small>
</body>
</html>
