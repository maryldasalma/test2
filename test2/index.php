<!DOCTYPE html>
<html>
<head>
  <title>Menu Utama</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f5f7fa; /* abu muda lembut */
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .menu-container {
      background: #fff;
      padding: 40px 50px;
      border: 1px solid #ccc;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      text-align: center;
      width: 380px;
    }

    h2 {
      margin-bottom: 25px;
      font-weight: bold;
      text-decoration: underline;
      color: #2c3e50;
    }

    ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    ul li {
      margin: 12px 0;
    }

    ul li a {
      display: block;
      padding: 12px;
      background: #cfe9cf;  /* hijau muda */
      color: #2c3e50;
      text-decoration: none;
      border-radius: 8px;
      font-weight: bold;
      transition: 0.3s;
      border: 1px solid #a8cfa8;
    }

    ul li a:hover {
      background: #9ccf9c; /* hijau tua pas hover */
      color: white;
    }
  </style>
</head>
<body>
  <div class="menu-container">
    <h2>Menu Utama</h2>
    <ul>
      <li><a href="master.php">Form Input Master Barang</a></li>
      <li><a href="koreksi.php">Form Transaksi Koreksi Stok</a></li>
      <li><a href="order.php">Form Proses Order Barang</a></li>
      <li><a href="receive.php">Form Receiving</a></li>
      <li><a href="lap_produk.php">Laporan Data Barang</a></li>
      <li><a href="lap_order.php">Laporan Order Barang</a></li>
      <li><a href="lap_receive.php">Laporan Receive Barang</a></li>
    </ul>
  </div>
</body>
</html>