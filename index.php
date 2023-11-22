
<?php 
session_start();
if(!isset($_SESSION['session_username'])){
    header("location:login.php");
    exit();
}
$loggedInUserLevel = isset($_SESSION['level']) ? $_SESSION['level'] : null; // Ambil level user yang sedang login


// Tambahkan pesan selamat datang untuk level 0
$welcomeMessage = '';
if ($_SESSION['level'] == 0) {
    $welcomeMessage = 'Selamat datang, Admin!';
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemograman3.com</title>

    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha2/dist/css/bootstrap.min.css">

    <style>
    /* Your custom styles can go here if needed */
    body {
        font-family: 'Comic Sans MS', Arial, sans-serif; /* Correct the font-family property */
        display: flex;
        flex-direction: column; /* Set flex-direction to column */
        justify-content: center;
        align-items: center;
        min-height: 100vh; /* Fix typo in min-height property */
        background: url('1327980.png') no-repeat;
        background-size: cover;
        background-position: center;
        margin: 0; /* Remove default body margin */
    }

    header {
        background-color: rgba(0, 0, 0, 0.0); /* Adjust the alpha value as needed for transparency */
        backdrop-filter: blur(10px); /* Adjust the blur intensity as needed */
        
        border: 1px solid #ccc;
        border-radius: 20px;
        padding: 20px;
        text-align: center;
        transition: background-color 0.3s, transform 0.2s;
 
        }

    .container {
        text-align: center;
        padding: 30px;
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

    .card {
        background-color: rgba(0, 0, 0, 0.0); /* Adjust the alpha value as needed for transparency */
        backdrop-filter: blur(10px); /* Adjust the blur intensity as needed */

        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        text-align: center;
        transition: background-color 0.3s, transform 0.2s;
 }

    .card:hover {
        background-color: #ADD8E6	;
        color: #ADFF2F;
        transform: scale(1.05);
    }

    h2 {
        margin: 0;
        color: #010101;
    }

    footer {
        backdrop-filter: blur(10px); /* Adjust the blur intensity as needed */

        color: white;
        padding: 10px;
        text-align: center;
    }
</style>

</head>
<body>
    <header>
        <h1>MENU PEMOGRAMAN 3</h1>
                <!-- Tampilkan pesan selamat datang untuk level 0 -->
        <p><?php echo $welcomeMessage; ?></p>

    </header>
    <div class="container">
        <div class="contain">
        <?php
           
        if ($loggedInUserLevel != 2) {
    // Level 0 dapat mengedit dan menghapus semua level
    ?>
            <a href="tampil_barang.php">
                <div class="card">
                    <h2>BARANG</h2>
                </div>
            </a>
            
            <a href="tampil_kategori.php">
                <div class="card">
                    <h2>KATEGORI</h2>
                </div>
            </a>
            <a href="tampil_member.php">
                <div class="card">
                    <h2>MEMBER</h2>
                </div>
            </a>
            <a href="tampil_penjualan.php">
                <div class="card">
                    <h2>PENJUALAN</h2>
                </div>
            </a>
            <a href="view_report.php">
                <div class="card">
                    <h2>VIEW REPORT</h2>
                </div>
            </a>
            <a href="tampil_user.php">
                <div class="card">
                    <h2>USER</h2>
                </div>
            </a>
            <?php
            }
            ?>
            <a href="tampil_transaksi.php">
                <div class="card">
                    <h2>TRANSAKSI</h2>
                </div>
            </a>
            <a href="logout.php">
                <div class="card">
                    <h2>LOGOUT</h2>
                </div>
            </a>
        </div>
    </div>
    <footer>
        very good very well ini punya syifa well
    </footer>

    <!-- Add Bootstrap JS and Popper.js for Bootstrap components that require it -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
</body>
</html>