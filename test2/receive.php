<?php
include "config.php";
$notif = "";

// SIMPAN DATA RECEIVE
if(isset($_POST['simpan'])){
    $nofak = $_POST['nofak'];
    $tgl = $_POST['tgl']; 
    $plu = $_POST['plu'];       
    $qty_rec = $_POST['qty_rec']; 
    $harga_beli = $_POST['harga_beli']; 

    for($i=0; $i<count($plu); $i++){
        $mysqli->query("INSERT INTO TB_TR_RECEIVE (NO_FAKTUR,TGL_RECEIVE,PLU,QTY,HARGA_BELI) 
                        VALUES ('$nofak','$tgl','".$plu[$i]."','".$qty_rec[$i]."','".$harga_beli[$i]."')");

        $mysqli->query("UPDATE TB_MS_PRODUK SET STOK=STOK+".$qty_rec[$i]." WHERE PLU=".$plu[$i]);

        $mysqli->query("UPDATE TB_TR_RECEIVE SET TGL_RECEIVE='$tgl' WHERE NO_FAKTUR='$nofak' AND PLU=".$plu[$i]);
    }
     $notif = "Receive tersimpan!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Form Receiving</title>
<link rel="stylesheet" href="style.css"> <!-- panggil css global -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="form-page">
<div class="container">
    <div class="form-box">
        <h3>Form Receiving</h3>
          <?php if($notif != ""): ?>
            <div class="notif-success"><?= $notif ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="form-row">
                <label>NO FAKTUR :</label>
                <input type="text" name="nofak" id="nofak" required>
            </div>
            <div class="form-row">
                <label>TGL ORDER :</label>
                <input type="date" name="tgl" id="tgl" readonly>
            </div>

            <table id="tblFaktur">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>PLU</th>
                        <th>DESCP</th>
                        <th>QTY ORDER</th>
                        <th>QTY REC</th>
                        <th>HARGA BELI</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td colspan="7">Masukkan No Faktur untuk menampilkan produk</td></tr>
                </tbody>
            </table>

            <div style="text-align:center;">
                <input type="submit" class="btn btn-save" name="simpan" value="SIMPAN">
                <input type="reset" class="btn btn-cancel" value="BATAL">
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function(){
    $('#nofak').on('change', function(){
        var nofak = $(this).val();
        if(nofak != ''){
            $.ajax({
                url: 'get_faktur.php',
                method: 'GET',
                data: {nofak: nofak},
                dataType: 'json',
                success: function(data){
                    var tbody = $('#tblFaktur tbody');
                    tbody.empty();
                    if(data.length > 0){
                        $('#tgl').val(new Date().toISOString().slice(0,10));
                        $.each(data, function(i, item){
                            tbody.append('<tr>'+
                                '<td>'+(i+1)+'</td>'+
                                '<td><input type="number" name="plu[]" value="'+item.PLU+'" readonly></td>'+
                                '<td><input type="text" name="descp[]" value="'+item.DESCP+'" readonly></td>'+
                                '<td><input type="number" name="qty_order[]" value="'+item.QTY_ORDER+'" readonly></td>'+
                                '<td><input type="number" name="qty_rec[]" value="0" min="0" class="qty_rec" data-harga="'+item.HARGA_BELI+'"></td>'+
                                '<td><input type="number" name="harga_beli[]" value="'+item.HARGA_BELI+'" readonly></td>'+
                                '<td class="total">0</td>'+
                                '</tr>');
                        });
                    } else {
                        tbody.append('<tr><td colspan="7">Faktur tidak ditemukan!</td></tr>');
                    }
                }
            });
        }
    });

    $(document).on('input', '.qty_rec', function(){
        var qty = parseInt($(this).val()) || 0;
        var harga = parseInt($(this).data('harga')) || 0;
        var total = qty * harga;
        $(this).closest('tr').find('.total').text(total);
    });
});
</script>
</body>
</html>
