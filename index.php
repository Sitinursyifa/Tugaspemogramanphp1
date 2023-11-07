
<?php 
session_start();
if(!isset($_SESSION['session_username'])){
    header("location:login.php");
    exit();
}

?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemograman3.com</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            
        }

        
             
        

        .container {
            text-align: center;
            padding: 30px;
        }

        header {
            background-color: #ff33dd;
            color: white;
            padding: 20px;
        }

        header h1 {
            margin: 0;
        }

        .contain {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        a {
            text-decoration: none;
        }

        .btn {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #e74c3c;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1>MENU PEMOGRAMAN 3</h1>
        </header>
        <div class="contain">
            <a href="tampil_barang.php">
                <button class="btn">BARANG</button>
            </a>

            <a href="tampil_kategori.php">
                <button class="btn">KATEGORI</button>
            </a>

            <a href="tampil_member.php">
                <button class="btn">MEMBER</button>
            </a>

            <a href="tampil_penjualan.php">
                <button class="btn">PENJUALAN</button>
            </a>

            <a href="tampil_transaksi.php">
                <button class="btn">TRANSAKSI</button>
            </a>

            <a href="tampil_user.php">
                <button class="btn">USER</button>
            </a>

            <a href="view_report.php">
                <button class="btn">VIEW REPORT</button>
            </a>
            <a href="logout.php">
                <button class="btn">LOGOUT</button>
            </a>
        </div>
        <footer>
            very good very well ini punya syifa well
        </footer>
    </div>
</body>

</html>