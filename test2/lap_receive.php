<?php
include "config.php";

$q = $mysqli->query("
    SELECT r.NO_FAKTUR,
           o.TGL_ORDER,
           r.TGL_RECEIVE,
           r.PLU,
           p.DESCP,
           o.QTY AS QTY_ORDER,
           r.QTY AS QTY_REC,
           r.HARGA_BELI
    FROM TB_TR_RECEIVE r
    LEFT JOIN TB_TR_ORDER o ON r.NO_FAKTUR = o.NO_FAKTUR AND r.PLU = o.PLU
    LEFT JOIN TB_MS_PRODUK p ON r.PLU = p.PLU
");
?>
<!DOCTYPE html>
<html>
<head>
<title>Laporan Receive Barang</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h3>Laporan Receive Barang</h3>
<table>
<tr>
    <th>NO</th><th>NO FAKTUR</th><th>TANGGAL ORDER</th>
    <th>TANGGAL RECEIVE</th><th>PLU</th><th>DESCP</th>
    <th>QTY ORDER</th><th>QTY REC</th><th>HARGA BELI</th><th>TOTAL</th>
</tr>
<?php $no=1; while($r=$q->fetch_assoc()){ ?>
<tr>
    <td><?=$no++?></td>
    <td><?=$r['NO_FAKTUR']?></td>
    <td><?=$r['TGL_ORDER']?></td>
    <td><?=$r['TGL_RECEIVE']?></td>
    <td><?=$r['PLU']?></td>
    <td><?=$r['DESCP']?></td>
    <td><?=$r['QTY_ORDER']?></td>
    <td><?=$r['QTY_REC']?></td>
    <td><?=$r['HARGA_BELI']?></td>
    <td><?=$r['QTY_REC'] * $r['HARGA_BELI']?></td>
</tr>
<?php } ?>
</table>
<small>Internal Use Only</small>
</body>
</html>
