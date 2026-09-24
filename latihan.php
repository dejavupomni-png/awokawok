<?php
class produk {
    public string $nama;
    public string $harga;

    public function __construct(string $nama, string $harga) {
        $this->nama = $nama;
        $this->harga = $harga;
        
        $hargaFormatted = number_format((int)$this->harga, 0, ',', '.');

        echo "<div class='notif'>Sukses! Produk <strong>{$this->nama}</strong> berharga <strong>Rp{$hargaFormatted}</strong> sudah ditambahkan.</div>";
    }

    public function getdetail() {
        return "Produk: " . $this->nama . ", Harga: " . $this->harga;
    }

    public function __destruct() {

        echo "<div class='destruct-msg'>[Destructor]: Produk " . $this->nama . " telah dihapus.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Produk OOP</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #270fb0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }
        .container {
            background-color: #087dbf;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 320px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-top: 0;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: #555;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        .notif {
            background-color: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            text-align: center;
            font-size: 14px;
        }
        .destruct-msg {
            margin-top: 15px;
            font-size: 12px;
            color: #888;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $inputNama = $_POST['nama_produk'];
            $inputHarga = $_POST['harga_produk'];
            
            $produkBaru = new produk($inputNama, $inputHarga);
        }
        ?>

        <h2>Data Produk</h2>

        <form method="POST" action="">
            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" id="nama_produk" name="nama_produk" placeholder="Misal: Laptop" required>
            </div>
            
            <div class="form-group">
                <label for="harga_produk">Harga (Rp)</label>
                <input type="number" id="harga_produk" name="harga_produk" placeholder="Misal: 5000000" required>
            </div>
            
            <button type="submit">Proses Barang</button>
        </form>
    </div>

</body>
</html>